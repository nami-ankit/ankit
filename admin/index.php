<?php
session_start();

// Check if the user is logged in and isAdmin flag is set
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header('Location: ../login.php'); // Redirect to login page
    exit();
}
require_once('../classes/product.php');
$product = new Product();
$products = $product->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Product</title>
    <script src="https://kit.fontawesome.com/148b4e7843.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-iBB6b6Yg5g5UZUJ9yG+9zixOIdnQd1zX0BdDZH1UPTUhFJXBD5V2p7WElJ27bFlZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">

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
                            <a class="nav-link active"  href="index.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feedbacks.php">Feedback</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="d-flex icons p-4">
                   <a href="carts.php"><i class="fa-solid fa-cart-shopping fa-2x pe-4" style="color: #ffffff;"></i></a> 
                   <?php if (isset($_SESSION['username'])): ?>
    <div class="dropdown">
       <a ><h3 class="text-white username"><?php echo htmlspecialchars($_SESSION['username']); ?></h3></a> 
        <div class="dropdown-content">
            <a href="../logout.php">Logout</a>
        </div>
    </div>
<?php else: ?>
    <a href="../login.php"><i class="fa-solid fa-user fa-2x" style="color: #ffffff;"></i></a>
<?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 text-center">
            <a class="btn btn-success" href="addProduct.php">ADD PRODUCT</a>
        </div>
        <div class="col-12 p-5 ">
            <div class="row fw-bolder text-secondary">
                <div class="col-3 ">PRODUCT</div>
                <div class="col-3">PRICE</div>
                <div class="col-3">DESCRIPTION</div>
                <div class="col-3">ACTIONS</div>
            </div>
            <?php foreach($products as $item): ?>
    <div class="row p-5 ps-2 fw-bolder">
        <div class="col-3 ps-0">
            <div class="image-container">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
            </div>
            <p class="fw-bolder p-3"> <?php echo $item['name']; ?> </p>
        </div>
        <div class="col-3 pt-3">$<?php echo $item['price']; ?>.00</div>
        <div class="col-3 pt-3 ps-5"><?php echo $item['description']; ?></div>
        <div class="col-3 pt-3">
            <a href="editProduct.php?productId=<?php echo $item['id']; ?>"> <button class="btn btn-primary">EDIT</button></a>
            <a href="deleteProduct.php?productId=<?php echo $item['id']; ?>"><button class="btn btn-danger">DELETE</button></a>
        </div>
    </div>
<?php endforeach; ?>

        </div>
        

    </div>
</div>

</body>
</html>
