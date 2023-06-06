<?php
require_once('C:\xampp\htdocs\ankit\global\databaseconnection.php');

class Product {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    public function create($name, $price, $description, $image) {
        $sql = "INSERT INTO product (name, price, description, image) VALUES (?, ?, ?, ?)";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $price, $description, $image]);
        return $stmt->rowCount() > 0;
    }
    

    public function read() {
        $sql = "SELECT * FROM product";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $name, $price, $description, $image) {
        $sql = "UPDATE product SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $price, $description, $image, $id]);
        return $stmt->rowCount() > 0;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM product WHERE id = ?";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        
        // throw an exception if there's an error with the SQL
        if (!$stmt) {
            throw new Exception($conn->errorInfo()[2]);
        }
        
        $success = $stmt->execute([$id]);
        
        // throw an exception if there's an error with the execution
        if (!$success) {
            throw new Exception($stmt->errorInfo()[2]);
        }
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getImagePath($productId) {
        $product = $this->getProductById($productId);
        return $product['image'];  // Use array syntax here, not object syntax
    }
    
    
    
}
?>
