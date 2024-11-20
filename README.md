# Sistema de Matrículas - Prof. Jubilut

## Requisitos
- PHP 8.0 ou superior
- MySQL 5.7 ou superior
- Composer

## Instalação

1. Clone o repositório
2. Execute `composer install`
3. Configure o arquivo de ambiente com as credenciais do banco
4. Execute as migrations: `php vendor/bin/doctrine-migrations migrations:migrate`
5. Execute o seed para criar o usuário admin: `php database/seeds/CriarUsuarioAdmin.php`

7. Credenciais de acesso
- Email: admin@exemplo.com
- Senha: admin123   


## Executando o projeto

1. Execute `php -S localhost:8000 -t public/`

Acesse: http://localhost:8000

