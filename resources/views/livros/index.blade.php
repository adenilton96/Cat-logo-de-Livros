@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    <!-- Exibe mensagem de sucesso, se houver -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row">
        <!-- Verifica se a lista de livros está vazia -->
        @if($livros->isEmpty())
            <div class="col-md-12 text-center">
                <!-- Exibe imagem e mensagem de estante vazia -->
                <img src="{{ asset('storage/img/empty_shelf.jpg') }}" alt="Estante Vazia" style="width: 300px; height: 300px; object-fit: cover;">
                <h5 class="mt-2">Nenhum livro cadastrado.</h5>
            </div>
        @else
            <!-- Itera sobre cada livro e exibe informações básicas -->
            @foreach ($livros as $livro)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card style-margin h-100">
                        <div class="d-flex justify-content-center">
                            <!-- Exibe imagem do livro ou imagem padrão se não houver -->
                            <img src="{{ $livro->imagem ? 'data:image/jpeg;base64,' . $livro->imagem : asset('storage/img/Books.jpg') }}" 
                                 class="card-img-top" 
                                 alt="Imagem do Livro" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $livro->titulo }}</h5>
                            <h6 class="card-subtitle text-muted">{{ ucfirst($livro->genero) }}</h6>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Botão para ver detalhes do livro -->
                                <a href="{{ route('livros.show', $livro) }}" class="btn btn-primary btn-sm" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <div class="d-flex">
                                    <!-- Botão para editar o livro -->
                                    <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-sm mr-1" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <!-- Botão para deletar o livro, com confirmação -->
                                    <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center mt-4">
        {{ $livros->links('pagination::bootstrap-4', ['class' => 'my-custom-pagination-class']) }}
    </div>
    
    <style>
        .style-margin {
            margin: 5px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
