<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'Livros')</title>
    <meta name="description" content="Sistema de gerenciamento de livros. Cadastrar, editar e listar seus livros.">
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="icon" href="{{ asset('storage/img/livros.png') }}" type="image/x-icon">
    

    <style>
        /* Ocultar a div #app inicialmente */
        #app {
            display: none; /* Oculta o app por padrão */
        }
    </style>
</head>
<body>
    @include('components.book-loader')
    
    <div id="app">
        <div id="header-container">
            @include('partials.header')
            @include('partials.navbar')
        </div>
        
        <div class="container" id="content">
            @yield('content')
        </div>
        
        @include('partials.footer')
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Função para mostrar o loader e a div #app
        function showLoader() {
            $('.overlay').fadeIn(); 

            // Exibir a div #app 0.5 segundos após o loader
            setTimeout(function() {
                $('#app').fadeIn(500); 
            }, 500); // 0.5 segundos

            // Ocultar o loader após 4 segundos
            setTimeout(function() {
                $('.overlay').fadeOut(); 
            }, 3000);
        }

        // Exibir o loader quando a página for carregada
        $(document).ready(function() {
            showLoader();
        });
    </script>
</body>
</html>
