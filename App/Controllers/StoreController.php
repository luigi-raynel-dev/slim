<?php 

  namespace App\Controllers;

  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;
  use App\DAO\StoreDao;
  use App\Models\StoreModel;
  
  final class StoreController {
    
    /**
     * Método responsável por retornar todos as lojas
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getStores(Request $request, Response $response, array $args) : Response
    {
      // Instancia a classe que executa as querys
      $storeDao = new StoreDao();

      // Executa o método que retorna todas as lojas
      $stores = $storeDao->getStores();

      $response = $response->withJson($stores);

      return $response;
    }

    /**
     * Método responsável por cadastrar uma loja
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function newStore(Request $request, Response $response, array $args) : Response
    {
      $data = $request->getParsedBody();

      $storeDao = new StoreDao;
      $store = new StoreModel;
      $store
        ->setName($data['name'])
        ->setPhone($data['phone'])
        ->setAddress($data['address']);
      
      $storeDao->newStore($store);
      
      $response = $response->withJson([
        'message' => 'Loja criada com sucesso!'
      ]);


      return $response;
    }

    /**
     * Método responsável por editar uma loja
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function editStore(Request $request, Response $response, array $args) : Response
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

      $store = new StoreModel;
      $store
      ->setName($data['name'])
      ->setPhone($data['phone'])
      ->setAddress($data['address']);
      
      $newStore = $storeDao->editStore($store,$id);
      
      $response = $response->withJson([
        'message' => 'Loja atualizada com sucesso!',
        'id' => $id,
        'name' => $newStore->getName(),
        'phone' => $newStore->getPhone(),
        'address' => $newStore->getAddress(),
      ]);

      return $response;
    }

    /**
     * Método responsável por deletar uma loja
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteStore(Request $request, Response $response, array $args) : Response
    {

      $id = $args['id'];

      // BUSCA STORE PELO ID
      $storeDao = new StoreDao;
      $storeById = $storeDao->getStoreById($id);
     
      // VALIDA STORE
      if(count($storeById) == 0){
        throw new \Exception("A loja $id não foi encontrada.",404);
      }
      
      $newStore = $storeDao->deleteStore($id);
      
      $response = $response->withJson([
        'message' => 'Loja excluída com sucesso!',
      ]);

      return $response;
    }

     /**
     * Método responsável por deletar uma loja
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getStore(Request $request, Response $response, array $args) : Response
    {

      $id = $args['id'];

      // BUSCA STORE PELO ID
      $storeDao = new StoreDao;
      $store = $storeDao->getStoreById($id);

      // VALIDA STORE
      if(count($store) === 0){
        throw new \Exception("A loja $id não foi encontrada.",404);
      }


      $response = $response->withJson($store[0]);

      return $response;
    }

  }


?>