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
    
    $app->post("/pruebapost", function ( $request,  $response, array $args) {
        $reqPost = $request->getParsedBody();
        $val1 = $reqPost["val1"];
        $val2 = $reqPost["val2"];
        
        $response->getBody()->write("Valores: " . $val1 . " " . $val2);
        return $response; 
    });
    
    $app->get("/testjson", function($request, $response, $args) {
        $data[0]["nombre"]="Patricio";
        $data[0]["apellidos"]="Hernandez Jimenez";
        $data[1]["nombre"]="Santiago";
        $data[1]["apellidos"]="Hernandez Jimenez";
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response;
    });
    $app->run();
?>
