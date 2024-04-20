
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">API para Listagem de Produtos</h1>
<h4 align="center">Uma API para aplicação de descontos em produtos</h4>

## Sobre o projeto
Este projeto tem como finalidade atestar meus conhecimentos nos seguintes pontos:
 
- Desenvolvimento de aplicações [Laravel](https://laravel.com/)
- Desenvolvimento de API's REST utilizando [Laravel](https://laravel.com/)
- ORM [Eloquent](https://laravel.com/docs/11.x/eloquent)
- Arquitetura [DDD](https://medium.com/cwi-software/domain-driven-design-do-in%C3%ADcio-ao-c%C3%B3digo-569b23cb3d47)
- Implementação de [Camada de Serviço](https://davislevine.medium.com/service-design-patterns-930203c8df37)
- [Docker](https://www.docker.com/)
- [Laravel Sail](https://laravel.com/docs/11.x/sail)

## Por que este projeto?
- Este projeto faz parte do meu portfólio pessoal, uma maneira de comprovar meus conhecimentos em [Laravel 11x](https://laravel.com/).
- A construção de API's faz parte da rotina de um desenvolvedor back-end, então esse projeto serviu como uma simulação da rotina real de um desenvolvedor back-end.

## Sobre a modelagem do Banco de Dados
- O desafio consistia na construção de uma API REST utilizando Laravel que permitisse a aplicação de descontos 
- Para o desafio foram criadas as seguintes tabelas:
	
| Table | Description |
| ------------| --- |
| products_category | Contêm todas as categorias dos produtos |
| products | Contêm todos os produtos |

## Hierarquia dos Descontos
Levando em consideração que nossas aplicações precisam ser flexíveis e escaláveis, tomei por bem fazer algumas alterações no desafio proposto:

- A coluna price na tabela de produtos inicialmente fora definida como integer, porém na minha visão isso não apresenta ganhos reais, mas sim limitando possíveis produtos com valores decimais, além do que em algum ponto futuro talvez fosse necessário mudar a tipagem dessa coluna o que poderia ser algo trabalhoso
- Alterações na política de descontos:
	- Removi a regra de desconto por categoria do código, assim a gestão do sistema poderá (em um futuro provável) implementar sua política de descontos em cada uma das categorias
	- Removi a regra de desconto baseado no SKU do código, passando agora diretamente para uma nova coluna (discount) na tabela de produtos.

Com a alteração na política de descontos, surgiu um novo questionamento: "Qual desconto prevalece em caso de termos desconto tanto no produto quanto na categoria?". Para resolver esse questionamento defini que o desconto do produto sempre terá maior prioridade quando comparado ao desconto na categoria, pois se trata de um desconto específico.


## Setup
1. Clone o repositório
2. Acesse a raíz do projeto. 
3. Execute o comando:

```
$ composer install
```
```bash
$ composer require  laravel/sail  --dev
```
4. Uma vez que as dependências tenham sido devidamente intaladas, você pode executar:
```bash
$ ./vendor/bin/sail up -d
```
5. Uma vez que o projeto esteja rodando, você precisa rodar as migrations, para isso execute os comandos:
```bash
# Acesse o container
$ docker exec -it test-product-list-laravel.test-1 bash
```
```bash
$ php artisan migrate
```
6. Para realizar carga de dados para teste, utilize o comando:
```bash
$ php artisan db:seed
```
7. O projeto deve estar disponível no endereco: [localhost](http://localhost:3000/) 

## Observações importantes
- É aconselhável que você tenha em sua máquina o [postman](https://www.postman.com/) para que possa fazer os devidos testes sobre as rotas disponíveis nesta API.
- A utilização do Docker é fortemente aconselhada

## Dependências e suas versões
- [PHP](https://www.php.net/releases/8.3/en.php) 8.3
- [Laravel](https://laravel.com/docs/11.x) 11x
- [Laravel Sail](https://laravel.com/docs/11.x/sail)
- [MySQL](https://www.mysql.com/)

## Observações importantes
- Tenha as collections necessárias para testar [clicando aqui](https://github.com/lucasfullstackdev/coworking/blob/develop/collections.json)

## Considerações finais
- API poderá passar por alterações, esta API não representa uma amostra real, devendo ser utilizada apenas para se ter uma noção sobre como funciona um API REST.
- Qualquer dúvida ou sugestão, entre em contato pelo e-mail: lucas.fullstack.dev@gmail.com
