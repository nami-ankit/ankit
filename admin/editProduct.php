<?php
require_once('../classes/product.php');

session_start();

// Check if the user is logged in and isAdmin flag is set
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header('Location: ../login.php'); // Redirect to login page
    exit();
}
$product = new Product();


// get product details
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $currentProduct = $product->getProductById($productId); 
} else {
    die('No product ID provided');
}

// process form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Check if a file was uploaded
    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
        $image = $_FILES['image']['name'];
        $target = "../images/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
    
        $target = $product->getImagePath($productId);
    }

    $product->update($productId, $name, $price, $description, $target);
    header('Location:  index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/148b4e7843.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-iBB6b6Yg5g5UZUJ9yG+9zixOIdnQd1zX0BdDZH1UPTUhFJXBD5V2p7WElJ27bFlZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Contact Page</title>
   <style>
    header{
      height: 90px;
    }
    /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}


.form button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: #e0ac69;
}
.form button:hover {
  background: 	#f1c27d;
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
    <section class="container mt-5">
      <h1 class="text-center ">Edit the Product </h1>
      <form method="POST" class="form" enctype="multipart/form-data">
    <div class="input-box">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $currentProduct['name']; ?>" />
    </div>
  
    <div class="input-box">
      <label>Price</label>
      <input type="text" name="price" value="<?php echo $currentProduct['price']; ?>" />
    </div>

    <div class="input-box">
      <label>Description</label>
      <input type="text" name="description" value="<?php echo $currentProduct['description']; ?>"  />
    </div>

    <div class="column">
      <div class="input-box">
        <label>Image</label>
        <input type="file" name="image" />
      </div>
    </div>  
  <button>Send</button>
</form>
    </section>
</body>
</html>

