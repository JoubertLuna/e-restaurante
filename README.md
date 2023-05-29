### Projeto Sistema LARAVEL FILAMENT - e-restaurante ###

### Desenvolvido por Joubert Luna - Instalando o projeto Clonar o repositório ###

https://github.com/JoubertLuna/e-condominio.git

### Instalar as dependências ###

composer install

### Ou em Ambiente de Desenvolvimento ###

composer update

### Criar arquivo de configurações de ambiente ###

Copiar o arquivo de exemplo .env.example para .env na raiz do projeto configurar os detalhes da aplicação e conexão com o banco de dados. Criar a estrutura no banco de dados

php artisan migrate

ou

php artisan migrate:fresh

ou

php artisan migrate:refresh

### Criar usuário admin ###

php artisan db:seed

usuário: Administrador - e-restaurante E-mail: administrador@restaurante.com senha: @admin123

### Iniciar o Servidor de desenvolvimento ###

php artisan serve
