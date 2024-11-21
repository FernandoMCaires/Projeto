# Sistema de Matrículas - Prof. Jubilut

## Requisitos
- PHP 8.0 ou superior
- MySQL 5.7 ou superior
- Composer

## Instalação

1. Clone o repositório
2. Execute `composer update` e `composer install` para instalar as dependências
3. Crie um banco de dados com o nome admin no mySQL Workbench e deixe o server on.
4. Confira se cli-config.php está configurado corretamente com o banco de dados.
5. Rode o seguinte comando para instalar o doctrine migrations: `composer require doctrine/migrations`
6. Execute as migrations: `php vendor/bin/doctrine-migrations migrations:migrate`
7. Execute o seed para criar o usuário admin: `php database/seeds/CriarUsuarioAdmin.php`
8. Pronto! Agora você já está com o banco de dados configurado e alimentado com os dados iniciais.
9. Credenciais de acesso
- Email: admin@exemplo.com
- Senha: admin123   


## Executando o projeto

1. Execute `php -S localhost:8000 -t public/`

Acesse: http://localhost:8000

