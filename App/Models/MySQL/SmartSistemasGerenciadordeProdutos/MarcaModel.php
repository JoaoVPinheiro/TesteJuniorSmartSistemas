<?php

namespace App\Models\MySQL\SmartSistemasGerenciadordeProdutos;

final class MarcaModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): MarcaModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }
    /**
     * @param string $nome
     * @return MarcaModel
     */
    public function setNome(string $nome): MarcaModel
    {
        $this->nome = $nome;
        return $this;
    }

}
