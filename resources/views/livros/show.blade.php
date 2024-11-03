@extends('layouts.app')

@section('title', 'Visualizar Livro')

@section('content')
    <div class="container mt-4">
        <!-- Título do livro -->
        <h2 class="mb-4">{{ $livro->titulo }}</h2>

        <div class="row">
            <!-- Coluna da Imagem -->
            <div class="col-md-6 mb-4">
                <!-- Exibição da imagem do livro ou imagem padrão se não houver imagem cadastrada -->
                @if ($livro->imagem)
                    <img src="data:image/jpeg;base64,{{ $livro->imagem }}" class="img-fluid" alt="Imagem do Livro">
                @else
                    <img src="{{ asset('storage/img/Books.jpg') }}" class="img-fluid" alt="Imagem Padrão">
                @endif
            </div>
            
            <!-- Coluna das Informações do Livro -->
            <div class="col-md-6">
                <p><strong>Autor:</strong> {{ $livro->autor }}</p>
                <p><strong>Editora:</strong> {{ $livro->editora }}</p>
                <p><strong>Data de Publicação:</strong> {{ \Carbon\Carbon::parse($livro->publicacao)->format('d/m/Y') }}</p>
                <p><strong>Gênero:</strong> {{ ucfirst($livro->genero) }}</p>
            </div>
            
            <!-- Coluna de Descrição, ocupa toda a largura abaixo das outras colunas -->
            <div class="col-12">
                <p><strong>Descrição:</strong></p>
                <p>{{ $livro->descricao }}</p>
            </div>
        </div>

        <!-- Botão de Voltar para a Lista de Livros -->
        <a href="{{ route('livros.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
