<?php 

  namespace App\DAO;
  use App\Models;

  class ProductDAO extends MySql {
    
    
    public function __construct(){
      parent::__construct();
    }

    /**
     * Método responsável por retornar todas os products
     */
    public function getProducts(){
      $products = $this->pdo
        ->query('SELECT * FROM products;')
        ->fetchAll(\PDO::FETCH_ASSOC);

      return $products;
    }

    /**
     * Método responsável por receber os dados do novo produto e salvar
     * @param ProductModel $product
     */
    public function newProduct($product)
    {
      $stmt = $this->pdo
                ->prepare("INSERT INTO products VALUES (
                  null,
                  :store_id,
                  :name,
                  :price,
                  :stock
                )");
      
      $stmt->execute([
        'store_id' => $product->getStoreId(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'stock' => $product->getStock(),
      ]);

      return $product;
    }

     /**
     * Método responsável por retornar um product pelo ID
     * @param int $id
     */
    public function getProductById($id)
    {
      $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
      $stmt->execute([$id]);
      
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


     /**
     * Método responsável por atualizar um product
     * @param ProductModel $product
     * @param int $id
     */
    public function editProduct($product,$id)
    {

      $stmt = $this->pdo
                ->prepare("UPDATE products set
                  store_id = :store_id,
                  name = :name,
                  price = :price,
                  stock = :stock
                  WHERE id = :id
                ");
      
      $stmt->execute([
        'store_id' => $product->getStoreId(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'stock' => $product->getStock(),
        'id' => $id,
      ]);

      return $product;
    }

    /**
     * Método responsável por excluir um product
     * @param int $id
     */
    public function deleteProduct($id)
    {
      $stmt = $this->pdo->prepare('DELETE FROM product WHERE id = ?');
      $stmt->execute([$id]);
    }

  }

?>