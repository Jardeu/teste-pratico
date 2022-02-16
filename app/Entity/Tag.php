<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Tag
{

    /**
     * Identificador único da tag
     * @var int
     */
    public $id;

    /**
     * Nome da tag
     * @var string
     */
    public $name;

    /**
     * Método responsável por cadastrar uma nova tag
     * @return boolean
     */
    public function cadastrar()
    {
        $obDatabase = new Database('tag');
        $this->id = $obDatabase->insert([
            '`name`' => $this->name
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar a tag no banco
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('tag'))->update('id = ' . $this->id, ['`name`' => $this->name]);
    }

    /**
     * Método responsável por excluir a tag do banco
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('tag'))->delete('id = ' . $this->id);
    }

    /**
     * Método responsável por obter as tags do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getTags($where = null, $order = null, $limit = null)
    {
        return (new Database('tag'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por buscar uma tag com base no ID
     * @param integer $id
     * @return array
     */
    public static function getTag($id)
    {
        return (new Database('tag'))->select('id = ' . $id)
            ->fetchObject(self::class);
    }

    /**
     * Método responsável por buscar uma tag com base no nome
     * @param string $name
     * @return array
     */
    public static function getTagPorNome($nome)
    {
        return (new Database('tag'))->select('`name` = "' . $nome . '"')
            ->fetchObject(self::class);
    }
}
