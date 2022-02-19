<?php 


  namespace App\Controllers;
  
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;
  use App\DAO\UserDao;
  use App\DAO\TokenDao;
  use App\Models\TokenModel;
  use Firebase\JWT\JWT;
  use Firebase\JWT\Key;


  final class AuthController {
    
    /**
     * método responsável por retornar o o token de acesso a api
     * @param  Request $request
     * @param  Response $response
     * @param  array $args
     * @return Response
     */
    public function login(Request $request, Response $response, array $args) : Response
    {
      // PEGA OS DADOS ENVIADOS PELO USUÁRIO
      $data = $request->getParsedBody();
      $email = $data['email'];
      $password = $data['password'];
      $expired_date = $data['expired_date'] ?? null;
      
      // INSTANCIA O DAO PARA BUSCAR USUÁRIO NO DB
      $userDao = new UserDao;
      $user = $userDao->getUserByEmail($email);

      // VALIDA E-MAIL
      if(is_null($user)){
        return $response->withStatus(401);
      }
      // VALIDA SENHA
      if(!password_verify($password,$user->getPassword())){
        return $response->withStatus(401);
      }

      // Data de expiração do token
      $expiredAt = is_null($expired_date) ? (new \DateTime())
      ->modify('+2 days')
      ->format('Y-m-d H:i:s') : $expired_date;
      
      // Construindo payload
      $tokenPayload = [
        'sub' => $user->getId(),
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'expired_at' => $expiredAt
      ];

      // Gera token com criptografia HS256 no payload passando a assinatura
      $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'),'HS256');
      $refreshToken= [
        'email' => $user->getEmail()
      ];
      $refreshToken = JWT::encode($refreshToken,getenv('JWT_SECRET_KEY'),'HS256');

      $tokenModel = new TokenModel;
      $tokenModel
        ->setToken($token)
        ->setRefreshToken($refreshToken)
        ->setExpired_at($expiredAt)
        ->setUserId($user->getId());

      $tokenDao = new TokenDao();
      $tokenDao->createToken($tokenModel);

      $response = $response->withJson([
        "token" => $token,
        "refresh_token" => $refreshToken
      ]);

      return $response;
    }

  }


?>