<?php 
$con = mysqli_connect("localhost","root","12345","php01");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
?>