<?php 
include "Connection.php";
session_start();
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $log="Logout";
}else{
    $log="Login";
}
//unset($_SESSION["shopping_cart"]);
$count=0;
$total=0;
if(isset($_SESSION["shopping_cart"]))
{
$count = count($_SESSION["shopping_cart"]); 
}else{
    header("location:cart.php");
}

// place the order

if(isset($_POST["submit"])){
// billing adress
   $sql = "UPDATE adress_billing SET
    fname ='".$_POST["fname"]."',
    lname ='".$_POST["lname"]."',
    adress1 ='".$_POST["adress1"]."',
    adress2 ='".$_POST["adress2"]."',
    mobile ='".$_POST["mobile"]."',
    country ='".$_POST["country"]."',
    city ='".$_POST["city"]."',
    zip =".(int)$_POST["zip"].",
    state ='".$_POST["state"]."',
    email ='".$_POST["email"]."',
    number =".(int)$_POST["number"].",
    cardType ='".$_POST["cardType"]."',
    expMonth =".(int)$_POST["expMonth"].",
    expYear =".(int)$_POST["expYear"].",
    security =".(int)$_POST["security"]." WHERE id = ".$_POST["idBilling"];

    if (mysqli_query(open_Con(), $sql)) {
       
   } else {
      ECHO  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
   }
   // shipping adress
   $sql ="";
   if (isset($_POST["same"])){
  $sql = "UPDATE adress_shipping
   SET
   fname = '".$_POST["fnameA"]."',
   lname = '".$_POST["lnameA"]."',
   adress1 = '".$_POST["adress1A"]."',
   adress2 = '".$_POST["adress2A"]."',
   mobile = '".$_POST["mobileA"]."',
   country = '".$_POST["countryA"]."',
   city = '".$_POST["cityA"]."',
   zip = ".(int)$_POST["zipA"].",
   state = '".$_POST["stateA"]."',
   email = '".$_POST["emailA"]."'
    WHERE id = ".$_POST["idAdress"].";";
   }else{
    $sql = "UPDATE adress_shipping
    SET
    fname ='".$_POST["fname"]."',
    lname ='".$_POST["lname"]."',
    adress1 ='".$_POST["adress1"]."',
    adress2 ='".$_POST["adress2"]."',
    mobile ='".$_POST["mobile"]."',
    country ='".$_POST["country"]."',
    city ='".$_POST["city"]."',
    zip =".(int)$_POST["zip"].",
    state ='".$_POST["state"]."',
    email ='".$_POST["email"]."'
     WHERE id = ".$_POST["idAdress"].";";
   }
   if (mysqli_query(open_Con(), $sql)) {
      
  } else {
     ECHO  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
  }
  //order
  $sql="INSERT INTO orders (user,shipping,billing,total)VALUES('$user',".$_POST["idAdress"].",".$_POST["idBilling"].",".$_POST["total"].");";
  if (mysqli_query(open_Con(), $sql)) {
       } else {
   ECHO  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
}
$sql = "SELECT * FROM orders where user='$user' order by idOrder desc LIMIT 1";
$result = mysqli_query( open_Con(), $sql);
$row=mysqli_fetch_assoc($result);
   //order_details
   $sql="";
  
  foreach($_SESSION["shopping_cart"] as $keys => $values)
                         						{

$sql= "insert into order_details (name,size,color,qte,sellprice,total,order_num) values ('".$values['name']."',
'".$values['size']."','".$values['color']."',".$values['quantity'].",
".$values['price'].",".($values['quantity']*$values['price']).",".$row['idOrder'].");";

   if (mysqli_query( open_Con(), $sql)) {
      
                        } else {
                           ECHO  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
                        }
                        }
                    
//clear session
unset($_SESSION["shopping_cart"]);

echo "<script>window.open('order_print.php?id=".$row['idOrder']."', '_blank' );</script>";

}
  // filling out form
  $sql = "SELECT * FROM adress_shipping where user='$user' order by id desc";
  $result = mysqli_query( open_Con(), $sql);
$data=mysqli_fetch_assoc($result);
$sql = "SELECT * FROM adress_billing where user='$user' order by id desc";
$result = mysqli_query(  open_Con(), $sql);
$row=mysqli_fetch_assoc($result);
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
                    <a href="Men.php?cat=Men" class="nav-item nav-link active">Men</a>
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
     
    </div>
