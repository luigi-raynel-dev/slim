<?php 

  namespace src;

  /**
   * Método responsável por definir as configurações do Slim
   * @return \Slim\Container
   */
  function slimConfiguration(): \Slim\Container
  {
    $configuration = [
      'settings' => [
          'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
      ],
    ];

    // 'displayErrorDetails': Habilita a exibição de detalhes do erro
    return new \Slim\Container($configuration);
  }


?>