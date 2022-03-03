<?php 


  namespace App\DAO;
  use App\Models\TokenModel;

  class TokenDAO extends MySql {
    
    
    public function __construct(){
      parent::__construct();
    }
    
    /**
     * Método responsável por salvar o token no db
     * @param TokenModel $token
     */
    public function createToken(TokenModel $token): void
    {
      $stmt = $this->pdo
        ->prepare('INSERT INTO tokens (
          token,
          refresh_token,
          expired_at,
          user_id
        )
        VALUES
        (
          :token,
          :refresh_token,
          :expired_at,
          :user_id
        )
      ');

      $stmt->execute([
        'token' => $token->getToken(),
        'refresh_token' => $token->getRefreshToken(),
        'expired_at' => $token->getExpired_at(),
        'user_id' => $token->getUserId(),
      ]);
    }
    
    /**
     * Busca o token na tabela a partir do refresh_token
     *
     * @param string $refreshToken
     * @return boolean
     */
    public function verifyRefreshToken(string $refreshToken): bool
    {
      $stmt = $this->pdo
        ->prepare("SELECT 
          id
          FROM tokens
          WHERE refresh_token = :refresh_token;
        ");
      
      $stmt->bindParam('refresh_token', $refreshToken);
      $stmt->execute();
      $tokens = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return count($tokens) === 0 ? false : true;
    }


  }

?>