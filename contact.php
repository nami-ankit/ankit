
<?php
  session_start();
?>


<?php
    include('./template/header.php');
?>
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
                            <a class="nav-link " aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact.php">Contact Us</a>
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
    <section class="container mt-5">
      <h1 class="text-center ">Contact Form </h1>
      <form method="POST" action="contact.php"  class="form" enctype="multipart/form-data">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="username" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Feedback</label>
          <input type="text" name="description" placeholder="Give us your feedback" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Image</label>
            <input type="file" name="image"  />
          </div>
         
        </div>
        
        <button>Send</button>
      </form>
    </section>
    
</body>
</html>

<?php

require_once('./classes/feedback.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username']; 
    $description = $_POST['description'];

    $target_dir = "./images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $entry = new Entry();
    $entry->create($name, $description, $target_file);
}
?>
