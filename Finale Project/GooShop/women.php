<?php

include "Connection.php";
session_start();
if(isset($_SESSION['user'])){
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
}
if (isset( $_POST['search'])){
   
    $sql="SELECT * FROM products WHERE category= 'women' and products.name like '%".$_POST['search']."%' group by name";

}
if (isset($_POST['submit'])){
    $sqlWhere="";
    $PriceWhere="";
    // filter by price
        if (isset($_POST['price1'])){
    $PriceWhere=$PriceWhere ."(sellprice between 0 and 100)or";
        }      
        if (isset($_POST['price2'])){
    $PriceWhere=$PriceWhere . "(sellprice between 100 and 200)or";
        }

        if (isset($_POST['price3'])){
    $PriceWhere=$PriceWhere ."(sellprice between 200 and 300)or";
         }

        if (isset($_POST['price4'])){
            $PriceWhere=$PriceWhere ."(sellprice >= 300 )or";
         } 
        
         if (isset($_POST['price0'])){
            $PriceWhere="";
         }else{
           if( $PriceWhere<>""){
               $PriceWhere= rtrim($PriceWhere, "or");
               $PriceWhere="(".$PriceWhere.")";
        }
         }
         $sqlWhere=rtrim(  $sqlWhere, "and");
         $sqlWhere=ltrim(  $sqlWhere, "and");
         $sqlWhere=$PriceWhere;
          // filter by color
         $ColorWhere="";
         if (isset($_POST['colorb'])){
            $ColorWhere=$ColorWhere ."(color = 'black')or";
         } 
         if (isset($_POST['colorw'])){
            $ColorWhere=$ColorWhere ."(color = 'white')or";
         } 
         if (isset($_POST['colorbl'])){
            $ColorWhere=$ColorWhere ."(color = 'blue')or";
         } 
         if (isset($_POST['colorAll'])){
            $ColorWhere="";
         }else{
            if( $ColorWhere<>""){
                $ColorWhere= rtrim($ColorWhere, "or");
                $ColorWhere="(".$ColorWhere.")";
         }
         }
         $sqlWhere=rtrim(  $sqlWhere, "and");
         $sqlWhere=ltrim(  $sqlWhere, "and");
         $sqlWhere=$sqlWhere."and".$ColorWhere;
        // filter by size
        $sizeWhere="";
        if (isset($_POST['sizes'])){
           $sizeWhere=$sizeWhere ."(size = 'S')or";
        } 
        if (isset($_POST['sizem'])){
           $sizeWhere=$sizeWhere ."(size   = 'M')or";
        } 
        if (isset($_POST['sizel'])){
           $sizeWhere=$sizeWhere ."(color = 'L')or";
        } 
        if (isset($_POST['sizex'])){
            $sizeWhere=$sizeWhere ."(color = 'XL')or";
         } 
        if (isset($_POST['sizeAll'])){
           $sizeWhere="";
        }else{
           if( $sizeWhere<>""){
               $sizeWhere= rtrim($sizeWhere, "or");
               $sizeWhere="(".$sizeWhere.")";
        }
        }
     
        $sqlWhere=rtrim(  $sqlWhere, "and");
        $sqlWhere=ltrim(  $sqlWhere, "and");
        $sqlWhere=$sqlWhere."and".$sizeWhere;
        $sqlWhere=rtrim(  $sqlWhere, "and");
        $sqlWhere=ltrim(  $sqlWhere, "and");
     
         if ( $sqlWhere<>""){
             
         $sql="SELECT * FROM products WHERE category= 'women' and  $sqlWhere  group by name,category";
      
        }else{
            $sql="SELECT * FROM products where category='women' group by name,category";
         }
         if (isset( $_POST['search'])){
      
            $sql="SELECT * FROM products WHERE category= 'women' and products.name like '%".$_POST['search']."%' group by name";
        }
}else{
    $sql="SELECT * FROM products WHERE category= 'women'  group by name,category";
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
<form action="" method="post">
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
  
    <div class="container-fluid ">
        <div class="row border-top px-xl-5">
        <div class="Sd-lg-block" style="flex: 0 0 20%;max-width: 13%;">
            
            
            </div>
        <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="Men.php" class="nav-item nav-link ">Men</a>
                            <a href="women.php" class="nav-item nav-link active">Women</a>
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
    <div class="container-fluid bg-secondary ">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Women Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Women</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
              
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold "><input type="submit" name="submit" style="width:150px" value="Filter" class="btn  btn-primary"/></h5>
                    <h5 class="font-weight-semi-bold ">Filter by price</h5>
                    
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price0"  class="custom-control-input" <?php if(isset($_POST['price0'])) echo "checked='checked'"; ?>  id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                          
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price1"  class="custom-control-input" <?php if(isset($_POST['price1'])) echo "checked='checked'"; ?> id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                         
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price2" class="custom-control-input" <?php if(isset($_POST['price2'])) echo "checked='checked'"; ?>  id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                           
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price3" class="custom-control-input" <?php if(isset($_POST['price3'])) echo "checked='checked'"; ?>  id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                          
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price4" class="custom-control-input" <?php if(isset($_POST['price4'])) echo "checked='checked'"; ?>  id="price-4">
                            <label class="custom-control-label" for="price-4">Up to $300</label>
                       
                        </div>
                   
                 
                </div>
               
                <!-- Price End -->
                
                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold ">Filter by color</h5>
                  
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="colorAll" class="custom-control-input" <?php if(isset($_POST['colorAll'])) echo "checked='checked'"; ?> id="color-all">
                            <label class="custom-control-label" for="color-all">All Color</label>
                         
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="colorb" class="custom-control-input" <?php if(isset($_POST['colorb'])) echo "checked='checked'"; ?> id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                           
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="colorw" class="custom-control-input" <?php if(isset($_POST['colorw'])) echo "checked='checked'"; ?>id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                        
                        </div>
                      
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="colorbl" class="custom-control-input" <?php if(isset($_POST['colorbl'])) echo "checked='checked'"; ?>id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                          
                        </div>
                   
                   
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold ">Filter by size</h5>
                   
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="sizeAll" class="custom-control-input" <?php if(isset($_POST['sizeAll'])) echo "checked='checked'"; ?> id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
       
                        </div>
                     
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="sizes" class="custom-control-input" <?php if(isset($_POST['sizes'])) echo "checked='checked'"; ?>id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                   
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="sizem" class="custom-control-input" <?php if(isset($_POST['sizem'])) echo "checked='checked'"; ?> id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                       
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="sizel" class="custom-control-input" <?php if(isset($_POST['sizel'])) echo "checked='checked'"; ?> id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                        
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" name="sizexl" class="custom-control-input" <?php if(isset($_POST['sizexl'])) echo "checked='checked'"; ?> id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                         
                        </div>
                 
                </div>
              
                <!-- Size End -->
    </div>  
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                           
                                <div class="input-group">
                                    <input type="text" name="search" value="<?php if(isset($_POST['search'])) echo $_POST['search']; ?>" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                           
                            <div class="dropdown ml-4">
                                
                               
                            </div>
                        </div>
                    </div>
                   
                 
                
         
               
                    <?php

      $result = mysqli_query(open_Con(), $sql);
      if (mysqli_num_rows($result)>0){
    while($data=mysqli_fetch_assoc($result)){
                ?>
                 
                 
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1"> 
                        <div class="card-footer d-flex justify-content-between  border">
                 
                        <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-sm text-dark p-0">
                          
                        <div class="card product-item border-0 mb-4">
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
                   
                       
                    
                        </div> </a></div>
                    </div> 
                    
                    
                <?php }} ?>
                
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div></form>
    <!-- Shop End -->


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




</body>

</html>