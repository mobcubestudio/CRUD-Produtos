<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Categoria;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: categorias.php?status=error');
    exit;
}

//CONSULTA O PRODUTO
$objCategoria = Categoria::getCategoria($_GET['id']);

//VALIDAÇÃO DO PRODUTO
if (!$objCategoria instanceof Categoria) {
    header('location: categorias.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    $objCategoria->excluir();

    header('location: categorias.php?status=success');
    exit;
}

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/confirmar-exclusao-categoria.php';
include __DIR__ . '/body/footer.php';
