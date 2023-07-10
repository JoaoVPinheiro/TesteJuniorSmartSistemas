<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\SmartSistemasGerenciadordeProdutos\MarcasDAO;
use App\Models\MySQL\SmartSistemasGerenciadordeProdutos\MarcaModel;
use Slim\Container;

final class MarcaController
{
    /** @var MarcasDAO $MarcasDAO */
    private $MarcasDAO;

    public function __construct(Container $container)
    {
        $this->MarcasDAO = $container->offsetGet(MarcasDAO::class);
    }

    public function getMarca(Request $request, Response $response, array $args): Response
    {
        $marcas = $this->MarcasDAO->getAllMarcas();
        $response->getBody()->write(
            json_encode(
                $marcas,
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            )
        );

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    public function insertMarca(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $MarcasDAO = new MarcasDAO();
        $marca = new MarcaModel();
        $marca->setNome($data['nome']);            
        $MarcasDAO->insertMarca($marca);

        $response = $response->withJson([
            'message' => 'Marca inserida com sucesso!'
        ]);

        return $response;
    }

    public function updateMarca(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $MarcasDAO = new MarcasDAO();
        $marca = new MarcaModel();
        $marca->setId((int)$data['id'])
            ->setNome($data['nome']);
        $MarcasDAO->updateMarca($marca);

        $response = $response->withJson([
            'message' => 'Marca alterada com sucesso!'
        ]);

        return $response;
    }

    public function deleteMarca(Request $request, Response $response, array $args): Response
    {        
        $data = $request->getParsedBody();
        $MarcasDAO = new MarcasDAO();
        $id = $data['id'];       
        $MarcasDAO->deleteMarca($id);

        $response = $response->withJson([
            'message' => 'Marca excluída com sucesso!'
        ]);
        
        return $response;
    }
}
