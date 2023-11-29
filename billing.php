<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
//error_reporting(0);
include_once("config.php");
if(isset($_POST['Bill']))
{
$cname=$_POST['user'];
$_SESSION['cname']=$cname;
$TotalAmount=$_POST['TotalAmount'];
$TotalSpentWater=$_POST['TotalSpentWater']; 
$wtax=$_POST['TotalTaxWater'];
$TotalWater=$_POST['TotalWater'];
$TotalSpentElectricity=$_POST['TotalSpentElectricity'];
$etax=$_POST['TotalTaxElectricity'];
$TotalElectricity=$_POST['TotalElectricity'];
$sql="INSERT INTO  billings(CompanyName,AmountWaterSpent,TotalWaterax,TotalWaterAmount,ElectricityAmountSpent,ElectricityTax,TotalAmountElectricity,TotalAmount)
 VALUES(:CompanyName,:AmountWaterSpent,:TotalWaterax,:TotalWaterAmount,:ElectricityAmountSpent,:ElectricityTax,:TotalAmountElectricity,:TotalAmount)";
$query = $dbh->prepare($sql);
$query->bindParam(':CompanyName',$cname,PDO::PARAM_STR);
$query->bindParam(':AmountWaterSpent',$TotalSpentWater,PDO::PARAM_INT);
$query->bindParam(':TotalWaterax',$wtax,PDO::PARAM_INT);
$query->bindParam(':TotalWaterAmount',$TotalWater,PDO::PARAM_INT);
$query->bindParam(':ElectricityAmountSpent',$TotalSpentElectricity,PDO::PARAM_INT);
$query->bindParam(':ElectricityTax',$etax,PDO::PARAM_INT);
$query->bindParam(':TotalAmountElectricity',$TotalElectricity,PDO::PARAM_INT);
$query->bindParam(':TotalAmount',$TotalAmount,PDO::PARAM_INT);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
?>
<script>
 $.ajax({
                          url:'mail.php',
                          type: "POST",
                          data:{cname:'cname'},
                          success: function(data)
                          {
                            alert("Bill notification email sent to the billed user."); // show response from the php script.
                          }
                        });   
</script>
<?php
echo "<script>alert('Billing Successfull. Confirmation sent to user email');</script>";

}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
  function calculate()
  {var ws=$("#ws").val();
    var tax=20/100*ws;
    $("#wt").val(tax);
    var total=Number(ws)+Number(tax);
    $("#watertotal").val(total);
    var es=$("#es").val();
    var etax=20/100*es;
    $("#et").val(etax);
    var etotal=Number(es)+Number(etax);
    $("#electricitytotal").val(etotal);
    var totalamount=etotal+total;
    $("#TA").val(totalamount);
    $("#btnsubmit").attr("disabled", false);
  }
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/banner.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Generate Bills</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
<div class="form-group">
                 <select class="form-control" name="user">
<option>Select user to bill</option>
<?php
$conn=mysqli_connect("localhost","root","","billing");
if($conn)
{
$check="select * from users where role='user'";
$checkquery=mysqli_query($conn,$check);
while($row=mysqli_fetch_assoc($checkquery))
{
$_SESSION['mail']=$row['username'];
echo "<option>".$row['Firstname']."</option>";
}
}
else{
echo "<option>There is connection error</option>";
}
?>
</select>
 </div>
<div class="water" style="border:3px solid black">
<h3>Water Billing</h3>                
<div class="form-group">
                  <input type="Number" class="form-control" name="TotalSpentWater" id="ws" placeholder="Amount Spent" required="required">
                </div>
                      <div class="form-group">
                  <input type="Number" class="form-control" id="wt" name="TotalTaxWater" placeholder="Water Tax" maxlength="10" required="required" readonly>
                </div>
                <div class="form-group">
                  <input type="Number" class="form-control" id="watertotal" name="TotalWater" id="emailid" onBlur="checkAvailability()" placeholder="Total Amount" required="required" readonly>
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                </div>
<div class="water" style="border:3px solid black">
<h3>Electricity Billing</h3>                
<div class="form-group">
                  <input type="Number" class="form-control" id="es" name="TotalSpentElectricity" placeholder="Amount Spent" required="required">
                </div>
                      <div class="form-group">
                  <input type="Number" class="form-control" name="TotalTaxElectricity" id="et" placeholder="Electricity Tax" maxlength="10" required="required" readonly>
                </div>
                <div class="form-group">
                  <input type="Number" class="form-control" name="TotalElectricity" id="electricitytotal" onBlur="checkAvailability()" placeholder="Total Amount" required="required" readonly>
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                </div>
<div class="form-group">
                  <input type="Number" class="form-control" name="TotalAmount" id="TA" onBlur="checkAvailability()" placeholder="Total Amount" required="required" readonly>
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
<div class="form-group">
  
                  <input type="submit" value="Bill" name="Bill" id="btnsubmit" class="btn btn-block" disabled>
                </div>
              </form>
            </div>
            <button id="calculate" class="btn btn-block" onclick="calculate()">Calculate</button>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
      </div>
    </div>
  </div>
</div>