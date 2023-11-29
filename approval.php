<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:grey;font-size:30px">
<center>
<div style="border:3px solid black;border-radius:30px;width:50%;text-align:center;height:100px">
<?php 
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","billing");
$sql = mysqli_query($conn, "update bookings set approval=1,status='confirmed' where id='$id'");
if($sql)
{
    echo "&check; Successful";
       echo "<script>
                                $.ajax({
                                    type:'post',
                                    url:'mail.php',
                                    data:{id:'$id'},
                                    success:function(resp)
                                    {
                                        
                                    }
                                })
                            </script>";
                            header( "refresh:5;url=receptionist.php?success=successful && page=bookings" );
}
else
{
    echo "Failed";
    header("location:receptionist.php?page=bookings");
}
?>
</div>
</center>
</body>
</html>