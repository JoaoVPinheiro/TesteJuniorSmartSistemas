<?php

namespace App\DAO\MySQL\SmartSistemasGerenciadordeProdutos;

use App\Models\MySQL\SmartSistemasGerenciadordeProdutos\ProdutoModel;

class ProdutosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProdutosFromMarca(int $marcaID): array
    {
        $statement = $this->pdo
            ->prepare('SELECT
                    *
                FROM produtos
                WHERE
                    marca_id = :marca_id
            ;');
        $statement->bindParam(':marca_id', $marcaID, \PDO::PARAM_INT);
        $statement->execute();
        $produtos = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function insertProduto(ProdutoModel $produto): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO produtos VALUES(
                null,
                :marca_id,
                :nome,
                :preco,
                :descricao
            );');
        $statement->execute([
            'marca_id' => $produto->getMarcaId(),
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'descricao' => $produto->getDescricao()
        ]);
    }

    public function updateProduto(ProdutoModel $produto): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE produtos SET
                    marca_id = :marca_id,
                    nome = :nome,
                    preco = :preco,
                    descricao = :descricao
                WHERE
                    id = :id
            ;');
        $statement->execute([
            'marca_id' => $produto->getMarcaId(),
            'nome' => $produto->getNome(), 
            'preco' => $produto->getPreco(),
            'descricao' => $produto->getDescricao(),           
            'id' => $produto->getId()
        ]);
    }

    public function deleteProduto(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM produtos WHERE id = :id;                
            ');
        $statement->execute([
            'id' => $id
        ]);
    }
}
