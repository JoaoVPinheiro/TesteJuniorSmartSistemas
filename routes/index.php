<?php

use function src\{
    slimConfiguration,
    basicAuth
};

use App\Controllers\{
    ProdutoController,
    MarcaController,    
    ExceptionController
};

/*
use App\Controllers\{
    AuthController
}
*/

$app = new \Slim\App(slimConfiguration());

$app->group('', function () use ($app) {
    $app->get('/marca', MarcaController::class . ':getMarca');
    $app->post('/marca', MarcaController::class . ':insertMarca');
    $app->put('/marca', MarcaController::class . ':updateMarca');
    $app->delete('/marca', MarcaController::class . ':deleteMarca');

    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProduto');
    $app->put('/produto', ProdutoController::class . ':updateProduto');
    $app->delete('/produto', ProdutoController::class . ':deleteProduto');
});

// =========================================

$app->run();
