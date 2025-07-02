<?php 
class product extends Model{
    //it must be products
    private $table ="product";
    private $conn;
    public function  __construct()
    {
        $this->conn = $this->connect();
    }
    public function getAllProducts(){
        return $this->conn->selectAll($this->table);
    }
    public function insertProducts($data){
        return $this->conn->insert($this->table,$data);
    }
    public function deleteProduct($id){
        return $this->conn->delete($this->table,$id);
    }

    public function getRow($id){
        return $this->conn->selectById($this->table,$id);
    }

    public function updateproduct($id, $data){
        return $this->conn->update($this->table,$id,$data);
    }
}