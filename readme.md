# API Rest todo list com o laravel

App desenvolvido para a prática da estrutura de API's restful em laravel. O projeto foi desenvolvido com a utilização do repository para a abstração de camada de dados e com a autenticação baseada em tokens JWT. 

A api fornece os endpoints para a administração de um todo list.

## Ferramentas Utilizadas
* [Laravel framework 5.7](https://laravel.com/docs/5.7) 
* [Laravel repository](https://github.com/andersao/l5-repository)
* [Jwt Auth](https://github.com/tymondesigns/jwt-auth) 

##Instalação
* Instale a libs com o comando `composer install`
* Crie o arquivo .env e gere a chave da aplicação `php artisan key:generate`
* Rode as migrations `php artisan migrate`
* Rode os seeders para popular o seu banco com dados de teste `php artisan db:seed`
* No arquivo `.env` insira a variável `JWT_SECRET` ou rode o comando `php artisan jwt:secret` para gerar a assinatura de seus token's gerados pelo jwt-auth
