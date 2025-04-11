<?php
    use Psr\Http\Message\ResponseInterface as Response; 
    use Psr\Http\Message\ServerRequestInterface as Request; 
    use Slim\Factory\AppFactory; 
    require 'vendor/autoload.php';
    
    $app = AppFactory::create(); 
    $app->setBasepath("/tecweb/Practicas/p13"); 
    $app->get('/', function ($request, $response, $args)
    {
        $response->getBody()->write("Hola Mundo Slim!");
        return $response;
    });
    
    $app->get('/hola[/{nombre}]',function ($request, $response, $args)
    {
        $response->getBody()->write("Hola, " . $args["nombre"]);
        return $response;
    });
    $app->run();
?>
