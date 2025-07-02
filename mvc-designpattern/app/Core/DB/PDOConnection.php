<?php
class PDOConnection{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host = DB_HOST;
        $dbname = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("PDO Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new PDOConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    // ✅ Create
    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($keys) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    // ✅ Read (All)
    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    // ✅ Read (One)
    public function selectById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // ✅ Update
    public function update($table, $id, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ', ');

        $sql = "UPDATE $table SET $fields WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    // ✅ Delete
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}