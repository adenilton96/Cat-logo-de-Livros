<!-- resources/views/partials/header.blade.php -->
<header class="header-banner text-white">
    <div class="container">
        <!-- Overlay escura para melhorar contraste e legibilidade do texto sobre a imagem de fundo -->
        <div class="overlay d-flex flex-column align-items-center justify-content-center">
            <h1 class="display-4 margin-top">Catálogo de Livros</h1>
        </div>
    </div>
</header>

<style>
    /* Estilo principal para o banner */
    .header-banner {
        /* Imagem de fundo, centrada e coberta */
        background-image: url("{{ asset('storage/img/estante1.png') }}");
        background-color: #333; /* Cor de fundo para o caso de a imagem não carregar */
        background-size: cover;
        background-position: center;
        height: 400px; /* Altura fixa para garantir proporção do banner */
        position: relative; /* Necessário para a overlay se ajustar ao banner */
    }

    /* Overlay semi-transparente para contraste com a imagem de fundo */
    .header-banner .overlay {
        background-color: rgba(0, 0, 0, 0.6); /* Transparência sobre a imagem */
        color: #fff; /* Cor do texto */
        height: 100%; /* Ocupa toda a altura do banner */
        width: 100%; /* Ocupa toda a largura do banner */
        text-align: center;
    }

    /* Estilo para adicionar margem ao topo do título */
    .margin-top {
        margin-top: 10%; /* Ajusta a posição do título para o centro */
    }

    /* Estilização do título principal */
    .header-banner h1 {
        font-size: 3rem; /* Tamanho do texto */
        font-weight: bold;
    }

    /* Estilo para o parágrafo opcional, caso seja adicionado */
    .header-banner p {
        font-size: 1.25rem;
    }
</style>
