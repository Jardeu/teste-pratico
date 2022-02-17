# Teste de cadastro de produtos
Teste prático do Desafio Promobit

## Setup (como executar o projeto)
- Clone este repositório.
- Certifique-se que tenha instalado o Composer (caso não tenha instalado, baixe pelo site oficial: https://getcomposer.org/download).
- Navegue até a pasta do projeto e execute o comando abaixo para que sejam criados os arquivos responsáveis pelo autoload das classes. 

  ```
  composer install
  ```
- Certifique-se de ter instalado também o [Docker](https://docs.docker.com/get-docker/) e o [Docker compose](https://docs.docker.com/compose/install/).
- Ainda na pasta do projeto, execute o comando abaixo

  ```
    docker-composer up -d
  ```
- Acesse [``http://localhost:8001``](http://localhost:8001).

## SQL de extração de relatório de relevancia de produtos

```sql
SELECT t.name as tags, COUNT(pt.product_id) AS qtd 
FROM tag t 
INNER JOIN product_tag pt ON t.id = pt.tag_id
GROUP BY t.name
ORDER BY qtd DESC
```
