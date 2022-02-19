<?php 

  use App\Controllers\StoreController;
  use function src\{
    slimConfiguration,
    basicAuth
  };

  // ROTA STORES

  $app->group('', function() use($app) {
    // Exibi todas stores
    $app->get('/stores', StoreController::class . ':getStores');
  
    // Exibi uma stores
    $app->get('/stores/{id}', StoreController::class . ':getStore');
  
    // Cadastra uma store
    $app->post('/stores', StoreController::class . ':newStore');
  
    // Edita uma store
    $app->put('/stores/{id}', StoreController::class . ':editStore');
  
    // Apaga uma store
    $app->delete('/stores/{id}', StoreController::class . ':deleteStore');
  })->add(basicAuth());

 


?>