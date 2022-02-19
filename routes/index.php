<?php 

  use function src\{
    slimConfiguration,
    basicAuth
  };
  use App\Controllers\AuthController;
  use Tuupola\Middleware\HttpBasicAuthentication;
  use Tuupola\Middleware\JwtAuthentication;

  // Intanciamos a classe  do Slim
  $app = new \Slim\App(slimConfiguration());

  // ROTAS
  // ROTA PARA SE LOGAR NA API
  $app->post('/auth', AuthController::class . ':login');
  $app->get('/test', function() { echo 'oi'; } )
    ->add(function($request,$response,$next) {
      $token = $request->getAttribute('jwt');
      $expiredDate = new \DateTime($token['expired_at']);
      $now = new \DateTime();
      if($expiredDate < $now) return $response->withStatus(401);
      $response = $next($request,$response);
      return $response;
    })
    ->add(new JwtAuthentication([
      'SECRET' => getEnv('JWT_SECRET_KEY'),
      'attribute' => 'jwt'
    ]));
  // ROTAS DE STORES
  require_once 'stores.php';

  // ROTAS DE PRODUTOS
  require_once 'products.php';
 
  // Iniciamos o Slim
  $app->run();

?>