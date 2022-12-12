<?php 

session_start();
if(isset($_SESSION['user'])){

    $email=$_SESSION['user'];
    $log="Logout";
}else{
    $email="";
    $log="Login";
}
//unset($_SESSION["shopping_cart"]);
$count=0;

if(isset($_SESSION["shopping_cart"]))
{
$count = count($_SESSION["shopping_cart"]); 
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
   

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center py-3 px-xl-55">
            
            <div  class="col-lg-7 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">Go</span>Shopping
                    </h1>
                </a>
            </div>
           
            <div class="col-lg-3 col-6 text-right">

                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $count ; ?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
  
    <div class="container-fluid mb-1">
        <div class="row border-top px-xl-5">
        <div class="Sd-lg-block" style="flex: 0 0 20%;max-width: 13%;">
            
            
            </div>
        <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="Men.php" class="nav-item nav-link ">Men</a>
                            <a href="women.php" class="nav-item nav-link ">Women</a>
                            <a href="kids.php" class="nav-item nav-link ">Kids</a>
                            <a href="Accessoire.php" class="nav-item nav-link ">Accessoires</a>
                      
                         
                            <a href="contact.php" class="nav-item nav-link active" >Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                        <a href="login.php" class="nav-item nav-link"><?php echo $log; ?></a>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
               
            </div>
        </div>  
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" value="<?php    echo $email; ?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>neloy.kabb@goshopping.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
      
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-5 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopping
                    </h1>
                </a>
                <p>
                    We promise we'll do everything we can to make shopping with us a great experience!
                    If you have any suggestions on how we can improve, <a href="contact.php">please let us know!</a>
                </p>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary mr-3"></i>neloy.kabb@goshopping.com
                </p>
                <p class="mb-0">
                    <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
                </p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">

                    <div class="col-md-5 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php">
                                <i class="fa fa-angle-right mr-2"></i>Home
                            </a>
                            <a class="text-dark mb-2" href="Men.php">
                                <i class="fa fa-angle-right mr-2"></i>Men
                            </a>

                            <a class="text-dark mb-2" href="women.php">
                                <i class="fa fa-angle-right mr-2"></i>Women
                            </a>
                            <a class="text-dark mb-2" href="kids.php">
                                <i class="fa fa-angle-right mr-2"></i>Kids
                            </a>
                            <a class="text-dark mb-2" href="Accessoire.php">
                                <i class="fa fa-angle-right mr-2"></i>Accessoires
                            </a>
                            <a class="text-dark" href="contact.php">
                                <i class="fa fa-angle-right mr-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12   ">
                        <h5 class="font-weight-bold text-dark mb-4"> Get rewarded just for shopping!</h5>


                        <p>
                            By entering your email, you are signing up to receive Lulus promotional emails and get 15% off any future order. New subscribers only.

            You are also agreeing to our Privacy Policy. You may unsubscribe at any time here.
                        </p>

                    </div>
           
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">GoShpping</a>. All Rights Reserved. Designed
                    by <b>Neloy Islam</b> and <b>Youssef Kabbouch</b>

                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>