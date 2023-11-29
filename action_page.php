<?php
    session_start();
$username=$_POST['uname'];
$password=$_POST['psw'];
$userrole=$_POST['role'];
$connection=mysqli_connect("localhost","root","","billing");
$sqlstmt="select * from users where username='$username'and password='$password' and role='$userrole'";
$query=mysqli_query($connection,$sqlstmt);
$row=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
if($count==1)
{
    $_SESSION['cname']=$row['Firstname'];
    $_SESSION['login']=$username;
    $_SESSION['role']=$userrole;
    echo "<script>location.replace('".$userrole.".php');</script>";
}
else
{
    header("location:index.php?error=Wrong password or username");
}
?>