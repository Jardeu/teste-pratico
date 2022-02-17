<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;

$produtos = Produto::getProdutos(null, 'id');

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem-produtos.php';
include __DIR__ . '/includes/footer.php';
