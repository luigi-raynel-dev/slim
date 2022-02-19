<?php 

  namespace App\Models;
  
  final class StoreModel{

    /**
     * Atributo responsável por guardar o ID da Store
     * @var int
     */
    private $id;

    /**
     * Atributo responsável por guardar o nome da Store
     * @var string
     */
    private $name;

    /**
     * Atributo responsável por guardar o telefone da Store
     * @var string
     */
    private $phone;

    /**
     * Atributo responsável por guardar o endereço da Store
     * @var string
     */
    private $address;

    /**
     * Método responsável por retornar o ID da store
     * @return int $id
     */
    public function getId(): int
    {
      return $this->id;
    }

    /**
     * Método responsável por retornar o nome da store
     * @return string $name
     */
    public function getName(): string
    {
      return $this->name;
    }

    /**
     * Método responsável por retornar o telefone da store
     * @return string $phone
     */
    public function getPhone(): string
    {
      return $this->phone;
    }

    /**
     * Método responsável por retornar o nome da store
     * @return string $address
     */
    public function getAddress(): string
    {
      return $this->address;
    }

    /**
     * Método responsável por definir o nome da store
     * @param string $name
     */
    public function setName(string $name): StoreModel
    {
      $this->name = $name;
      return $this;
    }

    /**
     * Método responsável por definir o telefone da store
     * @param string $phone
     */
    public function setPhone(string $phone): StoreModel
    {
      $this->phone = $phone;
      return $this;
    }

    /**
     * Método responsável por definir o endereço da store
     * @param string $address
     */
    public function setAddress(string $address): StoreModel
    {
      $this->address = $address;
      return $this;
    }



  }




?>