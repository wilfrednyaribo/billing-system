<!DOCTYPE html>
<html>
    <head><title>Billing Management System</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <div class="header">
        <h1><img src="images/billing.webp" width="170" height="155" align="middle" style="border-radius:90px">Billing Management System</h1>
        <div class="nav">
            <ul>
                <li class="active"><a href="index.php?page=Home">Home</a></li>
                <li><a href="index.php?page=AboutUs">About </a></li>
                <li><a style="cursor:pointer" onclick="document.getElementById('id01').style.display='block'">Login</a> </li>
                <li><a href="index.php?page=contact">Contact Us</a></li>
</ul>
</div>
</div>

<br><br><br>
<div class="content">
<?php
if(isset($_GET['error']))
{
$error=$_GET['error'];
if($error != null)
{
  ?>
<script>
  alert('Wrong username or password. Try again or create new account');
</script>
  <?php
}
else{
  
}
if(isset($_GET['success']))
{
$success=$_GET['success'];
if($success==1)
{
  ?>
<script>
  alert('Signup successfull');
</script>
  <?php
}
else{
  
}
}
}
if(isset($_GET['page']))
{
    $page=$_GET['page'];
}
else{
    $page="Home";
}
include($page.".php");
?>
</div>
<script>
var slidePosition = 0;
SlideShow();

function SlideShow() {
  var i;
  var slides = document.getElementsByClassName("Containers");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slidePosition++;
  if (slidePosition > slides.length) {slidePosition = 1}
  slides[slidePosition-1].style.display = "block";
  setTimeout(SlideShow, 3500); // Change image every 2 seconds
} 
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="POST" action="action_page.php" style="background-color:grey">
    <div class="imgcontainer">
      <center><img src="images/avatar.png" alt="Avatar" class="avatar" width="200" height="200"></center>
    </div>

    <div class="container"><br>
        <label for="uname"><b>Login as:</b></label>
        <select name="role">
            <option value="admin">Admin<option>
            <option value="user">User<option>
            </select></br>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required style="width:50%"><br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required style="width:50%"><br>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="signup.php">password?</a></span><br>
      <span class="psw">Signup<a href="signup.php">Here</a></span>
    </div>
  </form>
</div>
    <div class="footer">
    <ul>
                <li class="active"><a href="">Home</a></li>
                <li><a href="">About </a></li>
                <li><a href="">Login</a></li>
                <li><a href="">Contact Us</a></li>
</ul>

<center>copyright &copy 2023</center>
</div>
</body>