<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Produto
{
  /**
   * Identificador do produto
   * @var integer
   */
    public $id_produto;

  /**
   * Nome do produto
   * @var string
   */
    public $nome;

  /**
   * Descrição do produto
   * @var string
   */
    public $descricao;

  /**
   * Categorias do produto
   * @var string
   */
    public $categorias;

  /**
   * Sku (código) do produto
   * @var string
   */
    public $sku;

  /**
   * Preço do produto
   * @var double
   */
    public $preco;

  /**
   * Quantidade de produtos disponíveis
   * @var integer
   */
    public $quantidade;

    /**
     * Imagem do produto
     * @var string
     */
    public $imagem;

  /**
   * Método responsável por cadastrar uma novo produto no banco
   * @return boolean
   */
    public function cadastrar()
    {
      //INSERIR O PRODUTO NO BD
        $obDatabase = new Database('produtos');
        $this->id_produto = $obDatabase->insert([
                                      'nome'    => $this->nome,
                                      'descricao' => $this->descricao,
                                      'sku'     => $this->sku,
                                      'preco'      => $this->preco,
                                      'quantidade'      => $this->quantidade,
                                      'categorias'      => $this->categorias
                                    ]);

      //RETORNAR SUCESSO
        return true;
    }


  /**
   * Método responsável por atualizar o produto no banco
   * @return boolean
   */
    public function atualizar()
    {
        return (new Database('produtos'))->update('id_produto = ' . $this->id_produto, [
                                                                            'nome'    => $this->nome,
                                                                            'descricao' => $this->descricao,
                                                                            'sku'     => $this->sku,
                                                                            'preco'      => $this->preco,
                                                                            'quantidade'      => $this->quantidade,
                                                                            'categorias'      => $this->categorias
                                                              ]);
    }

  /**
   * Método responsável por excluir o produto do banco
   * @return boolean
   */
    public function excluir()
    {
        //EXCLUI FOTO DO PRODUTO SE EXISTIR
        if (is_file('images/product/produto-' . $this->id_produto . '.jpg')) {
            unlink('images/product/produto-' . $this->id_produto . '.jpg');
        }
        return (new Database('produtos'))->delete('id_produto = ' . $this->id_produto);
    }

  /**
   * Método responsável por obter os produtos
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
    public static function getProdutos($where = null, $order = null, $limit = null)
    {
        return (new Database('produtos'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

  /**
   * Método responsável por buscar um produto através do id_produto
   * @param  integer $id
   * @return Produto
   */
    public static function getProduto($id): Produto
    {
        return (new Database('produtos'))->select('id_produto = ' . $id)
                                  ->fetchObject(self::class);
    }

    /**
     * Método responsável por obter a imagem do produto através do id
     * @param integer
     * @return string [caminho do arquivo]
     */
    public function getImagem()
    {

      //VALIDA SE O ARQUIVO EXISTE
        if (is_file('images/product/produto-' . $this->id_produto . '.jpg')) {
            $this->imagem = 'images/product/produto-' . $this->id_produto . '.jpg';
        } else {
            $this->imagem = 'images/produto-sem-foto.jpg';
        }

        return $this->imagem;
    }

    /**
     * Método responsável por obter o total de produtos no bd
     * @return integer
     */
    public function getTotal()
    {
        return (new Database('produtos'))->select()->rowCount();
    }
}
