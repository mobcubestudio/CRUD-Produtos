<?php

namespace App\Files;

class Upload
{
    /**
   * Nome do arquivo
   * @var string
   */
    private $name;

  /**
   * Extensão do arquivo
   * @var string
   */
    private $extension;

  /**
   * Tipo do arquivo
   * @var string
   */
    private $type;

  /**
   * Temp Name do arquivo
   * @var string
   */
    private $tmpName;

  /**
   * Código de erro do processo
   * @var integer
   */
    private $error;

  /**
   * Tamanho do arquivo
   * @var integer
   */
    public $size;


    /**
   * Construtor da classe
   * @param array $file $_FILES[campo]
   */
    public function __construct($file)
    {
        $this->type = $file['type'];
        $this->tmpName = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];

        $info = pathinfo($file['name']);

        $this->name = $info['filename'];
        $this->extension = $info['extension'];
    }

    /**
     * Método que renomeia o arquivo
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Método retorna o nome do arquivo com sua extensão
     * @return string
     */
    public function getBasename()
    {
        //VALIDA EXTENSAO
        $extension = strlen($this->extension) ? '.' . $this->extension : '';

        //RETORNA O NOME COMPLETO
        return $this->name . $extension;
    }

    /**
     * Método responsável pelo upload do arquivo
     * @param string
     * @return boolean
     */
    public function upload($dir)
    {
        if ($this->type == 'image/jpeg') {
            if ($this->extension == 'jpeg') {
                $this->extension = 'jpg';
            }

            if ($this->error != 0) {
                return false;
            }

            $path = $dir . '/' . $this->getBasename();

            //MOVE ARQUIVO TEMPORARIO PARA A PASTA DE DESTINO
            return move_uploaded_file($this->tmpName, $path);
        }
    }
}
