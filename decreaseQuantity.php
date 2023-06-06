// decreaseQuantity.php
<?php
session_start();
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    if(isset($_SESSION['cart'][$productId]) && $_SESSION['cart'][$productId] > 1){
        $_SESSION['cart'][$productId]--;
    } else {
        unset($_SESSION['cart'][$productId]);
    }
}
header('Location: carts.php');
?>
