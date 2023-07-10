<?php

namespace App\DAO\MySQL\SmartSistemasGerenciadordeProdutos;

use App\Models\MySQL\SmartSistemasGerenciadordeProdutos\MarcaModel;

class MarcasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMarcas(): array
    {
        $marca = $this->pdo
            ->query('SELECT
                    id,
                    nome
                FROM marca;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $marca;
    }

    public function insertMarca(MarcaModel $marca): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO marca VALUES(
                null,
                :nome
            );');
        $statement->execute([
            'nome' => $marca->getNome()
        ]);
    }

    public function updateMarca(MarcaModel $marca): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE marca SET
                    nome = :nome
                WHERE
                    id = :id
            ;');
        $statement->execute([
            'nome' => $marca->getNome(),            
            'id' => $marca->getId()
        ]);
    }

    public function deleteMarca(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM produtos WHERE marca_id = :id;
                DELETE FROM marca WHERE id = :id;
            ');
        $statement->execute([
            'id' => $id
        ]);
    }
}
