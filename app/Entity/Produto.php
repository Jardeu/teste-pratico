<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Produto
{

    /**
     * Identificador único do produto
     * @var int
     */
    public $id;

    /**
     * Nome do produto
     * @var string
     */
    public $name;

    /**
     * Método responsável por cadastrar um novo produto
     * @return boolean
     */
    public function cadastrar()
    {
        $obDatabase = new Database('product');
        $this->id = $obDatabase->insert([
            '`name`' => $this->name
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar o produto no banco
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('product'))->update('id = ' . $this->id, ['`name`' => $this->name]);
    }

    /**
     * Método responsável por excluir o produto do banco
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('product'))->delete('id = ' . $this->id);
    }

    /**
     * Método responsável por obter os produtos do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getProdutos($where = null, $order = null, $limit = null)
    {
        return (new Database('product'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável pro buscar um produto com base no ID
     * @param integer $id
     * @return array
     */
    public static function getProduto($id)
    {
        return (new Database('product'))->select('id = ' . $id)
            ->fetchObject(self::class);
    }

    /**
     * Método responsável pro buscar uma tag com base no nome
     * @param string $name
     * @return array
     */
    public static function getProdutoPorNome($nome)
    {
        return (new Database('product'))->select('`name` = "' . $nome . '"')
            ->fetchObject(self::class);
    }
}
