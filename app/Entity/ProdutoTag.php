<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class ProdutoTag
{
    /**
     * Identificador único do produto
     * @var int
     */
    public $product_id;

    /**
     * Identificador único da tag
     * @var int
     */
    public $tag_id;

    /**
     * Método responsável por adicionar uma tag a um produto
     * @return boolean
     */
    public function adicionar()
    {
        $obDatabase = new Database('product_tag');
        $this->id = $obDatabase->insert([
            'product_id' => $this->product_id,
            'tag_id' => $this->tag_id
        ]);

        return true;
    }

    /**
     * Método responsável por excluir as tags de um produto
     * @return boolean
     */
    public function excluirPorProduto($product)
    {
        return (new Database('product_tag'))->delete('product_id = ' . $product);
    }

    /**
     * Método responsável por excluir os produtos relacionados a uma tag
     * @return boolean
     */
    public function excluirPorTag($tag)
    {
        return (new Database('product_tag'))->delete('tag_id = ' . $tag);
    }

    /**
     * Método responsável por obter os produtos e suas respectivas tags do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getProdutoTags($where = null, $order = null, $limit = null)
    {
        return (new Database('product_tag'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por buscar produtos com base na tag
     * @param integer $id_tag
     * @return array
     */
    public static function getPorTag($id_tag)
    {
        return (new Database('product_tag'))->select('tag_id = ' . $id_tag)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por buscar as tags de um produto
     * @param integer $id_produto
     * @return array
     */
    public static function getPorProduto($id_produto)
    {
        return (new Database('product_tag'))->select('product_id = ' . $id_produto)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
