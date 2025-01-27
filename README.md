# Laravel Functional Login System

Este projeto implementa um sistema funcional de login com Laravel, incluindo registro, autenticação e controle de acesso. Ele foi desenvolvido como parte de um projeto de aprendizado para entender como implementar a autenticação no Laravel, utilizando o banco de dados para gerenciar usuários.

## Funcionalidades

- **Página de Login**: Permite que o usuário se autentique com e-mail e senha.
- **Página de Registro**: Permite que um novo usuário se registre fornecendo nome, e-mail, senha e confirmação de senha.
- **Validação de Credenciais**: O sistema valida as credenciais de login e redireciona o usuário para a página inicial se as credenciais estiverem corretas.
- **Hashing de Senha**: As senhas são armazenadas de forma segura utilizando o Bcrypt.
- **Autenticação**: Utiliza o `Auth` do Laravel para gerenciar a autenticação do usuário.

## Tecnologias Utilizadas

- **Laravel 8.x**: Framework PHP utilizado para o desenvolvimento do backend.
- **MySQL**: Banco de dados utilizado para armazenar os usuários.
- **Bootstrap 4**: Para estilização da interface de usuário.

## Estrutura do Banco de Dados

A tabela `users` contém os seguintes campos:

- `id`: Identificador único do usuário (auto-increment).
- `name`: Nome do usuário.
- `email`: E-mail do usuário (único).
- `password`: Senha do usuário (armazenada com o algoritmo Bcrypt).
- `created_at` e `updated_at`: Timestamps automáticos gerados pelo Laravel.

### Migration para a Tabela `users`

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});


Como Rodar o Projeto
Clone o repositório: Para começar, clone o repositório na sua máquina:

git clone https://github.com/vini3821/Laravel-Functional-Login-System.git
Instale as dependências: Navegue até o diretório do projeto e execute o seguinte comando para instalar as dependências:

composer install

Configure o Banco de Dados: Crie o banco de dados crud no MySQL e configure as credenciais no arquivo .env:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=
Execute as migrações: Execute as migrações para criar as tabelas no banco de dados:


php artisan migrate
Inicie o Servidor: Execute o servidor embutido do Laravel para rodar a aplicação:


php artisan serve
Acesse o sistema: Abra o navegador e acesse a URL fornecida, geralmente http://127.0.0.1:8000.

Licença
Este projeto está licenciado sob a MIT License.
