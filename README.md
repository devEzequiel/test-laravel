## Uma api em Laravel 11

Para corresponder a pedida do teste, desenvolvi uma api com a temática Hotels, onde há a possibilidade de adicionar
novos
hotels, com informações a respeito e adicionar os quartos (Rooms). Acredito que consegui
demonstrar
um pouco do meu know-how em Laravel e desenvolvimento de API's.

## Detalhes importantes

- Para facilitar a instalação e teste da api, eu adicionei o Laravel Sail, conforme requerido.
- Não consegui tempo para fazer o Frontend. Mas fico a disposição pra falar mais acerca de Inertia e Vue, pois tenho experiência (Livewire também).
- Criei algumas seeders para popular o banco de dados desde o início, mas encorajo-vos a adicionar seus próprios dados
  afim de testar rotas de POST
- Utilizei a metodologia de Git Flow para demonstrar como costuma ser meu workflow etc.
- Criei uma camada de service para isolar a regra de negócio, repositório para se comunicar com o DB e Contratcs.
- Criei testes unitários.
- Criei Seeders para facilitar.
- Adicionei o arquivo do Postman no projeto.
- Não criei rota de SignUp, pois não achei relevante .

## Requisitos

- Docker:
- [Docker para ubuntu](https://docs.docker.com/engine/install/ubuntu/)
- [Docker para windows](https://docs.docker.com/desktop/install/windows-install/)

Caso queria utilizar o WSL2, no windows, acesse [aqui](https://docs.docker.com/desktop/wsl/).

## Rodando a Api

Clone o repositório e copie o env:

`$ git clone git@github.com:devEzequiel/test-laravel.git` <br />
`$ cd test-laravel` <br />
`$ cp .env.example .env` <br />

Certifique-se que a porta Local 80 esteja disponível <br />.
Certifique-se que a porta Local 3306 (MySQL) esteja disponível <br />.

Então, suba o container, instale as dependências, rode os testes etc.:

1. `$ composer install`
2. `$ ./vendor/bin/sail up -d`
3. `$ ./vendor/bin/sail artisan migrate --seed`
4. `$ ./vendor/bin/sail artisan key:generate`
5. `$ ./vendor/bin/sail test`

Assim a api está funcionando em `localhost:80`

## Auth

A única rota livre é a de Login.
Para acessar as demais, é necessário um **Bearer Token** que é retornado no Response do Login.
<br />

Utilize algum user abaixo para login:

``` json
{
  "email": "admin@test.com",
  "password": "123"
}
```

``` json
{
  "email": "bukly@test.com",
  "password": "123"
}
``` 

``` json
{
  "email": "user@test.com",
  "password": "123"
}
```

- Sistema de Autenticação construido com [Laravel Sanctum](https://laravel.com/docs/11.x/sanctum#main-content)
- Rotas documentadas no [Postman](https://agencia-maple.postman.co/workspace/Bukly~5406e68e-545b-4b8c-9c5b-27c948cc74cc/collection/15603180-194112bc-eef9-4934-8403-1d1ad3b193d3?action=share&creator=15603180) (Ou acesse o arquivo em /.postman)


## Highlights!

- Typing
- AbstractRepository
- ScopeFilter (Models)
- Services
- Requests
- Tests 
- Factories
