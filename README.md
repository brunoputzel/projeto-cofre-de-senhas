# 🛡️ Projeto Cofre de Senhas Pessoais

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-38B2AC?style=for-the-badge&logo=tailwind-css)

## 📖 Sumário

- [Sobre o Projeto](#-sobre-o-projeto)
- [Funcionalidades Principais](#-funcionalidades-principais)
- [Demonstração em Vídeo](#-demonstração-em-vídeo)
- [Critérios de Segurança Implementados](#-critérios-de-segurança-implementados)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Como Executar o Projeto Localmente](#-como-executar-o-projeto-localmente)
- [Licença](#-licença)

## 📌 Sobre o Projeto

O **Cofre de Senhas Pessoais** é uma aplicação web segura, desenvolvida como um projeto acadêmico com foco na implementação de funcionalidades de software com uma forte ênfase em aspectos de **Segurança da Informação no Ambiente Lógico**. A aplicação permite que usuários armazenem e gerenciem suas credenciais de diversos serviços de forma centralizada e protegida.

---

## ✨ Funcionalidades Principais

- **Autenticação de Usuário:** Sistema completo de registro e login.
- **Política de Senha Forte:** Requisitos robustos para a senha de acesso à plataforma.
- **CRUD de Credenciais:** Funcionalidades para Criar, Ler, Atualizar e Deletar as senhas armazenadas.
- **Visualização Segura:** Botão de "mostrar/ocultar" senha para cada credencial.
- **Perfil de Usuário:** Página para o usuário gerenciar seus dados e alterar sua senha principal.
- **Design Responsivo:** Interface limpa e funcional, construída com Tailwind CSS.

---

## 🎬 Demonstração

https://youtu.be/Vt8ymKGg1A4

---

## Critérios de Segurança Implementados

Este projeto foi desenvolvido com uma mentalidade "security-first". Abaixo estão os principais controles de segurança lógica implementados:

#### 1. **Controle de Acesso e Autenticação**
   - Utilizado o ecossistema do **Laravel Breeze** para uma base de autenticação robusta.
   - Todas as rotas sensíveis (como o cofre) são protegidas pelo middleware `auth`, garantindo que apenas usuários autenticados possam acessá-las.

#### 2. **Hashing da Senha de Autenticação**
   - As senhas dos usuários da plataforma **jamais** são armazenadas em texto plano. Elas são processadas com o algoritmo **Bcrypt** no momento do registro e da atualização, armazenando apenas o hash irreversível no banco de dados.

#### 3. **Criptografia de Dados Sensíveis**
   - As senhas das credenciais armazenadas no cofre são **criptografadas** no banco de dados utilizando o facade `Crypt` do Laravel, que implementa o algoritmo **AES-256-GCM**.
   - Um **mutator** no Model `Credential` garante que os dados sejam sempre criptografados ao salvar e descriptografados apenas no momento da exibição, automatizando a segurança.

#### 4. **Política de Senha Forte**
   - No registro e na troca de senha, é aplicada uma política rigorosa através da regra `Password` do Laravel, exigindo:
     - Mínimo de **10 caracteres**.
     - Presença de **letras maiúsculas e minúsculas** (`mixedCase`).
     - Presença de **números**.
     - Presença de **símbolos** (caracteres especiais).

#### 5. **Prevenção contra Ataques de Força Bruta**
   - O **Login Throttling** nativo do Laravel está ativo, bloqueando tentativas de login para um usuário/IP após 5 tentativas falhas por um período de 1 minuto.

#### 6. **Proteção contra Cross-Site Request Forgery (CSRF)**
   - Todos os formulários que enviam dados (`POST`, `PUT`) são protegidos com a diretiva Blade `@csrf`, garantindo que as requisições se originem da própria aplicação.

#### 7. **Validação de Entradas no Servidor**
   - Todos os dados recebidos de formulários são rigorosamente validados no backend através do método `$request->validate()` nos controllers.

#### 8. **Proteção contra SQL Injection**
   - O uso exclusivo do **Eloquent ORM** do Laravel, que utiliza *prepared statements*, elimina a vulnerabilidade a ataques de injeção de SQL.

#### 9. **Proteção contra Cross-Site Scripting (XSS)**
   - A sintaxe de exibição padrão do Blade (`{{ }}`) escapa automaticamente todo o output, prevenindo a execução de scripts maliciosos.

---

## Como Executar o Projeto Localmente

Para executar este projeto em seu ambiente local, siga os passos abaixo:

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/](https://github.com/)[SEU_USUARIO]/[SEU_REPOSITORIO].git
    ```

2.  **Navegue até a pasta do projeto:**
    ```bash
    cd nome-da-pasta-do-projeto
    ```

3.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

4.  **Crie o arquivo de ambiente:**
    *Copie o arquivo de exemplo `.env.example` para um novo arquivo chamado `.env`.*
    ```bash
    copy .env.example .env
    ```

5.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Configure o banco de dados:**
    *Abra o arquivo `.env` e adicione as credenciais do seu banco de dados MySQL local.*

7.  **Execute as migrações:**
    *Este comando irá criar todas as tabelas necessárias no seu banco de dados.*
    ```bash
    php artisan migrate
    ```

8.  **Instale as dependências do frontend:**
    ```bash
    npm install
    ```

9.  **Compile os assets e inicie o "vigia":**
    *Mantenha este comando rodando em um terminal separado durante o desenvolvimento.*
    ```bash
    npm run dev
    ```

10. **Inicie o servidor web:**
    *Utilize o Apache do XAMPP ou o servidor embutido do PHP.*
    ```bash
    php artisan serve
    ```
    Acesse o projeto em `http://127.0.0.1:8000`.

---

## 📄 Licença

Este projeto está sob a licença MIT.

---