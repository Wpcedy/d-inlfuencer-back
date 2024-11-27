# d-inlfuencer-back
Projeto D-Influencer back - PROCESSO SELETIVO

# Requisitos
- Docker

# Configuração

## Subindo os containers
```sh
docker compose up -d
```

## Preparando o ambiente
```sh
docker exec -it php-fpm bash
composer install
php artisan tenants:migrate
```

# Acessando o banco
Acesse o:
```sh
http://localhost:82
```
com os seguintes dados:
```sh
Username: root
Password: root
```

# Acessando o sistema
```sh
http://localhost:8080
```
Para testa se o container subiu corretamente basta usar a rota abaixo:
```sh
http://localhost:8080/ping
```

## Visualizando rotas

Abrir o link do editor swagger web
```sh
https://editor-next.swagger.io/
```
Clicar em File > Import URL e colar a URL abaixo:
```sh
https://raw.githubusercontent.com/Wpcedy/d-inlfuencer-back/main/docs/swagger.yaml
```