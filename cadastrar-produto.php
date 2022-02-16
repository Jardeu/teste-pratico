<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastre um novo produto ');

use \App\Entity\Produto;
use \App\Entity\Tag;
use \App\Entity\ProdutoTag;

$obProduto = new Produto;
$obProdutoTag = new ProdutoTag;

//PEGA AS TAGS PARA PREENCHER O AUTOCOMPLETE
$tags = Tag::getTags();
$nomes_tags = [];

//VALICAÇÃO DO POST
if (isset($_POST['nome']) && isset($_POST['tags'])) {
    $obProduto->name = $_POST['nome'];
    $obProduto->cadastrar();

    //PEGA O ID DO PRODUTO PELO NOME
    $idProduto = $obProduto::getProdutoPorNome($obProduto->name)->id;

    //PEGA OS NOMES DAS TAGS QUE FORAM DIGITADAS
    $nomes = json_decode($_POST['tagNames']);

    function tagExiste($nome)
    {
        //BUSCA A TAG PELO NOME
        $obTag = Tag::getTagPorNome($nome);

        return ($obTag) ? true : false;
    }

    foreach ($nomes as $nome) {
        //SE EXISTIR UMA TAG COM ESSE NOME, ADICIONA ELA AO PRODUTO
        if (tagExiste($nome)) {
            $obTag = Tag::getTagPorNome($nome);
            $obProdutoTag->product_id = $idProduto;
            $obProdutoTag->tag_id = $obTag->id;
            $obProdutoTag->adicionar();
        }
        //SE NÃO EXISTIR UMA TAG COM O NOME, CADASTRA UMA NOVA
        else {
            $obTag = new Tag;
            $obTag->name = $nome;
            $obTag->cadastrar();

            $obTag2 = Tag::getTagPorNome($nome);
            $obProdutoTag->product_id = $idProduto;
            $obProdutoTag->tag_id = $obTag2->id;
            $obProdutoTag->adicionar();
        }
    }

    header('location: listar-produto.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-produto.php';
include __DIR__ . '/includes/footer.php';
