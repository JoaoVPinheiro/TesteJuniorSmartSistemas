<?php

namespace App\Models\MySQL\SmartSistemasGerenciadordeProdutos;

final class ProdutoModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $marca_id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var float
     */
    private $preco;
    /**
     * @var string
     */
    private $descricao;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return ProdutoModel
     */
    public function setId(int $id): ProdutoModel
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return int
     */
    public function getMarcaId(): int
    {
        return $this->marca_id;
    }
    /**
     * @param int $marca_id
     * @return ProdutoModel
     */
    public function setMarcaId(int $marca_id): ProdutoModel
    {
        $this->marca_id = $marca_id;
        return $this;
    }




    /**
     * @return string
     */
    public function getNome(): String
    {
        return $this->nome;
    }
    /**
     * @param string $nome
     * @return ProdutoModel
     */
    public function setnome(string $nome): ProdutoModel
    {
        $this->nome = $nome;
        return $this;
    }



    /**
     * @return float
     */
    public function getPreco(): Float
    {
        return $this->preco;
    }
    /**
     * @param float $preco
     * @return ProdutoModel
     */
    public function setPreco(float $preco): ProdutoModel
    {
        $this->preco = $preco;
        return $this;
    }



    /**
     * @return string
     */
    public function getDescricao(): String
    {
        return $this->descricao;
    }
    /**
     * @param string $descricao
     * @return ProdutoModel
     */
    public function setDescricao(string $descricao): ProdutoModel
    {
        $this->descricao = $descricao;
        return $this;
    }


    
}
