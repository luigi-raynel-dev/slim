<?php 

  namespace src;
  
  use Tuupola\Middleware\HttpBasicAuthentication;

  function basicAuth(): HttpBasicAuthentication
  {
    return new HttpBasicAuthentication([
      "users" => [
          "luigiraynel21@gmail.com" => "07032003bh"
      ]
    ]);
  }

?>