<?php
function open_Con(){
    $host="localhost"; // server name
$user="root"; // username
$password="data"; // password
$database="gooshop"; // database name you need to access
$connect=  mysqli_connect($host, $user, $password, $database);// open the connection
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    }

    return $connect ;

}
function close_Con(){
    mysqli_close(open_Con());
}

?>
