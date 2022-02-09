<?php 

  require_once './vendor/autoload.php';
  
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  require_once './src/slimConfiguration.php';
  require_once './routes/index.php';
  

?>