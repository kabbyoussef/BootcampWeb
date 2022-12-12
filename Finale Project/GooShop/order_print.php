<?php
include "Connection.php";
$user=$_REQUEST['id'];
$total=0;



$sql = "SELECT * FROM orders where idOrder=$user";
$result = mysqli_query(  open_Con(), $sql);
$row=mysqli_fetch_assoc($result);

$sql = "SELECT * FROM adress_shipping where id=".$row['shipping'];
  $result = mysqli_query( open_Con(), $sql);
$data=mysqli_fetch_assoc($result);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoShopping</title>
 
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
     




<!-- Navbar End -->



    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Number</h1>
            <div class="d-inline-flex">
            
             <h3 class="font-weight-semi-bold text-uppercase">#<?php echo $row['idOrder']; ?>#</h3>
                               
                
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5" >
 
        <div class="row px-xl-5">
            <div class="col-lg-11 table-responsive ">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>REQUESTED BY</th>
                            <th>ORDER DATE</th>
                            <th>DELIVREY ADRESS</th>
                            <th>DELIVREY DATE</th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                 
   
               
   
                        <tr>
                            <td class="align-middle"><?php echo $data["fname"]." ".$data["lname"]; ?></td>
                            <td class="align-middle"><?php echo $row['order_date']; ?></td>
                            <td class="align-middle">     <?php echo $data["adress1"]; ?>               
                            </td>
                            <td class="align-middle"><?php echo $row['ship_date']; ?>    </td>
                       
                        </tr>
                  
                    </tbody>
                </table>
            </div>

           
        </div>
    </div>
    <div class="container-fluid pt-5">
 
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                 
   
               
                    <?php
				$sql = "SELECT * FROM order_details where order_details.order_num=$user";
                $result = mysqli_query(  open_Con(), $sql);
                while($values=mysqli_fetch_assoc($result))
											                         
						{
					?>
                        <tr>
                            <td class="align-middle"><?php echo $values["name"]; ?></td>
                            <td class="align-middle">$<?php echo $values['sellprice']; ?></td>
                            <td class="align-middle">
                           
      
       
     
  
                            </td>
                            <td class="align-middle">$<?php echo $values['sellprice'] * $values["qte"]; ?></td>
                       
                        </tr>
                    <?php    $total=$total+($values['sellprice'] * $values["qte"]);
                    }                ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="" method="post">
                 
              
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$   <?php echo $total ; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$   <?php echo $total ; ?></h5>
                        </div>
                       
                    </div>
                 
                </div> </form>
            </div>
           
        </div>
    </div>
    <!-- Cart End -->

</body>

</html>