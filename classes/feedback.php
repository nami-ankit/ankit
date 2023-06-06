<?php
require_once('C:\xampp\htdocs\ankit\global\databaseconnection.php');

class Entry {
    private $db;

    public function __construct() {
        $this->db = (new DatabaseConnection())->getConnection();
    }

    // Create new entry
    public function create($name, $description, $image) {
        $date = date('j F Y');
        // current date without time
        $sql = "INSERT INTO feedbacks (name, feedback, image, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $description, $image, $date]);
        return $stmt->rowCount() > 0;
    }
    
    // Get entry by ID
    public function read($id) {
        $sql = "SELECT * FROM feedbacks WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all entries
    public function readAll() {
        $sql = "SELECT * FROM feedbacks";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete entry by ID
    public function delete($id) {
        $sql = "DELETE FROM feedbacks WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}
?>
