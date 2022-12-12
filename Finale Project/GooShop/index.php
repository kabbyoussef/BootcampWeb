<?php
// connect the database
include "Connection.php";
session_start();

if(isset($_SESSION['user'])){
    $log="Logout";
}else{
    $log="Login";
}

$count=0;
$total=0;

if(isset($_SESSION["shopping_cart"]))
{
$count = count($_SESSION["shopping_cart"]); 
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GOShopping</title>
  
   <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
  
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
        <div class="Sd-lg-block" style="flex: 0 0 20%;max-width: 13%;">
            
            
            </div>
        <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="Men.php?cat=Men" class="nav-item nav-link ">Men</a>
                            <a href="Men.php?cat=women" class="nav-item nav-link ">Women</a>
                            <a href="Men.php?cat=kids" class="nav-item nav-link ">Kids</a>
                            <a href="Men.php?cat=Accessoires" class="nav-item nav-link ">Accessoires</a>
                      
                         
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link"><?php echo $log; ?></a>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 500px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="Men.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 500px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="women.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 500px;">
                            <img class="img-fluid" src="img/carousel-3.jpg" alt="Image" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">10% Off Your First Order</h3>
                                    <a href="kids.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>  
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Products Start -->
 
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">New Collection</span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
        
                <?php
      $sql="SELECT * FROM products WHERE collection= YEAR(CURDATE()) group by name,category";
      $result = mysqli_query(open_Con(), $sql);
    while($data=mysqli_fetch_assoc($result)){

                ?>
    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">     <div class="card-footer d-flex justify-content-between  border">
<a href="detail.php?id=<?php echo $data['id'];?>" class="btn btn-sm text-dark p-0">
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="<?php echo $data['img'];?>" alt="" />
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $data['name'];?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?php echo $data['sellprice'];?></h6><h6 class="text-muted ml-2">
                                <del><?php echo $data['sellprice']+50 ; ?></del>
                            </h6>
                        </div>
                    </div>
               
                      
                       
                      </a>
                    </div>
                </div>
  </div>
                <?php } ?>

          


        </div>
    </div>
    <!-- Products End -->








    <!-- Vendor End -->


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
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">GoShpping</a>. All Rights Reserved. Created
                    by <b>Youssef Kabbouch</b>

                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>



    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>