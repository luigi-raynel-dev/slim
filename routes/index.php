<?php 

  use function src\{
    slimConfiguration,
    basicAuth,
    jwtAuth
  };
  use App\Controllers\AuthController;
  use App\Middlewares\JwtDateTime;
  use Tuupola\Middleware\HttpBasicAuthentication;
  use Tuupola\Middleware\JwtAuthentication;

  // Intanciamos a classe  do Slim
  $app = new \Slim\App(slimConfiguration());

  // ROTAS
  // ROTA PARA SE LOGAR NA API
  $app->post('/auth', AuthController::class . ':login');
  // Rota para recuperar o refresh_token
  $app->post('/refresh-token', AuthController::class . ':refreshToken');
  // Rota para recuperar o conteúdo do token
  $app->get('/token', function($request,$response) { 
      $token = $request->getAttribute('jwt');
      $response = $response->withJson($token);

      return $response;
   })
    ->add(new JwtDateTime())
    ->add(jwtAuth());
  // ROTAS DE STORES
  require_once 'stores.php';

  // ROTAS DE PRODUTOS
  require_once 'products.php';
 
  // Iniciamos o Slim
  $app->run();

?>