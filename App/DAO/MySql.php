<?php 

  namespace App\DAO;

  abstract class MySql {

    /**
   * Host de conexão com o banco de dados
   * @var string
   */
  private static $host;

  /**
   * Nome do banco de dados
   * @var string
   */
  private static $name;

  /**
   * Usuário do banco
   * @var string
   */
  private static $user;

  /**
   * Senha de acesso ao banco de dados
   * @var string
   */
  private static $pass;

  /**
   * Porta de acesso ao banco
   * @var integer
   */
  private static $port;

  /**
   * Instancia de conexão com o banco de dados
   * @var \PDO
   */
  protected $pdo;

  /**
   * Método responsável por configurar a classe
   * @param  string  $host
   * @param  string  $name
   * @param  string  $user
   * @param  string  $pass
   * @param  integer $port
   */
  public function __construct($host = null,$name = null,$user = null,$pass = null,$port = null){
    self::$host = is_null($host) ? getenv('DB_HOST') : $host;
    self::$name = is_null($name) ? getenv('DB_NAME') : $name;
    self::$user = is_null($user) ? getenv('DB_USER') : $user;
    self::$pass = is_null($pass) ? getenv('DB_PASSWORD') : $pass;
    self::$port = is_null($port) ? getenv('DB_PORT') : $port;
    $this->setConnection();
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection(){
    try{
      $this->pdo = new \PDO('mysql:host='.self::$host.';dbname='.self::$name.';port='.self::$port,self::$user,self::$pass);

      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }catch(\PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

}


?>