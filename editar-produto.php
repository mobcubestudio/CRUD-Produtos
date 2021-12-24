<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar produto');

use App\Entity\Produto;

//CARREGA AS CATEGORIAS CADASTRADAS NO BD
use App\Entity\Categoria;
$categorias = Categoria::getCategorias(null, "nome ASC", 20);

//CARREGA A CLASSE DE UPLOAD DE ARQUIVOS
use App\Files\Upload;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: produtos.php?status=error');
    exit;
}

//CONSULTA O PRODUTO
$objProduto = Produto::getProduto($_GET['id']);

//VALIDAÇÃO DO PRODUTO
if (!$objProduto instanceof Produto) {
    header('location: produtos.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['nome'], $_POST['descricao'], $_POST['preco'])) {
    //MONTA STRING DE CATEGORIAS
    $i = 0;
    $categorias_add = '';
    foreach ($_POST['categorias'] as $post_categorias) {
        if ($i > 0) {
            $categorias_add .= '|';
        }
        $categorias_add .= $post_categorias;
        $i++;
    }

    $objProduto->nome    = $_POST['nome'];
    $objProduto->descricao = $_POST['descricao'];
    $objProduto->sku     = $_POST['sku'];
    $objProduto->preco     = $_POST['preco'];
    $objProduto->quantidade     = $_POST['quantidade'];
    $objProduto->categorias     = $categorias_add;
     $objProduto->atualizar();

     //ENVIA A IMAGEM DO PRODUTO COM O NOME "produto-{ID DO PRODUTO}
    if (isset($_FILES['imagem'])) {
        $objUpload = new Upload($_FILES['imagem']);
        $objUpload->setName("produto-" . $objProduto->id_produto);
        $sucesso = $objUpload->upload(__DIR__ . '/images/product');
    }

    header('location: produtos.php?status=success');
    exit;
}

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/formulario-produto.php';
include __DIR__ . '/body/footer.php';
