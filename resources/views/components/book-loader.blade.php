<!-- resources/views/components/book-loader.blade.php -->
<div class="overlay loader" style="display: none;">
    <div class="book-loader">
        <div class="page one"></div>
        <div class="page two"></div>
        <div class="page three"></div>
        <div class="page four"></div>
        <div class="page five"></div>
        <div class="page six"></div>
    </div>
</div>

<style>
    /* Contêiner de sobreposição para cobrir toda a tela */
    .overlay.loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: #232323ed; 
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000; 
    }

    /* Contêiner do loader */
    .book-loader {
        position: relative;
        width: 60px;
        height: 60px;
    }

    /* Configurações das páginas do livro */
    .page {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 3px;
        height: 100px;
        background-color: white;
        border-radius: 2px;
        transform-origin: bottom center;
        animation: flip 2.5s ease-in-out infinite; /* Animação padrão para páginas que têm loop */
    }

    .page.one {
        transform: rotate(90deg); 
        animation-delay: 0.5s; 
    }

    .page.two  { 
        transform: rotate(90deg); 
        animation-delay: 0.8s; 
    }

    .page.three  { 
        transform: rotate(90deg); 
        animation-delay: 1.1s; 
    }
    .page.four { 
        transform: rotate(90deg); 
        animation-delay: 1.4s; 
    }
    .page.five { 
        width: 6px;
        background-color: #795548; /* Cor da página */
        transform: rotate(90deg); 
        animation: flip-once 1s ease-in-out forwards; /* Animação única */
        animation-delay: 0s; /* Início imediato */
    }
    .page.six  { 
        width: 6px;
        background-color: #795548; 
        transform: rotate(90deg); 
        animation-delay: 1.8s; 
        animation: none; /* Manter a página 6 estática */
    }

    /* Animação de abrir e fechar com pausa */
    @keyframes flip {
        0% { transform: rotate(90deg); }
        37.5% { transform: rotate(-90deg); }
        100% { transform: rotate(-90deg); }
    }

    /* Animação única para a página one */
    @keyframes flip-once {
        0% { transform: rotate(90deg); }
        100% { transform: rotate(-90deg); } /* Terminando na posição -90 */
    }
</style>
