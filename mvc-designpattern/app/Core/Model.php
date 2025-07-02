<?php 
require(CORE.'DB/PDOConnection.php');
class model{
    protected $db;

    public function connect()
    {
        $this->db = PDOConnection::getInstance();
        if(!$this->db)
            die("Connection Error : ");
        return $this->db;
    }
}