
## Test Work

URL Admin: /admin

Credentials:
- user: root
- password: root

Run the project by executing the following commands:
- docker compose up -d
- docker compose exec fpm bash
- cp .env.example .env
- composer install
- php artisan migrate
