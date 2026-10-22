#  PimStore — E-commerce

Sistema de e-commerce desenvolvido em grupo como projeto acadêmico.

##  Tecnologias

* HTML
* CSS
* JavaScript
* PHP
* MySQL
* XAMPP

##  Funcionalidades

* Cadastro e login de usuários
* Login de administrador
* Visualização de produtos
* Adição e gerenciamento de produtos
* Carrinho de compras
* Favoritos
* Perfil de usuário
* Gerenciamento de pedidos

##  Como executar

### 1. Clonar o repositório

Coloque o projeto dentro da pasta `htdocs` do XAMPP:

```text
C:\xampp\htdocs\e-commerce-main
```

### 2. Iniciar o XAMPP

No XAMPP Control Panel, inicie:

* Apache
* MySQL

### 3. Configurar o banco de dados

Acesse:

```text
http://localhost/phpmyadmin
```

Crie um banco chamado:

```text
pimstore_ecommerce
```

Depois importe o arquivo:

```text
pimstore_ecommerce (1).sql
```

### 4. Executar o projeto

Abra no navegador:

```text
http://localhost/e-commerce-main/frontend/
```

## Organização após a refatoração

A aplicação continua em **PHP + HTML/CSS/JavaScript + MySQL**. **As páginas mantêm
extensão `.php`** porque exibem informações dinâmicas, mas não fazem consultas ao
banco nem validações de formulário diretamente.

```text
e-commerce-main/
├── frontend/                 # Páginas visuais em PHP/HTML
├── backend/
│   ├── controllers/          # Inicialização, permissões e dados de cada página
│   ├── repositories/         # Consultas e alterações de produtos no MySQL
│   ├── auth.php              # Proteção das páginas administrativas e do usuário
│   ├── bootstrap.php         # Sessão e funções comuns
│   └── *.php                 # Processamento de login, cadastro e produtos
├── includes/                 # Partes compartilhadas da interface (cabeçalho, etc.)
├── assets/
│   ├── css/                  # Estilos (preservados)
│   └── js/                   # Scripts (inclusive scripts antes embutidos nas páginas)
├── db/conexao.php            # Configuração do MySQL
├── uploads/                  # Imagens dos produtos
└── pimstore_ecommerce (1).sql # Estrutura e dados de exemplo
```

### Caminho das requisições

1. O navegador acessa `frontend/index.php`.
2. A página carrega `backend/controllers/home.php` **antes de emitir HTML**.
3. O controlador usa `backend/repositories/produtos.php` para consultar o MySQL.
4. A página visual recebe `$produtos` e monta a interface, sem SQL embutido.
5. Formulários enviam `POST` aos arquivos `backend/*service.php` e são redirecionados de volta.

### Configuração local

- Coloque **a pasta inteira** `e-commerce-main` dentro de `C:\xampp\htdocs`.
- Inicialize Apache e MySQL no XAMPP.
- Crie o banco `pimstore_ecommerce` no phpMyAdmin e importe `pimstore_ecommerce (1).sql`.
- Confira usuário e senha no arquivo `db/conexao.php` (`root` / senha vazia é apenas o padrão local).
- Abra `http://localhost/e-commerce-main/frontend/` e não os arquivos diretamente no computador.
- Para testar o cadastro de produto, faça login como administrador e acesse o menu de produtos.
- O diretório `uploads/` deve permitir gravação pelo servidor para novas imagens.

### Limites herdados do projeto original

- **A criação pública de administradores já existia**: antes de publicar na Internet, restrinja
  essa funcionalidade, remova os usuários de exemplo do SQL e configure credenciais seguras.
- Os botões de checkout e alguns links (por exemplo `pedidos.php`, `painel_admin.php`,
  `editar-perfil.php`) não possuíam implementação no projeto recebido. Esta organização
  não cria uma finalização de pedido/pagamento do zero.
- Carrinho e favoritos são persistidos no navegador (`localStorage`), não no MySQL.
- O código foi revisado e validado com `php -l`; testes reais de login, operações com
  produtos e outros fluxos que dependem do MySQL precisam ser feitos em um XAMPP
  com a base importada.

##  Projeto

Projeto desenvolvido em grupo para fins acadêmicos. <br>
Integrantes:  
OTAVIO FERREIRA DO PRADO <br>
GUILHERME CORDEIRO DOS SANTOS <br>
HENRIQUE GOMES FREITAS <br>
THIAGO LUCAS M DE ALMEIDA <br>
PEDRO HENRIQUE DUMAS DA CRUZ <br>

<img src="https://github.com/user-attachments/assets/747b43b0-c94b-4ded-933d-110ca15be0d4" width="800">

