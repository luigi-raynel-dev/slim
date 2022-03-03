<?php 

  namespace src;

  use Tuupola\Middleware\JwtAuthentication;

  function jwtAuth(): jwtAuthentication
  {
    return new JwtAuthentication([
      'secret' => getenv('JWT_SECRET_KEY'),
      'attribute' => 'jwt'
    ]);
  }


?>