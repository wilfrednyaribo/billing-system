<?php
session_destroy();
if(isset($_SESSION['login']))
{

}
else
{
   echo "<script>location.replace('index.php');</script>";
}
?>