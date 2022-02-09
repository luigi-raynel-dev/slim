<?php 

  namespace App\Controllers;

  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;
  
  final class ProductController {
    
    /**
     * Método responsável por retornar todos os produtos
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getProducts(Request $request, Response $response, array $args) : Response
    {
      $response = $response->withJson([
        "title" => "Produtos"
      ]);

      return $response;
    }

  }


?>