<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Produto;

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
if (isset($_POST['excluir'])) {
    $objProduto->excluir();

    header('location: produtos.php?status=success');
    exit;
}

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/confirmar-exclusao-produto.php';
include __DIR__ . '/body/footer.php';
