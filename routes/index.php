<?php 

  use function src\slimConfiguration;
  use App\Controllers\ProductController;

  // Intanciamos a classe  do Slim
  $app = new \Slim\App(slimConfiguration());

  // ROTAS

  $app->get('/', ProductController::class . ':getProducts');

  // Iniciamos o Slim
  $app->run();

?>