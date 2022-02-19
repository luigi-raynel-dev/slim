<?php 

  namespace App\Models;
  
  final class UserModel{

    /**
     * Atributo responsável por guardar o ID do Produto
     * @var int
     */
    private $id;

    /**
     * Atributo responsável por guardar o nome do usuário
     * @var string
     */
    private $name;

    /**
     * Atributo responsável por guardar o email do usuário
     * @var string
     */
    private $email;

    /**
     * Atributo responsável por guardar a senha do usuário
     * @var string
     */
    private $password;

    // SETTERS
        
    /**
     * Método responsável por definir o ID do usuário
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
      $this->id = $id;
      return $this;
    }

    /**
     * Método responsável por definir o nome do usuário
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
      $this->name = $name;
      return $this;
    }

    /**
     * Método responsável por definir o email do usuário
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
      $this->email = $email;
      return $this;
    }

    /**
     * Método responsável por definir a senha do usuário
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
      $this->password = $password;
      return $this;
    }

    // SETTERS

    /**
     * Método responsável por retornar o ID do usuário
     * @return int $id
     */
    public function getId(): int
    {
      return $this->id;
    }

    /**
     * Método responsável por retornar o nome do usuário
     * @return string $name
     */
    public function getName(): string
    {
      return $this->name;
    }

    /**
     * Método responsável por retornar o email do usuário
     * @return string $email
     */
    public function getEmail(): string
    {
      return $this->email;
    }

    /**
     * Método responsável por retornar a senha do usuário
     * @return string $password
     */
    public function getPassword(): string
    {
      return $this->password;
    }



  }