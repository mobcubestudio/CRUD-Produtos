<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Produto;

$produtos = Produto::getProdutos(null, "nome ASC", 50);

include __DIR__ . '/body/header.php';
include __DIR__ . '/body/lista-produtos.php';
include __DIR__ . '/body/footer.php';
