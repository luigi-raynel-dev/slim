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


  }

?>