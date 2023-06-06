<?php
require_once('./global/databaseconnection.php');

class Cart {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    public function getProduct($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
