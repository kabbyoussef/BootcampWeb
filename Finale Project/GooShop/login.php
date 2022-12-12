
<?php 
include "Connection.php";
session_start();
$msg='';
if (isset($_POST['submit'])){

    open_Con();
       $user=$_POST["email"];
        $psw=$_POST["password"];
        $sql = "SELECT * FROM users where email='".$user."' and password='".$psw."'" ;
        $result = mysqli_query(  open_Con(), $sql);
        if ($row=mysqli_fetch_assoc($result)) {
			$_SESSION['user']=$row['email'];
            header('location: index.php');

        } else {
           $msg= "Incorrect username or password.";
        }
         close_Con();
    }else{
		unset($_SESSION['user']);
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
	<script src="login.js"></script>
</head>
<body>
	
<div class="container">
	<div class="header">
		<h2>Login!</h2>
	</div>
	<form  action="" method="POST" id="form" class="form">
    <div class="form-control">
			<label for="username">Email</label>
			<input type="email" name="email" email" id="email" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
        <div class="form-control">
			<label for="password">Password </label>
			<input type="password" name="password" placeholder="Password" id="password"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>

		</div>
		<button type="submit" name="submit" class="btn">Submit</button>
<br>			<a href="register.php" id="signup" class="signup">I Don't have an account? Register!</a>
<br>			<a href="index.php" >Home Page!</a>
<p style="color: red;"><?php echo $msg; ?></p>
                </form>
</div>







</body>
</html>