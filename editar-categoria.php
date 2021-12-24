<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar categoria');

use App\Entity\Categoria;

//PASTA ONDE SE ENCONTRAM OS ARQUIVOS DO MÓDULO
$pasta = 'categorias';

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA A CATEGORIA
$objCategoria = Categoria::getCategoria($_GET['id']);

//VALIDAÇÃO DA CATEGORIA
if (!$objCategoria instanceof Categoria) {
    header('location: index.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['nome'])) {
    $objCategoria->nome    = $_POST['nome'];
    $objCategoria->atualizar();

    header('location: categorias.php?status=success');
    exit;
}

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/formulario-categoria.php';
include __DIR__ . '/body/footer.php';
