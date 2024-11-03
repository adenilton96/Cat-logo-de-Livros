<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
        $database = Config::get('database.connections.mysql.database');
        $host = Config::get('database.connections.mysql.host');
        $port = Config::get('database.connections.mysql.port');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password');

        // Temporariamente define o banco de dados para 'null' para conectar sem um banco específico
        Config::set('database.connections.mysql.database', null);

        try {
            $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database`;");
            $this->info("Banco de dados `$database` criado com sucesso!");

            // Restaura o banco de dados original
            Config::set('database.connections.mysql.database', $database);
        } catch (PDOException $exception) {
            $this->error("Erro ao criar o banco de dados: " . $exception->getMessage());
            return 1;
        }

        return 0;
    }
}
