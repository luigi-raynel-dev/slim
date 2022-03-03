<?php 

  require_once './vendor/autoload.php';
  
  $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
	$dotenv->load();

  require_once './src/slimConfiguration.php';
  require_once './src/basicAuth.php';
  require_once './src/jwtAuth.php';
  require_once './routes/index.php';
  

?>