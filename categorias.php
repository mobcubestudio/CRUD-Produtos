<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Categoria;

$categorias = Categoria::getCategorias(null, "nome ASC", 50);

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/lista-categorias.php';
include __DIR__ . '/body/footer.php';
