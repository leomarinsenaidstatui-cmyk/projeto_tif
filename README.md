# SESI AquaControl

Sistema desenvolvido para apoiar o controle e o acompanhamento do uso da água em ambientes cadastrados. O projeto reúne uma aplicação web, uma API e um módulo IoT baseado em ESP32.

> **Status do projeto:** a aplicação web e suas rotas de cadastro e autenticação estão em desenvolvimento. No módulo IoT, a conexão Wi-Fi e o acionamento de uma bomba por relé no GPIO 4 já foram implementados e testados. A leitura do sensor de fluxo e a integração das medições com a API ainda estão pendentes.

## Objetivo

O AquaControl tem como objetivo contribuir para o acompanhamento do consumo de água, permitindo organizar usuários e locais e, nas próximas etapas, integrar dados coletados por sensores ao sistema.

## Funcionalidades implementadas na aplicação web

- Página inicial de boas-vindas.
- Tela de login.
- Tela de cadastro de usuários.
- Tela de cadastro de locais.
- Endpoints de API para cadastro de usuários e locais.
- Endpoint de autenticação que valida as credenciais e gera um token de acesso.
- Endpoint para registrar mensagens de boas-vindas.

As funcionalidades podem evoluir durante o desenvolvimento. Recursos de monitoramento de consumo não devem ser considerados concluídos enquanto a leitura do sensor e o envio das medições não estiverem integrados.

## Tecnologias utilizadas

### Aplicação web e API

- **PHP 8.3**
- **Laravel 13**
- **Laravel Sanctum** (dependência de autenticação por tokens)
- **JavaScript**
- **Vite 8**
- **Tailwind CSS 4**
- **HTML e CSS**, com templates Blade do Laravel

### IoT

- **ESP32**
- **Arduino/C++** (firmware do microcontrolador)
- **Wi-Fi**
- **Módulo relé** para acionamento da bomba
- **Bomba de água**
- **Sensor de fluxo de água** — integração em desenvolvimento

## Estrutura do projeto

Principais diretórios da aplicação Laravel:

| Caminho | Descrição |
| --- | --- |
| `app/Http/Controllers` | Controladores das páginas e operações da API |
| `app/Models` | Modelos utilizados para representar os dados |
| `database/migrations` | Estrutura e evolução do banco de dados |
| `resources/views` | Páginas e componentes Blade |
| `resources/js` | Scripts JavaScript da aplicação |
| `resources/css` | Estilos da aplicação |
| `routes/web.php` | Rotas das páginas web |
| `routes/api.php` | Rotas da API |
| `public/` | Arquivos públicos da aplicação |

## Rotas disponíveis

### Páginas web

| Método | Rota | Finalidade |
| --- | --- | --- |
| GET | `/` | Página inicial |
| GET | `/login` | Tela de login |
| GET | `/cadastro_usuario` | Tela de cadastro de usuário |
| GET | `/cadastro_local` | Tela de cadastro de local |
| GET | `/local` | Acesso à tela de cadastro de local |

### API

As rotas abaixo são prefixadas por `/api`:

| Método | Endpoint | Finalidade |
| --- | --- | --- |
| POST | `/api/cadastrar_usuario` | Cadastrar usuário |
| POST | `/api/cadastrar_local` | Cadastrar local |
| POST | `/api/login` | Autenticar usuário e gerar token |
| POST | `/api/mensagens-boas-vindas` | Registrar mensagem de boas-vindas |
| GET | `/api/user` | Consultar usuário autenticado (middleware Sanctum) |

**Observação:** os endpoints representam as rotas atualmente declaradas no projeto. Consulte os controladores para conferir os campos obrigatórios e as regras de validação de cada operação.

## Requisitos

Antes de iniciar, instale:

- PHP 8.3 ou superior, com as extensões exigidas pelo Laravel.
- Composer.
- Node.js e npm.
- Git.
- Um banco de dados compatível com a configuração do Laravel.

O arquivo `.env.example` está configurado inicialmente para SQLite. Caso utilize MySQL com HeidiSQL, ajuste as variáveis `DB_*` no arquivo `.env` para os dados da sua conexão.

## Instalação e execução

1. Clone o repositório:

   ```bash
   git clone https://github.com/leomarinsenaidstatui-cmyk/projeto_tif.git
   cd projeto_tif
   ```

2. Instale as dependências PHP:

   ```bash
   composer install
   ```

3. Crie o arquivo de ambiente:

   **Windows (PowerShell):**
   ```powershell
   Copy-Item .env.example .env
   ```

   **Linux/macOS:**
   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

5. Configure o banco de dados no arquivo `.env`.

   Para usar SQLite, crie o arquivo do banco, caso ainda não exista:

   ```bash
   php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
   ```

   Confira se `DB_CONNECTION=sqlite` está definido no `.env`.

6. Execute as migrations:

   ```bash
   php artisan migrate
   ```

7. Instale as dependências JavaScript e gere os arquivos:

   ```bash
   npm install
   npm run build
   ```

8. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

9. Acesse a aplicação pelo endereço:

   ```
   http://127.0.0.1:8000
   ```

Durante o desenvolvimento front-end, pode-se executar `npm run dev` em outro terminal para iniciar o Vite.

## Módulo IoT — ESP32

O firmware atual do ESP32 realiza a conexão à rede Wi-Fi e disponibiliza um servidor HTTP para controlar a bomba por meio de um relé conectado ao GPIO 4.

Rotas disponibilizadas pelo firmware:

| Método | Rota | Finalidade |
| --- | --- | --- |
| POST | `/bomba/ligar` | Acionar a bomba |
| POST | `/bomba/desligar` | Desligar a bomba |
| GET | `/bomba/status` | Consultar o estado da bomba |

As rotas acima pertencem ao servidor executado no ESP32, não às rotas Laravel listadas na seção da API.

**Etapas ainda necessárias no módulo IoT:**

- Integrar o sensor de fluxo de água ao ESP32.
- Realizar a leitura e o tratamento dos pulsos do sensor.
- Calcular e registrar o volume de água medido.
- Enviar as medições para a API do AquaControl.
- Validar a comunicação entre o dispositivo e a aplicação.

## Documentação

Os documentos técnicos do projeto devem ser organizados e atualizados conforme a evolução do sistema:

- Modelagem conceitual do banco de dados.
- Modelagem lógica do banco de dados.
- Modelagem física do banco de dados.
- Documentação da API.
- Documentação do módulo IoT (em documento separado).
- README da aplicação web.
- README da aplicação mobile.
- Documentação geral do repositório.

## Testes

Para executar os testes automatizados disponíveis no projeto:

```bash
php artisan test
```

## Equipe

Projeto acadêmico desenvolvido no contexto do curso técnico do SESI.

> Preencha esta seção com os nomes dos integrantes, turma e orientação, conforme os dados oficiais do grupo.

## Licença

Este projeto está em desenvolvimento para fins educacionais. Não foi definida uma licença específica para o AquaControl.
