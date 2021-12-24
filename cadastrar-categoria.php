<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar categoria');

use App\Entity\Categoria;
$objCategoria = new Categoria();

//VALIDAÇÃO DO POST
if (isset($_POST['nome'])) {
    $objCategoria->nome = $_POST['nome'];
    $objCategoria->cadastrar();

    header('location: categorias.php?status=success');
    exit;
}

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/formulario-categoria.php';
include __DIR__ . '/body/footer.php';
