<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id(); // ID único para cada livro
            $table->string('titulo'); // Título do livro
            $table->string('autor'); // Autor do livro
            $table->date('publicacao'); // Data de publicação
            $table->string('editora'); // Editora do livro
            $table->string('genero'); // Gênero do livro
            $table->text('descricao')->nullable(); // Descrição do livro, pode ser nula
            $table->text('imagem')->nullable(); // Imagem em base64 ou URL, pode ser nula
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
