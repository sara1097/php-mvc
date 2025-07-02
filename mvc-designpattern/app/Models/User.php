<?php 
class User extends model {
    private $table ="users";
    private $conn;
    public function  __construct()
    {
        $this->conn = $this->connect();
    }
   //register
    public function register($data) {
        return $this->conn->insert($this->table, $data);
    }
    //delete account 
    public function deleteUser($id){
        return $this->conn->delete($this->table,$id);
    }

    // Get user by ID
    public function getRow($id){
        return $this->conn->selectById($this->table,$id);
    }

    public function updateUser($id, $data){
        return $this->conn->update($this->table,$id,$data);
    }

  public function findByEmail($email) { 
    return $this->conn->selectBycolumn($this->table,$email,"email");
   }

  public static function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
  }
}