<?php
session_start();
require_once('./classes/cart.php');
$cart = new Cart();

// make sure the cart exists
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

// get the product details for each product in the cart
$cartItems = array();
foreach($_SESSION['cart'] as $productId => $quantity){
    $product = $cart->getProduct($productId);
    $product['quantity'] = $quantity;
    $cartItems[] = $product;
}

?>

<?php
    include('./template/header.php');
?>

    <style>
          .image-container {
        width: 90px;
        height: 90px;
        background-color: pink;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn{
        border-radius: 40px;
    }
    </style>
    
</head>
<body>
<header style="height:90px;">
        <nav class="navbar navbar-expand-xxl navbar-dark text-white bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder" href="#">Beauty Product</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex icons p-4">
                   <a href="carts.php"><i class="fa-solid fa-cart-shopping fa-2x pe-4" style="color: #ffffff;"></i></a> 
                   <?php if (isset($_SESSION['username'])): ?>
    <div class="dropdown">
       <a ><h3 class="text-white username"><?php echo htmlspecialchars($_SESSION['username']); ?></h3></a> 
        <div class="dropdown-content">
            <a href="logout.php">Logout</a>
        </div>
    </div>
<?php else: ?>
    <a href="login.php"><i class="fa-solid fa-user fa-2x" style="color: #ffffff;"></i></a>
<?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
    <div class="row">
        <div class="col-9 p-5">
            <div class="row fw-bolder text-secondary">
                <div class="col-3 ">PRODUCT</div>
                <div class="col-3">PRICE</div>
                <div class="col-3">QTY</div>
                <div class="col-3">TOTAL</div>
            </div>
            <?php foreach($cartItems as $item): ?>
            <div class="row p-5 ps-2 fw-bolder">
                <div class="col-3 ps-0">
                    <div class="image-container">
                        <img src="<?php echo str_replace('..', '.', $item['image']);?>" alt="<?php echo $item['name']; ?>">
                    </div>
                    <p class="fw-bolder p-3"> <?php echo $item['name']; ?> </p>
                </div>
                <div class="col-3 pt-3">$<?php echo $item['price']; ?>.00</div>
                <div class="col-3 ps-3 pt-3">
                    <a class="pe-4 text-decoration-none text-black fw-bolder" href="decreaseQuantity.php?productId=<?php echo $item['id']; ?>">-</a>
                    <?php echo $item['quantity']; ?>
                    <a class="ps-4 text-decoration-none text-black fw-bolder" href="increaseQuantity.php?productId=<?php echo $item['id']; ?>">+</a>
                </div>
                <div class="col-3 ps-5 pt-3">$<?php echo $item['quantity'] * $item['price']; ?>.00</div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-3 text-center" style="background: #EFE4E4;">
    <hr style="width: 100%; background: #000; border: none; height: 2px;">
    <?php 
$total = 0;
foreach($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<div class="container mt-5 pt-5">
<h4>CART TOTAL: $<?php echo number_format($total, 2); ?></h4>

<p>Shipping and taxes calculated at checkout</p>
<div class="form-check">
    <input class="form-check-input" type="checkbox" id="termsCheck">
    <label class="form-check-label" for="termsCheck">
        I agree to terms & conditions
    </label>
</div>
<div class="container ps-4 mt-5 pt-5">
<a href="#" class="btn btn-dark d-block my-2 p-3">
    <i class="fas fa-shopping-cart"></i> Checkout
</a>
<br><br>
<a href="#" class="btn btn-light d-block my-2 p-3">
<i class="fa-brands fa-apple-pay"></i> Apple Pay
</a>
</div>
</div>
</div>

    </div>
</div>
<?php
    include('./template/footer.php');
  ?>
</body>
</html>

