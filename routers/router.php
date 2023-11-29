<?php
session_start();
$conn=mysqli_connect("localhost","root","","vms");
$success=false;
$currentusername=$_SESSION['login'];
$username = $_POST['username'];
$password = $_POST['password'];
$currentpassword=$_POST['currentpassword'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$idno=$_POST['idno'];
$phone=$_POST['phone'];
$result = mysqli_query($conn, "UPDATE users set password='$password',username='$username',Firstname='$fname',Lastname='$lname',IDNO='$idno',Phone='$phone' WHERE username='$currentusername' AND password='$currentpassword'");

if($result)
{
    include("../logout.php");
header("location:../index.php");
}
else{
    echo "Error";
}
?>