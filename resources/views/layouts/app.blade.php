<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título da página, substituído por 'Livros' se não for especificado -->
    <title>@yield('title', 'Livros')</title>
    
    <!-- Meta description para SEO -->
    <meta name="description" content="Sistema de gerenciamento de livros. Cadastrar, editar e listar seus livros.">
    
    <!-- Estilos do Bootstrap e FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Favicon da página -->
    <link rel="icon" href="{{ asset('path/to/your/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <!-- Estrutura principal do aplicativo -->
    <div id="app">
        <div id="header-container">
            <!-- Inclusão do cabeçalho e barra de navegação -->
            @include('partials.header')
            @include('partials.navbar')
        </div>
        
        <!-- Conteúdo principal, substituído em diferentes seções da aplicação -->
        <div class="container" id="content">
            @yield('content')
        </div>
        
        <!-- Inclusão do rodapé -->
        @include('partials.footer')
    </div>

    <!-- Scripts essenciais para interações com Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
