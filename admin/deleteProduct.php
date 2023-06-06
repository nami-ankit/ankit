<?php
require_once('../classes/product.php');

// make sure the product id is present
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $product = new Product();
    $product->delete($productId);
}

// redirect back to admin dashboard
header('Location: index.php');
?>
