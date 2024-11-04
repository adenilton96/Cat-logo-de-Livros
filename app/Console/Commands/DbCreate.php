<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use PDO;
use PDOException;

class DbCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database specified in .env';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $database = Config::get('database.connections.pgsql.database');
        $host = Config::get('database.connections.pgsql.host');
        $port = Config::get('database.connections.pgsql.port');
        $username = Config::get('database.connections.pgsql.username');
        $password = Config::get('database.connections.pgsql.password');

        // Temporariamente define o banco de dados para 'null' para conectar sem um banco específico
        Config::set('database.connections.pgsql.database', null);

        try {
            // Conectar ao PostgreSQL
            $pdo = new PDO("pgsql:host=$host;port=$port", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Criar o banco de dados
            $pdo->exec("CREATE DATABASE \"$database\";");
            $this->info("Banco de dados \"$database\" criado com sucesso!");

            // Restaura o banco de dados original
            Config::set('database.connections.pgsql.database', $database);
        } catch (PDOException $exception) {
            $this->error("Erro ao criar o banco de dados: " . $exception->getMessage());
            return 1;
        }

        return 0;
    }
}
