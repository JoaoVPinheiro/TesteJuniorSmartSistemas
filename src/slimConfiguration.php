<?php

namespace src;

use App\DAO\MySQL\SmartSistemasGerenciadordeProdutos\MarcasDAO;

function slimConfiguration(): \Slim\Container
{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
        ],
    ];

    $container = new \Slim\Container($configuration);

    $container->offsetSet(MarcasDAO::class, new MarcasDAO());

    return $container;
}
