<?php 


  namespace App\DAO;
  use App\Models\UserModel;

  class UserDAO extends MySql {
    
    
    public function __construct(){
      parent::__construct();
    }

    /**
     * Método responsável por retornar um usuário com o email passado
     * @param string $email
     * @return ?UserModel $user
     */
    public function getUserByEmail(string $email): ?UserModel
    {
      $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');

      $stmt->bindParam('email',$email);
      $stmt->execute();
      $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      // VALIDA A EXISTENCIA DO USUÁRIO
      if(count($users) === 0) return null;

      $user = new UserModel;
      $user
        ->setId($users[0]['id'])
        ->setName($users[0]['name'])
        ->setEmail($users[0]['email'])
        ->setPassword($users[0]['password']);

      return $user;
    }

    /**
     * Método responsável por receber os dados da nova store e salvar no db
     * @param StoreModel $store
     */
    public function newStore($store)
    {
      $stmt = $this->pdo
                ->prepare("INSERT INTO store VALUES (
                  null,
                  :name,
                  :phone,
                  :address
                )");
      
      $stmt->execute([
        'name' => $store->getName(),
        'phone' => $store->getPhone(),
        'address' => $store->getAddress(),
      ]);

      return $store;
    }

     /**
     * Método responsável por retornar uma store pelo ID
     * @param int $id
     */
    public function getStoreById($id)
    {
      $stmt = $this->pdo->prepare('SELECT * FROM store WHERE id = ?');
      $stmt->execute([$id]);
      
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


     /**
     * Método responsável por atualizar uma store
     * @param StoreModel $store
     * @param int $id
     */
    public function editStore($store,$id)
    {

      $stmt = $this->pdo
                ->prepare("UPDATE store set
                  name = :name,
                  phone = :phone,
                  address = :address
                  WHERE id = :id
                ");
      
      $stmt->execute([
        'name' => $store->getName(),
        'phone' => $store->getPhone(),
        'address' => $store->getAddress(),
        'id' => $id,
      ]);

      return $store;
    }

    /**
     * Método responsável por excluir uma store
     * @param int $id
     */
    public function deleteStore($id)
    {
      $stmt = $this->pdo->prepare('DELETE FROM store WHERE id = ?');
      $stmt->execute([$id]);
    }



    



  }

?>