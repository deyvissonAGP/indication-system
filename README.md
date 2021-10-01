# Sistema de indicação App - API

## Sobre o Projeto

Desenvolver uma API que permita: incluir, listar, excluir e alterar status para indicações, sendo o status: "iniciada" como padrão após registro e os status: "em progresso" e "finalizada" conforme ação do usuário.

Criar estrutura de banco de dados utilizando PostgreSQL, com duas tabelas:

Indicações: ID, NOME, CPF, TELEFONE, EMAIL, STATUS_ID
Status: 1. INICIADA / 2. EM PROCESSO / 3. FINALIZADA


## Instalação
Para rodar o projeto localmente é necessário fazer algumas configurações:
- Clone o projeto em seu computador
- Instale todas as dependências rodando o comando abaixo no terminal
```
composer install
```
- Renomeie o arquivo .env.example para .env e configure o acesso ao banco de dados
- Para rodar as migrations e criar as tabelas necessárias no banco de dados, execute o comando abaixo no terminal
```
php artisan migrate
```

- Para rodar o projeto, execute o comando abaixo no terminal
```
php artisan serve
```
## Endpoints
Para ver os endpoints funcionando, será necessário usar o Postman ou outro de sua escolha

<br><b>Para listar todas as indicações</b>

<b>GET</b> /api/indicacoes

<br><b>Para mostrar indicação por ID</b>

<b>GET</b> /api/indicacoes/1

<br><b>Para cadastrar uma indicação</b>

<b>POST</b> /api/indicacoes/

<br><b>Para alterar dados de uma indicacão</b>

<b>PUT</b> /api/indicacoes/1

<br><b>Para deletar uma indicação</b>

<b>DELETE</b> /api/indicacoes/1


## Repository Design Pattern
Foi utilizado o Repository Pattern no desenvolvimento do Projeto. O Repository Pattern permite um encapsulamento da lógica de acesso a dados, impulsionando o uso da injeção de dependencia (DI) e proporcionando uma visão mais orientada a objetos das interações com a DAL.
