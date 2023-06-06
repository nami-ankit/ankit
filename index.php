<?php
session_start();

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
    <link rel="stylesheet" href="./css/styles.css">
    <style>
      
        .features{
        margin-top: 100px;
        padding: 2% 15%;
    }

    .feature-box{
        text-align: center;
        padding: 5%;
    }

    .icon{

        color: #ef8172;
        margin-bottom: 20px;
    }

    p{
        color: #8f8f8f;
    }

    .icon:hover{

        color: #ff4c68;
    }

    ul {
    margin: 0px;
    padding: 0px;
}
.footer-section {
  background: #EFE4E4;
  position: relative;
}
.footer-cta {
  border-bottom: 1px solid #373636;
}
.single-cta i {
  color: #ff5e14;
  font-size: 30px;
  float: left;
  margin-top: 8px;
}
.cta-text {
  padding-left: 15px;
  display: inline-block;
}
.cta-text h4 {
  color: black;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 2px;
}
.cta-text span {
  color: #FF4C68;
  font-size: 15px;
  font-weight: bold;
}
.footer-content {
  position: relative;
  z-index: 2;
}
.footer-pattern img {
  position: absolute;
  top: 0;
  left: 0;
  height: 330px;
  background-size: cover;
  background-position: 100% 100%;
}
.footer-logo {
  margin-bottom: 30px;
}
.footer-logo img {
    max-width: 200px;
}
.footer-text p {
  margin-bottom: 14px;
  font-size: 14px;
      color: #7e7e7e;
  line-height: 28px;
}
.footer-social-icon span {
  color: black;
  display: block;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
}
.footer-social-icon >ul{
  display: inline-flex;
}
.footer-social-icon a {
  color: black;
  font-size: 16px;
  margin-right: 15px;
}
.footer-social-icon i {
  height: 40px;
  width: 40px;
  text-align: center;
  line-height: 38px;
  border-radius: 50%;
}
.facebook-bg{
  background: #3B5998;
}
.twitter-bg{
  background: #55ACEE;
}
.google-bg{
  background: #DD4B39;
}
.footer-widget-heading h3 {
  color: black;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 40px;
  position: relative;
}
.footer-widget-heading h3::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -15px;
  height: 2px;
  width: 50px;
  background: #ff5e14;
}
.footer-widget ul li {
  display: inline-block;
  /* float: left; */
  width: 50%;
  margin-bottom: 12px;
}
.footer-widget ul li a:hover{
  color: #ff5e14;
}
.footer-widget ul li a {
  color: #878787;
  text-transform: capitalize;
}
.subscribe-form {
  position: relative;
  overflow: hidden;
}
.subscribe-form input {
  width: 100%;
  padding: 14px 28px;
  background: #2E2E2E;
  border: 1px solid #2E2E2E;
  color: #fff;
}
.copyright-area{
  background: #202020;
  padding: 15px 0;
}
.copyright-text p {
  margin: 0;
  font-size: 14px;
  color: #878787;
}
.copyright-text p a{
  color: #ff5e14;
}
.footer-menu li {
  display: inline-block;
  margin-left: 20px;
}
.footer-menu li:hover a{
  color: #ff5e14;
}
.footer-menu li a {
  font-size: 14px;
  color: #878787;
}
.footer-logo span{
  color: #FF4C68;
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        <div class="overlay d-flex align-items-center justify-content-start">
            <div>
                <h2 class="text-white">Welcome to The World of Beauty</h2>
                <p class="text-white">Ut interdum euismod sapien at tincidunt. Cras sapien mi, laoreet et<br> lorem vitae, vestibulum lacinia sapien. Vivamus varius nec odio at <br> faucibus. </p>
                <a href="#" class="btn btn-dark">SHOP NOW</a>
            </div>
        </div>
    </header>

    <!-- Features -->

    <section id="features">

    .<div class="container">
    <div class="row">

<div class="feature-box col-lg-4">
<i class="icon fa-solid fa-phone fa-4x"></i>
  <h3>Available 24/7</h3>
  <p>We recieve your calls all the time.</p>

</div>

<div class="feature-box col-lg-4">
<i class="icon fa-solid fa-universal-access fa-4x"></i>
  <h3>Easy Access</h3>
  <p>Access anytime, anywhere</p>

</div>
<div class="feature-box col-lg-4">
<i class="icon fa-solid fa-truck fa-4x"></i>
  <h3>Fastest Delivery</h3>
  <p>Find your products at your doorstep.</p>

</div>

</div>
    </div>
</section>
    
<footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us here:</h4>
                                <span>Dabali, Hadigaun Kathmandu 44600</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>9851000000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>mail@beautyhub.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <h3>Beauty<span>Hub</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Follow Us</h3>
                            </div>
                            <div class="footer-social-icon">
                                <ul>
                                    <li><a class="hover-target" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="hover-target" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a class="hover-target" href="https://www.github.com/"><i class="fab fa-github"></i></a></li>
                                    <li><a class="hover-target" href="https://www.behance.com/"><i class="fab fa-behance"></i></a></li>
                                    <li><a class="hover-target" href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>                           
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023, All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
