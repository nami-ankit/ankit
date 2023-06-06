// increaseQuantity.php
<?php
session_start();
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    if(isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId]++;
    }
}
header('Location: carts.php');
?>
