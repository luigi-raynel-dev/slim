<?php 

  namespace App\Middlewares;

  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;

  final class JwtDateTime {

    public function __invoke(Request $request, Response $response, Callable $next): Response
    {
      $token = $request->getAttribute('jwt');
      $expiredDate = new \DateTime($token['expired_at']);
      $now = new \DateTime();
      if($expiredDate < $now) return $response->withStatus(401);
      $response = $next($request,$response);
      return $response;
    }

  }

?>