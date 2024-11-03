@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('livros.update', $livro) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <!-- Título -->
                <div class="form-group col-md-6">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" value="{{ $livro->titulo }}" class="form-control" required>
                </div>

                <!-- Autor -->
                <div class="form-group col-md-6">
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" value="{{ $livro->autor }}" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <!-- Editora -->
                <div class="form-group col-md-6">
                    <label for="editora">Editora:</label>
                    <input type="text" name="editora" value="{{ $livro->editora }}" class="form-control" required>
                </div>

                <!-- Data de Publicação -->
                <div class="form-group col-md-3">
                    <label for="publicacao">Data de Publicação:</label>
                    <input type="date" name="publicacao" value="{{ $livro->publicacao }}" class="form-control" max="{{ date('Y-m-d') }}" required onkeydown="return false;">
                </div>

                <!-- Gênero -->
                <div class="form-group col-md-3">
                    <label for="genero">Gênero:</label>
                    <select name="genero" class="form-control" required>
                        <option value="{{ $livro->genero }}">{{ ucfirst($livro->genero) }}</option>
                        <option value="terror">Terror</option>
                        <option value="suspense">Suspense</option>
                        <option value="acao">Ação</option>
                        <option value="romance">Romance</option>
                        <option value="aventura">Aventura</option>
                        <option value="fantasia">Fantasia</option>
                        <option value="sci-fi">Ficção Científica</option>
                    </select>
                </div>
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control" rows="4">{{ $livro->descricao }}</textarea>
            </div>

            <!-- Imagem do Livro -->
            <div class="form-group">
                <label for="imagem">Imagem do Livro:</label>
                <div class="custom-file">
                    <input type="file" name="imagem" class="custom-file-input" id="imagem" accept="image/*" onchange="previewImage(event)">
                    <label class="custom-file-label" for="imagem">Escolher arquivo...</label>
                </div>
                <small class="form-text text-muted">Selecione uma imagem do livro (opcional).</small>
                
                <!-- Pré-visualização da imagem -->
                <div class="mt-2">
                    <img id="image-preview" 
                         src="{{ $livro->imagem ? 'data:image/jpeg;base64,' . $livro->imagem : asset('storage/img/placeholder.jpg') }}" 
                         alt="Pré-visualização" 
                         style="display: {{ $livro->imagem ? 'block' : 'none' }}; max-width: 100%; height: auto;">
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>

    <!-- Script para Pré-visualização da Imagem -->
    <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '{{ asset("storage/img/placeholder.jpg") }}';
            preview.style.display = 'none';
        }
    }
    </script>
@endsection
