<?php
session_start();

// redirect to login page if the user is not logged in
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}

// make sure the product id is present
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];

    // if the cart array doesn't exist yet, create it
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    // add the product id to the cart array
    if(isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId]++;
    } else {
        $_SESSION['cart'][$productId] = 1;
    }
}

// redirect back to shop page
header('Location: shop.php');
?>
