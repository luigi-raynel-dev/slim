<?php 

  namespace App\Models;
  
  final class ProductModel{

    /**
     * Atributo responsável por guardar o ID do Produto
     * @var int
     */
    private $id;

    /**
     * Atributo responsável por guardar o ID da loja do Produto
     * @var int 
     */
    private $store_id;

    /**
     * Atributo responsável por guardar o nome do Produto
     * @var string
     */
    private $name;

    /**
     * Atributo responsável por guardar o preço do Produto
     * @var float
     */
    private $price;

    /**
     * Atributo responsável por guardar o preço do Produto
     * @var int
     */
    private $stock;

    /**
     * Método responsável por retornar o ID do produto
     * @return int $id
     */
    public function getId(): int
    {
      return $this->id;
    }

    /**
     * Método responsável por retornar o ID da loja do produto
     * @return int $store_id
     */
    public function getStoreId(): int
    {
      return $this->store_id;
    }

    /**
     * Método responsável por retornar o nome do produto
     * @return string $name
     */
    public function getName(): string
    {
      return $this->name;
    }

    /**
     * Método responsável por retornar o preço da produto
     * @return float $price
     */
    public function getPrice(): string
    {
      return $this->price;
    }

    /**
     * Método responsável por retornar o nome da produto
     * @return int $stock
     */
    public function getStock(): string
    {
      return $this->stock;
    }

    /**
     * Método responsável por definir o id da loja do produto
     * @param string $store_id
     */
    public function setStoreId(int $store_id): ProductModel
    {
      $this->store_id = $store_id;
      return $this;
    }

    /**
     * Método responsável por definir o nome da produto
     * @param string $name
     */
    public function setName(string $name): ProductModel
    {
      $this->name = $name;
      return $this;
    }

    /**
     * Método responsável por definir o preço do produto
     * @param string $price
     */
    public function setPrice(float $price): ProductModel
    {
      $this->price = $price;
      return $this;
    }

    /**
     * Método responsável por definir o endereço da produto
     * @param string $stock
     */
    public function setStock(string $stock): ProductModel
    {
      $this->stock = $stock;
      return $this;
    }



  }




?>