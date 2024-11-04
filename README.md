# Catálogo de Livros

Este é um sistema de Catálogo de Livros desenvolvido em Laravel com um front-end integrado usando Bootstrap. O objetivo do projeto é permitir a criação, edição, visualização e exclusão de livros, além de realizar buscas e armazenar as imagens dos livros.

## Índice
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Funcionalidades](#funcionalidades)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Uso](#uso)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Contribuição](#contribuição)

## Tecnologias Utilizadas
- **Backend**: Laravel
- **Frontend**: Bootstrap e Blade
- **Banco de Dados**: PostigreSQL 
- **ORM**: Eloquent

## Funcionalidades
- **CRUD de Livros**: 
  - Criar, editar, visualizar e deletar livros.
- **Busca**: 
  - Permite a pesquisa de livros pelo título.
- **Upload de Imagem**: 
  - Carregar imagens dos livros e armazená-las no banco de dados.
- **Paginação**: 
  - Exibe 10 livros por página com paginação.

## Pré-requisitos
- PHP >= 8.0
- Composer
- PostigreSQL
- Node.js e npm (para instalar dependências de front-end, caso necessário)

## Observação 

- **E necesario verificar se a extensão do PDO para PostgreSQL está habilitada no seu ambiente PHP.**
    ```
    ir em php.ini descomentar retirando o ; das variaveis
    extension=pdo_pgsql
    extension=pgsql

  
## Instalação

1. Clone este repositório:
    ```bash
    git clone https://github.com/adenilton96/Catalogo-de-Livros.git
    cd nome-do-repositorio
    ```

2. Instale as dependências do projeto:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Configure o arquivo `.env`:
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - Defina as configurações de banco de dados, chave da aplicação e outras variáveis necessárias.

4. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

5. Cria o Banco de dados de acordo com as variáveis do .env    
    ```bash
    php artisan db:create
    ```
   

6. Execute as migrações e seeders (se houver):
    ```bash
    php artisan migrate
    ```

## Configuração

- **Configuração de Upload de Imagens**:
  - Certifique-se de que o link simbólico para o armazenamento público esteja criado:
    ```bash
    php artisan storage:link
    ```

- **Configuração do Banco de Dados**:
  - No arquivo `.env`, configure as informações do banco de dados conforme sua instalação:
    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=seu_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```
    
## Uso

- Para iniciar o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

## Funcionalidades Principais

- Página de Lista de Livros: exibe uma lista paginada de livros com título, autor e imagem.
- Cadastro de Livro: formulário para adicionar um novo livro com título, autor, descrição e imagem.
- Edição e Exclusão de Livros: opções para editar informações do livro ou excluir.
- Busca: campo de pesquisa no cabeçalho para encontrar livros pelo título.

## Estrutura do Projeto

    ├── app
    │   ├── Http
    │   │   ├── Controllers
    │   │   └── Requests
    │   ├── Models
    ├── resources
    │   ├── views
    │   │   ├── livros
    │   │   └── layouts
    │   └── partials
    ├── routes
    │   └── web.php
    ├── public
    │   └── storage (link simbólico para armazenar imagens)
    └── database
        └── migrations
