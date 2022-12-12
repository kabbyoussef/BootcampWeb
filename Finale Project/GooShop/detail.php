<?php

include "Connection.php";
session_start();
if(isset($_SESSION['user'])){
    $log="Logout";
}else{
    $log="Login";
}
//unset($_SESSION["shopping_cart"]);



//-------------------------------------------
if(isset($_POST["add_to_cart"]))
{
 
   
if(isset($_SESSION["shopping_cart"]))
{
    $item_array_id = array_column($_SESSION["shopping_cart"], "id");

    if(!in_array($_GET["id"], $item_array_id))
    {
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
            'id'			=>	$_GET["id"],
            'name'			=>	$_POST["name"],
            'price'		=>	$_POST["price"],
            'quantity'		=>	$_POST["qte"],
            'color'		=>	$_POST["color"],
            'size'		=>	$_POST["size"],
            'img'		=>	$_POST["img"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
 
        foreach ($_SESSION["shopping_cart"] as $key => $item) {
            if ($item['id']== $_GET["id"]){
                $item['quantity'] = $item['quantity'] +$_POST["qte"];
            $_SESSION["shopping_cart"][$key] = $item;
            break;
         }
         
        }
 
    }
}
else
{
    $item_array = array(
        'id'			=>	$_GET["id"],
        'name'			=>	$_POST["name"],
        'price'		=>	$_POST["price"],
        'quantity'		=>	$_POST["qte"],
        'color'		=>	$_POST["color"],
        'size'		=>	$_POST["size"],
        'img'		=>	$_POST["img"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
}}


$count=0;
if(isset($_SESSION["shopping_cart"]))
{
$count = count($_SESSION["shopping_cart"]); 
}




//-----------------------------------------

if (isset($_REQUEST ['id'])){
    $sql="select * from products where id=".$_REQUEST['id'];
$result = mysqli_query(open_Con(), $sql);
$data=mysqli_fetch_assoc($result);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
  
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
        <div class="Sd-lg-block" style="flex: 0 0 20%;max-width: 13%;">
                       
            </div>
        <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="Men.php" class="nav-item nav-link active">Men</a>
                            <a href="women.php" class="nav-item nav-link ">Women</a>
                            <a href="kids.php" class="nav-item nav-link ">Kids</a>
                            <a href="Accessoire.php" class="nav-item nav-link ">Accessoires</a>
                      
                         
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
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
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
            

  
    <form method="post" action="">

    <div class="container-fluid ">
        <div class="row px-xl-5">
            <div class="col-lg-5 ">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img  height="600px" width="80%" src="<?php echo $data['img']; ?>" alt="Image">
                            <input type="hidden" name="img" value="<?php echo $data["img"]; ?>" />
                        </div>                     
                    </div>
                              </div>
            </div>
           
            <div class="col-lg-7 pb-5">
         
                <h3 class="font-weight-semi-bold"><?php echo $data['name']; ?>	<input type="hidden" name="name" value="<?php echo $data["name"]; ?>" />
            </h3>
        
                <h3 class="font-weight-semi-bold mb-4">$<?php echo $data['sellprice']; ?>
                <input type="hidden" name="price" value="<?php echo $data["sellprice"]; ?>"/></h3>
                <p class="mb-4"> <?php echo $data['description']; ?></p>

                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                   
                      
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="S" class="custom-control-input" id="size-2" name="size" checked="checked">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="M" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="L" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="XL" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                  
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" value="Black" name="color" checked="checked">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" value="White" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" value="Red" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" value="Blue" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" value="Green" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                     
                </div> 
                <div class="d-flex mb-4" style="width: 200px;">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Quantity:</p>
                       <input type="text" name="qte" class="form-control bg-secondary text-center" value="1">
                </div> 
                <div class="d-flex align-items-center mb-4 pt-2">
                
                                <button type="submit" name="add_to_cart" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
              
            </div>
        </div>
     
    </div>
</form>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>    
        <div class="row px-xl-5 pb-3">
        
        <?php
$sql="SELECT * FROM products WHERE category='".$data['category']."' group by name,category";
$result = mysqli_query(open_Con(), $sql);
while($data=mysqli_fetch_assoc($result)){

        ?>
<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
<div class="card-footer d-flex justify-content-between bg-light border">
              
              <a href="detail.php?id=<?php echo $data['id'];?>" class="btn btn-sm text-dark p-0 ">
                  
        <div class="card product-item border-0 ">
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
           
                </div></div>
</div>
        <?php } ?>

  


</div>
    </div>
    <!-- Products End -->


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
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>




    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>