</div>  
</div>
<!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
<form action="" method="post">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input   name="idBilling"  type="hidden"  value="<?php echo $row['id'];?>">
                             <input  required="required"  name="fname" class="form-control" type="text" placeholder="YSF" value="<?php echo $row['fname'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                             <input  required="required" name="lname" class="form-control" type="text" placeholder="KAB" value="<?php echo $row['lname'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                             <input  required="required" name="email" class="form-control" type="text" value="<?php echo $row['email'];?>" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="mobile" class="form-control" pattern="[0-9]*" type="text" value="<?php echo $row['mobile'];?>"  placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                             <input  required="required" name="adress1" class="form-control" type="text" value="<?php echo $row['adress1'];?>"  placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input name="adress2" class="form-control" type="text" value="<?php echo $row['adress2'];?>"  placeholder="Apt 123">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select name="country" class="custom-select" >
                                <option>United States</option>
                                <option>Morocco</option>
                                <option>Afghanistan</option>
                                <option>Palestine</option>
                                <option>Algeria</option>
                                <option>France</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                             <input  required="required" name="city" class="form-control" value="<?php echo $row['city'];?>"  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                             <input  required="required" name="state" class="form-control" value="<?php echo $row['state'];?>"  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                             <input  required="required" name="zip" class="form-control" value="<?php echo $row['zip'];?>"  type="text" placeholder="123">
                        </div>
                  
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="same" type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                    <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input   name="idAdress"  type="hidden"  value="<?php echo $data['id'];?>">
                            <input  name="fnameA" class="form-control" type="text" placeholder="YSF" value="<?php echo $data['fname'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input name="lnameA" class="form-control" type="text" placeholder="KAB" value="<?php echo $data['lname'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="emailA" class="form-control" type="text" value="<?php echo $data['email'];?>" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="mobileA" class="form-control" type="text" value="<?php echo $data['mobile'];?>"  placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input name="adress1A" class="form-control" type="text" value="<?php echo $data['adress1'];?>"  placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input name="adress2A" class="form-control" type="text" value="<?php echo $data['adress2'];?>"  placeholder="Apt 123">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select name="countryA" class="custom-select" value="<?php echo $data['country'];?>" >
                                <option selected>United States</option>
                                <option>Morocco</option>
                                <option>Afghanistan</option>
                                <option>Palestine</option>
                                <option>Algeria</option>
                                <option>France</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input name="cityA" class="form-control" value="<?php echo $data['city'];?>"  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input name="stateA" class="form-control" value="<?php echo $data['state'];?>"  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input name="zipA" class="form-control" value="<?php echo $data['zip'];?>"  type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                       <?php
                        if(!empty($_SESSION["shopping_cart"]))
				        	{
                                $total=0;			
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						    {
					?>
                        <div class="d-flex justify-content-between">
                            <p> <?php echo $values["name"]; ?></p>
                            <p>$ <?php echo $values['price'] * $values["quantity"]; ?></p>
                        </div>
                   <?php
                   $total=$total+($values['price'] * $values["quantity"]); }

                } ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$<?php echo $total ; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <input   name="total"  type="hidden"  value="<?php echo $total ; ?>">
                            <h5 class="font-weight-bold">$<?php echo $total ; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group"> <label>Card Type</label>
                            <div class="custom-control ">
                           
                            <select name="cardType" class="custom-select">
                                <option selected>GoShopping Card</option>
                                <option>Visa</option>
                                <option>American Express</option>
                                <option>MasterCard</option>
                                <option>Discover</option>
                                <option>Paypal</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label>Card Number</label>
                        <div class="custom-control ">
                            
                             <input  required="required" name="number" class="form-control" type="text" placeholder="card number" >
                            </div>
                        </div>
                        <div class="form-group">
                        <label>Expiration Date</label>
                        <div >
                        &nbsp;&nbsp;  &nbsp;&nbsp;  <select style="width: 43%;" name="expMonth"  data-validate="expMonth" aria-label="Expiration Date Month" autocomplete="off" aria-required="true" required="" class="custom-select" aria-invalid="false">
                        <option value="">Month</option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                  </select>
                                  &nbsp;&nbsp;  <select style="width: 45%;" name="expYear"  data-validate="expYear" aria-label="Expiration Date Year" autocomplete="off" aria-required="true" required="" class="custom-select" aria-invalid="true" aria-describedby="rc-payment-card-year-error">
                                  <option value="">
                                          Year</option>
                                      <option value="2022">
                                          2022</option>
                                      <option value="2023">
                                          2023</option>
                                      <option value="2024">
                                          2024</option>
                                      <option value="2025">
                                          2025</option>
                                      <option value="2026">
                                          2026</option>
                                      <option value="2027">
                                          2027</option>
                                      <option value="2028">
                                          2028</option>
                                      <option value="2029">
                                          2029</option>
                                      <option value="2030">
                                          2030</option>
                                      <option value="2031">
                                          2031</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label>Security Code</label>
                        <div class="custom-control ">
                            
                             <input  required="required" name="security" class="form-control" type="text" placeholder="3-digits on front of card">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button name="submit" type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- Checkout End -->


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


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>