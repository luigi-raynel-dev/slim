<?php 

  namespace App\Models;
  
  final class TokenModel{

    /**
     * Atributo responsável por guardar o ID do token
     * @var int
     */
    private $id;

    /**
     * Atributo responsável por guardar o token
     * @var string
     */
    private $token;

    /**
     * Atributo responsável por guardar a renovação do token
     * @var string
     */
    private $refreshToken;

    /**
     * Atributo responsável por guardar a data de expiração do token
     * @var string
     */
    private $expired_at;

    /**
     * Atributo responsável por guardar o id do usuário dono do token
     * @var int
     */
    private $user_id;

    // SETTERS
        
    /**
     * Método responsável por definir o ID do token
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
      $this->id = $id;
      return $this;
    }

    /**
     * Método responsável por definir o token do usuário
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self
    {
      $this->token = $token;
      return $this;
    }

    /**
     * Método responsável por definir a renovação do token
     * @param string $refreshToken
     * @return self
     */
    public function setRefreshToken(string $refreshToken): self
    {
      $this->refreshToken = $refreshToken;
      return $this;
    }

    /**
     * Método responsável por definir a data de expiração do token
     * @param string $expired_at
     * @return self
     */
    public function setExpired_at(string $expired_at): self
    {
      $this->expired_at = $expired_at;
      return $this;
    }

    /**
     * Método responsável por definir o ID do usuário do dono do token
     * @param int $user_id
     * @return self
     */
    public function setUserId(int $user_id): self
    {
      $this->user_id = $user_id;
      return $this;
    }

    // GETTERS

    /**
     * Método responsável por retornar o ID do token
     * @return int $id
     */
    public function getId(): int
    {
      return $this->id;
    }

    /**
     * Método responsável por retornar o token
     * @return string $token
     */
    public function getToken(): string
    {
      return $this->token;
    }

    /**
     * Método responsável por retornar a renovação do token
     * @return string $refreshToken
     */
    public function getRefreshToken(): string
    {
      return $this->refreshToken;
    }

    /**
     * Método responsável por retornar a data d expiração do token
     * @return string $expired_at
     */
    public function getExpired_at(): string
    {
      return $this->expired_at;
    }

     /**
     * Método responsável por retornar o ID do usuário dono do token
     * @return int $user_id
     */
    public function getUserId(): int
    {
      return $this->user_id;
    }



  }