<?php
session_start();
$conn=mysqli_connect("localhost","root","","billing");
$success=false;
$currentusername=$_SESSION['login'];
$username = $_POST['username'];
$password = $_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$idno=$_POST['idno'];
$phone=$_POST['phone'];
$sql="insert into users(Firstname,Lastname,IDNO,Phone,username,password,role) values('$fname','$lname','$idno','$phone','$username','$password','user')";
$result = mysqli_query($conn,$sql);
echo $username,$password,$fname,$lname,$idno;
if($result)
{
    include("../logout.php");
?>
<script>
    location.replace("../index.php?success=1");
</script>
<?php
}
else{
    echo "Error";
}
?>