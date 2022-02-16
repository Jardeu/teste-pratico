<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Edite o produto ');

use \App\Entity\Produto;
use \App\Entity\ProdutoTag;
use App\Entity\Tag;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: listar-produtos.php?status=error');
    exit;
}

//CONSULTA O PRODUTO
$obProduto = Produto::getProduto($_GET['id']);

//PEGA AS TAGS PARA PREENCHER O AUTOCOMPLETE
$tags = Tag::getTags();

//VALIDAÇÃO DO PRODUTO
if (!$obProduto instanceof Produto) {
    header('location: listar-produtos.php?status=error');
    exit;
}

$obProdutoTag = ProdutoTag::getPorProduto($obProduto->id);

//ARRAY COM OS NOMES DAS TAGS
$nomes_tags = [];

foreach ($obProdutoTag as $tag) {
    array_push($nomes_tags, Tag::getTag($tag->tag_id)->name);
}

//SERIALIZAR O ARRAY DE NOMES DE TAGS
$nomes_values = json_encode($nomes_tags);

//VALIDAÇÃO DO POST
if (isset($_POST['nome']) && isset($_POST['tags'])) {
    $obProduto->name = $_POST['nome'];

    //PEGA OS NOMES DAS TAGS QUE FORAM DIGITADAS
    $nomes = json_decode($_POST['tagNames']);

    $obProdutoTag2 = new ProdutoTag;
    $obProdutoTag2->excluirPorProduto($obProduto->id);

    foreach ($nomes as $nome) {
        //SE NÃO EXISTIR UMA TAG COM O NOME, CADASTRA UMA NOVA
        $obTag = Tag::getTagPorNome($nome);
        if (!$obTag) {
            $obTag2 = new Tag;
            $obTag2->name = $nome;
            $obTag2->cadastrar();
        }

        $obTag2 = Tag::getTagPorNome($nome);
        $obProdutoTag2->product_id = $obProduto->id;
        $obProdutoTag2->tag_id = $obTag2->id;
        $obProdutoTag2->adicionar();
    }

    $obProduto->atualizar();

    header('location: listar-produtos.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-produto.php';
include __DIR__ . '/includes/footer.php';
