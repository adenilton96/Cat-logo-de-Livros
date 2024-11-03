<!-- resources/views/partials/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light style-navbar">
    <div class="container">
        <!-- Verifica a rota atual e exibe o texto correspondente -->
        <h2>
            @if (request()->routeIs('livros.index'))
                Lista de Livros
            @elseif (request()->routeIs('livros.create'))
                Cadastrar Novo Livro
            @elseif (request()->routeIs('livros.edit'))
                Editar Livro
            @elseif (request()->routeIs('livros.show'))
                Detalhes do Livro
            @else
                Home
            @endif
        </h2>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('livros.index') }}">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('livros.create') }}">Cadastrar Livro</a>
                </li>
            </ul>

            <!-- Formulário de busca -->
            <form action="{{ route('livros.index') }}" method="GET" class="form-inline my-2 my-lg-0">
                <!-- Botão de Dropdown ou Limpar Filtros -->
                @if(request('titulo') || request('autor') || request('genero') || request('data') || request('editora'))
                    <a href="{{ route('livros.index') }}" class="btn btn-outline-danger mr-2">Limpar Filtros</a>
                @else
                    <div class="dropdown mr-2" id="dropdownFiltros">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="filtroDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filtros
                        </button>
                        
                        <!-- Conteúdo do Dropdown alinhado à esquerda -->
                        <div class="dropdown-menu dropdown-menu-right p-4" aria-labelledby="filtroDropdown">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Buscar pelo título" value="{{ request('titulo') }}">
                            </div>
                            <div class="form-group mt-2">
                                <label for="autor">Autor</label>
                                <input type="text" name="autor" class="form-control" placeholder="Buscar pelo autor" value="{{ request('autor') }}">
                            </div>
                            <div class="form-group mt-2">
                                <label for="editora">Editora</label>
                                <input type="text" name="editora" class="form-control" placeholder="Buscar pela editora" value="{{ request('editora') }}">
                            </div>
                            <div class="form-group mt-2">
                                <label for="genero">Gênero</label>
                                <select class="form-control" name="genero" onclick="event.stopPropagation()">
                                    <option value="">Selecionar gênero</option>
                                    <option value="terror" {{ request('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
                                    <option value="suspense" {{ request('genero') == 'suspense' ? 'selected' : '' }}>Suspense</option>
                                    <option value="acao" {{ request('genero') == 'acao' ? 'selected' : '' }}>Ação</option>
                                    <option value="romance" {{ request('genero') == 'romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="aventura" {{ request('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
                                    <option value="fantasia" {{ request('genero') == 'fantasia' ? 'selected' : '' }}>Fantasia</option>
                                    <option value="sci-fi" {{ request('genero') == 'sci-fi' ? 'selected' : '' }}>Ficção Científica</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="data">Data de Publicação</label>
                                <input type="date" name="data" class="form-control" max="{{ date('Y-m-d') }}" value="{{ request('data') }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Aplicar Filtros</button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
</nav>

<style>
    .style-navbar {
        background-color: #dfdfdf !important;
        margin-bottom: 30px;
    }
    .navbar-light .navbar-nav .nav-link {
        color: black;
    }
</style>