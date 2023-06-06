<?php

session_start();
include('./template/header.php');
?>

    <style>
         .carousel-indicators li {
            border-radius: 50%;
        }
        .carousel-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .carousel-img {
            width: 100px;
            height: 100px;
            overflow: hidden;
        }
        .carousel-img img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        ul {
    list-style-type: none;
}

    .products{

        background-color: #E7E3E3;;
    }

    .image-container {
        padding-left: 40px;
        width: 250px;
        height: 250px;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    

    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-xxl navbar-dark text-white bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder" href="#">Beauty Product</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="shop.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="about.php">About Us</a>
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
        <div class="overlay d-flex align-items-center justify-content-start">
            <div>
               <h1 class= "text-white"> Product  </h1>
               <p class="text-white">The best products in affordable prices catering to all skin types. <br> Get 50% off for your first purchase</p>
            </div>
        </div>
    </header>
<?php
require_once('./classes/product.php');
$product = new Product();
$products = $product->read();
?>

<section class="products">
    <div class="container product-container">
        <h1 class="text-center p-4">Products</h1>
        <div class="row p-4">
    <?php $count = 0; ?>
    <?php foreach ($products as $product) : ?>
        <div class="col-3 text-center mb-4">

            <div class="bg-white">

                <div class="product-info">
                    <span class="text-secondary fw-bolder pb-2 text-capitalize"><?php echo $product['name']; ?></span>
                   </div>
                <div class="product-price fw-bolder pb-2" >
                    <span>$<?php echo $product['price']; ?></span>
                </div>
                <div class="image-container">
                        <img src="<?php echo str_replace('..', '.', $product['image']);?>" alt="<?php echo $product['name']; ?>">

                    </div>
                    <a href="addToCart.php?productId=<?php echo $product['id']; ?>">
         <button class="btn btn-black"><i class="fas fa-shopping-cart"></i> ADD TO CART </button>
            </a> 
            </div>
        </div>
        <?php $count++; ?>
        <?php if ($count % 4 === 0) : ?>
            </div><div class="row p-4">
        <?php endif; ?>
    <?php endforeach; ?>
</div>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <?php
    include('./template/footer.php');
  ?>
</body>
</html>

