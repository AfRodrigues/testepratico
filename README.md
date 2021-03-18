# Teste técnico (123Milhas)

- Projeto prático destinado a avaliação de conhecimentos. 

## API
- Objetiva consumir dados da API fornecida pela 123Milhas, aplicar as regras pré definidas e retornar os dados agrupados. 

## Configurar

Clone o projeto
```
git clone https://github.com/AfRodrigues/testepratico.git
```
Instale as dependências do projeto
```
composer install
```

### Utilização

 - Se preferir executar **local**, utilize o seguinte comando na raiz do projeto

```
php artisan serve --port=8002
```

 - Agora acesse a url: 
 
 ``` 
 http://localhost:8002/api/v1/voos 
 ```



## Documentação API
 
  - Disponível na pasta /docs para Insomnia e Postman.
  - Importe um desses arquivos para testar a API.


## Dependências
* [Guzzle HTTP](https://docs.guzzlephp.org/en/stable)

## Desenvolvido com
* [Laravel 7](https://laravel.com/) - Framework PHP
* [Composer](https://getcomposer.org/) - Gerenciador de dependências PHP 
