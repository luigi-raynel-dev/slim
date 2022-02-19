<?php 

  use App\Controllers\ProductController;
  use function src\{
    slimConfiguration,
    basicAuth
  };


  // ROTA PRODUTOS
  $app->group('', function() use($app) {
    // Exibi todos produtos
    $app->get('/products', ProductController::class . ':getProducts');

    // Exibi todos produtos
    $app->get('/products/{id}', ProductController::class . ':getProduct');

    // Cadastra um produto
    $app->post('/products', ProductController::class . ':newProduct');

    // Edita um produto
    $app->put('/products/{id}', ProductController::class . ':editProduct');

    // Apaga um produto
    $app->delete('/products/{id}', ProductController::class . ':deleteProduct');
  })->add(basicAuth()); 


?>