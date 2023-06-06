<?php
require_once('./global/databaseconnection.php');
session_start();

class User {
    private $db;

    public function __construct() {
        $this->db = (new DatabaseConnection())->getConnection();
    }


    public function register($username, $password, $email, $isAdmin) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, email, isAdmin) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $email, $isAdmin]);
        return $stmt->rowCount() > 0;
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['isAdmin'] = $user['isAdmin'];
            
            if ($user['isAdmin']) {
                header('Location: ./admin/index.php');
                exit();
            }
            
            return true;
        }
        
        return false;
    }
    

    public function update($username, $password, $email, $isAdmin) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ?, email = ?, isAdmin = ? WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$hashedPassword, $email, $isAdmin, $username]);
        return $stmt->rowCount() > 0;
    }

    public function delete($username) {
        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }
    public function isAdmin($username) {
        $sql = "SELECT isAdmin FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['isAdmin'] == 1;
    }
}
?>
