<?php  
include "Connection.php";
$msg="";
$fname='';
$lname="";
$psw="";
$email="";
if (isset($_POST['submit'])){

open_Con();


$fname=$_POST["fname"];
$lname=$_POST["lname"];
$psw=$_POST["psw"];
$email=$_POST["email"];

$sql = "select * from users where email='$email'";
$result = mysqli_query(open_Con(), $sql);
if (mysqli_num_rows($result)!=0) {
	$msg= "This email address is already being used";
}else{ 
	
				 $sql = "INSERT INTO adress_shipping (fname,lname,user,email) VALUES ('$fname','$lname','$email','$email')";
				 if (mysqli_query(open_Con(), $sql)) {
					
				} else {
					$msg=  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
				}

		 $sql = "INSERT INTO adress_billing (fname,lname,user,email) VALUES ('$fname','$lname','$email','$email')";
        if (mysqli_query(open_Con(), $sql)) {
          
        } else {
            $msg=  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
        }
		$sql = "INSERT INTO users (fname,lname,password,email,role) VALUES ('$fname','$lname','$psw','$email','guest')";
		if (mysqli_query(open_Con(), $sql)) {
		   $msg=  "New Account created successfully";
	   } else {
		   $msg=  "Error: " . $sql . "<br>" . mysqli_error(open_Con());
	   }
}


   
        close_Con();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>,
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM VALIDATION</title>
    <link rel="stylesheet" href="css/styleReg.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="https://kit.fontawesome.com/2bbac3a66c.js" crossorigin="anonymous" ></script>
</head>
<body>
    <form  id="create-account-form" action="" method="post">
        
        <div class="title">
            <h2>Create Account</h2>
        </div>
        <!-- USERNAME -->
        <div class="input-group">
            <label for="username">First Name</label>
            <input type="text" id="username" value="<?php echo $fname ;?>" placeholder="Name" name="fname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
		<div class="input-group">
            <label for="username2">Last Name</label>
            <input type="text" id="username2" value="<?php echo $lname ;?>" placeholder="Name" name="lname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- EMAIL -->
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" value="<?php echo $email ;?>" placeholder="Email" name="email">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- PASSWORD -->
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" value="<?php echo $psw ;?>" placeholder="Password" name="psw">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- CONFIRM PASSWORD -->
        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" value="<?php echo $psw ;?>" placeholder="Password" name="confirmpassword">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>

        <button type="submit" class="btn" name="submit">Submit</button>
        <br>			<a href="login.php" id="signup" class="signup">Already have an account? Login!</a>
		<br>			<a href="index.php" >Home Page!</a>
		<p style="color: red;"><?php echo $msg; ?></p>
    </form>


    <!-- JAVASCRIPT -->
    <script src="js/register.js"></script>
</body>
</html>

<!-- 

    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>

 -->