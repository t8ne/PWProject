# Sound808 - Sistema de Gestão de Música

Este projeto é uma aplicação web desenvolvida em PHP que permite a gestão de músicas, álbuns, géneros, produtores e artistas. O sistema foi desenvolvido com uma estrutura de MVC (Model-View-Controller) e utiliza o servidor Apache com o XAMPP para ambiente de desenvolvimento.

## Funcionalidades Principais

- **Gestão de Músicas**: Criação, visualização, edição e exclusão de músicas, com possibilidade de associar múltiplos produtores.
- **Gestão de Álbuns e Géneros**: Gestão completa de álbuns e géneros musicais, incluindo verificação de associações antes de exclusão.
- **Gestão de Artistas e Produtores**: Criação e associação de artistas e produtores com músicas e álbuns.

## Requisitos

- PHP >= 7.4
- XAMPP (com Apache e MySQL)
- Composer (para dependências PHP, se necessário)

## Configuração do Alias no Apache

Para configurar um alias no Apache e acessar o projeto diretamente através de `http://localhost/projetopw/`, siga estas instruções:

1. **Abra o arquivo `httpd.conf`**:
   
   Adicione a seguinte configuração para definir o diretório do projeto:

    ```apacheconf
    <Directory "C:/xampp/htdocs/PW/ProjetoPW">
        Options Indexes FollowSymLinks Includes ExecCGI
        Allow from all
        AllowOverride All
        Require all granted
    </Directory>
    ```

2. **Abra o arquivo `httpd-autoindex.conf`** (localizado em `/xampp/apache/conf/extra/`) e adicione o alias para o projeto:

    ```apacheconf
    Alias /PWProject/ "C:/xampp/htdocs/PW/ProjetoPW/"
    <Directory "C:/xampp/htdocs/PW/ProjetoPW">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
        Allow from all
    </Directory>
    ```

3. **Reinicie o Apache** através do painel de controle do XAMPP, clicando no botão Stop e de seguida Start para aplicar as mudanças.

Agora já consegue acessar o projeto através do endereço: `http://localhost/PWProject/`

