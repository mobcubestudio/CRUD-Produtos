<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Categoria
{
  /**
   * Identificador da categoria
   * @var integer
   */
    public $id_categoria;

  /**
   * Nome da categoria
   * @var string
   */
    public $nome;



    public function cadastrar()
    {
      //INSERIR A CATEGORIA NO BD
        $obDatabase = new Database('categorias');
        $this->id_categoria = $obDatabase->insert([
                                      'nome'    => $this->nome
                                    ]);
      //RETORNAR SUCESSO
        return true;
    }

  /**
   * Método responsável por atualizar a categoria no banco
   * @return boolean
   */
    public function atualizar()
    {
        return (new Database('categorias'))->update('id_categoria = ' . $this->id_categoria, [
                                                                            'nome'    => $this->nome
                                                              ]);
    }

  /**
   * Método responsável por excluir a categoria do banco
   * @return boolean
   */
    public function excluir()
    {
        return (new Database('categorias'))->delete('id_categoria = ' . $this->id_categoria);
    }

  /**
   * Método responsável por obter as categorias
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
    public static function getCategorias($where = null, $order = null, $limit = null)
    {
        return (new Database('categorias'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

  /**
   * Método responsável por buscar uma categoria através do id_categoria
   * @param  integer $id
   * @return Categoria
   */
    public static function getCategoria($id): Categoria
    {
        return (new Database('categorias'))->select('id_categoria = ' . $id)
                                  ->fetchObject(self::class);
    }
}
