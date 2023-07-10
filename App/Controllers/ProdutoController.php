<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\SmartSistemasGerenciadordeProdutos\ProdutosDAO;
use App\Models\MySQL\SmartSistemasGerenciadordeProdutos\ProdutoModel;


final class ProdutoController
{
    public function getProdutos(Request $request, Response $response, array $args): Response
    {
        //É necessario enviar o ID da marca que deseja pesquisar os produtos
        $queryParams = $request->getParsedBody();
        
        $produtosDAO = new ProdutosDAO();
        $id = $queryParams['marca_id'];        
        $produtos = $produtosDAO->getAllProdutosFromMarca($id);
        $response = $response->withJson($produtos);
        
        return $response;
    }

    public function insertProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $ProdutosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setMarcaId($data['marca_id'])
                ->setNome($data['nome'])
                ->setPreco($data['preco'])
                ->setDescricao($data['descricao']);            
        $ProdutosDAO->insertProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto inserido com sucesso!'
        ]);

        return $response;
    }

    public function updateProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $ProdutosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setId((int)$data['id'])
            ->setMarcaId($data['marca_id'])
            ->setNome($data['nome'])
            ->setPreco($data['preco'])
            ->setDescricao($data['descricao']);
        $ProdutosDAO->updateProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto alterado com sucesso!'
        ]);
        return $response;
    }

    public function deleteProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $ProdutosDAO = new ProdutosDAO();
        $id = $data['id'];       
        $ProdutosDAO->deleteProduto($id);

        $response = $response->withJson([
            'message' => 'Produto excluída com sucesso!'
        ]);

        return $response;
    }
}
