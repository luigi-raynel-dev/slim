<?php 

  namespace App\Controllers;

  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;
  use App\DAO\ProductDao;
  use App\DAO\StoreDao;
  use App\Models\ProductModel;
  
  final class ProductController {
    
    /**
     * Método responsável por retornar todos os produtos
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getProducts(Request $request, Response $response, array $args) : Response
    {
      // Instancia a classe que executa os querys
      $productDao = new ProductDao();

      // Executa o método que retorna todas os produtos
      $products = $productDao->getProducts();

      $response = $response->withJson($products);

      return $response;
    }

    /**
     * Método responsável por cadastrar um produto
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function newProduct(Request $request, Response $response, array $args) : Response
    {
      $data = $request->getParsedBody();

      $productDao = new ProductDao;
      $product = new ProductModel;
      $product
        ->setStoreId($data['store_id'])
        ->setName($data['name'])
        ->setPrice($data['price'])
        ->setStock($data['stock']);

      // VALIDA SE A STORE DO PRODUTO CADASTRADO EXISTE
      $storeDao = new StoreDao;
      $store = $storeDao->getStoreById($data['store_id']);

      if(count($store) === 0){
        throw new \Exception("A loja $id não existe.",404);
      }

      $productDao->newProduct($product);
      
      $response = $response->withJson([
        'message' => 'Produto criado com sucesso!'
      ]);


      return $response;
    }

    /**
     * Método responsável por editar um produto
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function editProduct(Request $request, Response $response, array $args) : Response
    {

      $data = $request->getParsedBody();
      $id = $args['id'];

      // BUSCA STORE PELO ID
      $storeDao = new StoreDao;
      $storeById = $storeDao->getStoreById($id);
     
      // VALIDA STORE
      if(count($storeById) == 0){
        throw new \Exception("A loja $id não foi encontrada.",404);
      }

      // BUSCA PRODUTO PELO ID
      $productDao = new ProductDao;
      $productById = $productDao->getProductById($id);
     
      // VALIDA PRODUTO
      if(count($productById) == 0){
        throw new \Exception("O produto $id não foi encontrado.",404);
      }

      $product = new ProductModel;
      $product
        ->setStoreId($data['store_id'])
        ->setName($data['name'])
        ->setPrice($data['price'])
        ->setStock($data['stock']);
      
      $newProduct = $productDao->editProduct($product,$id);
      
      $response = $response->withJson([
        'message' => 'Produto atualizado com sucesso!',
        'id' => $id,
        'store_id' => $newProduct->getStoreId(),
        'name' => $newProduct->getName(),
        'price' => $newProduct->getPrice(),
        'stock' => $newProduct->getStock(),
      ]);

      return $response;
    }

    /**
     * Método responsável por deletar um produto
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteProduct(Request $request, Response $response, array $args) : Response
    {

      $id = $args['id'];

      // BUSCA STORE PELO ID
      $productDao = new ProductDao;
      $productById = $productDao->getProductById($id);
     
      // VALIDA STORE
      if(count($productById) == 0){
        throw new \Exception("A produto $id não foi encontrado.",404);
      }
      
      $productDao->deleteProduct($id);
      
      $response = $response->withJson([
        'message' => 'Produto excluído com sucesso!',
      ]);

      return $response;
    }

     /**
     * Método responsável por deletar um produto
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getProduct(Request $request, Response $response, array $args) : Response
    {

      $id = $args['id'];

      // BUSCA PRODUTO PELO ID
      $productDao = new ProductDao;
      $product = $productDao->getProductById($id);

      // VALIDA PRODUTO
      if(count($product) === 0){
        throw new \Exception("O produto $id não foi encontradao",404);
      }


      $response = $response->withJson($product[0]);

      return $response;
    }

  }


?>