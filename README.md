# Bibliotecas, componentes e banco de dados
- Linguagem de desenvolvimento: PHP 7
- Banco de dados: MySql
- Padrões: Psr-1, Psr-4, Psr-12

# Instruções de uso
Em primeiro lugar, importe o conteúdo do banco de dados através do arquivo **db.sql** na pasta raíz.
Altere as constantes do arquivo app/Db/Database.php seguindo a documentação do arquivo para a conexão correta com o banco de dados.

# Classes
- **App\Db\Database** Classe responsável por todas as transações do banco de dados de forma automatizada, utilizando PDO com tratamento para proteção contra SQL injections.
- **App\Entity\Categoria** Classe responsável pelo CRUD das categorias.
- **App\Entity\Produto** Classe responsável pelo CRUD dos produtos.
- **App\Files\Upload** Classe responsável pelo upload de arquivos para o servidor (nesse projeto está sendo permitido somente envio de MIME types: **image/jpeg**, mas pode ser configurado facilmente para outros types).

# Pasta body
- Essa pasta contém todos os arquivos de corpo do sistema, formulários, listas, etc.
- Esses arquivos são chamados via include nos arquivos na pasta raíz.

# Extras
- Upload de imagem do produto
