<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap-grid.min.css" integrity="sha512-EAgFb1TGFSRh1CCsDotrqJMqB2D+FLCOXAJTE16Ajphi73gQmfJS/LNl6AsjDqDht6Ls7Qr1KWsrJxyttEkxIA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body{margin-top:20px;
background-color:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
</style>
</head>
<body>
<div class="container">
<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","billing");
$sql = mysqli_query($conn, "SELECT * FROM billings where id='$id' and status='unpaid'");
									while($row = mysqli_fetch_array($sql)){	
?>
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Bill <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                        

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2"><?php echo $row['CompanyName']; ?></h5>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                    <p><?php echo $row['id']; ?></p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                    <p><?php echo $row['Date']; ?></p>
                                </div>
                     
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    <div class="py-2">
                        <h5 class="font-size-15">Bill Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price(Ksh)</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total(Ksh)</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>
                                        <th scope="row">01</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">Amount Spent On Water</h5>
                                            </div>
                                        </td>
                                        <td><?php echo $row['AmountWaterSpent']; ?></td>
                                        <td>1</td>
                                        <td class="text-end"><?php echo $row['AmountWaterSpent']; ?></td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row">02</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">Water Tax</h5>
                                            </div>
                                        </td>
                                        <td><?php echo $row['TotalWaterax']; ?></td>
                                        <td>1</td>
                                        <td class="text-end"><?php echo $row['TotalWaterax']; ?></td>
                                    </tr>
  <tr>
                                        <th scope="row">03</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">Total Spent On electricity</h5>
                                            </div>
                                        </td>
                                        <td><?php echo $row['ElectricityAmountSpent']; ?></td>
                                        <td>1</td>
                                        <td class="text-end"><?php echo $row['ElectricityAmountSpent']; ?></td>
                                    </tr>
 <tr>
                                        <th scope="row">04</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">Electricity Tax</h5>
                                            </div>
                                        </td>
                                        <td><?php echo $row['ElectricityTax']; ?></td>
                                        <td>1</td>
                                        <td class="text-end"><?php echo $row['ElectricityTax']; ?></td>
                                    </tr>

                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end"><?php echo $row['ElectricityAmountSpent']+ $row['AmountWaterSpent'] ?></td>
                                    </tr>
                                  
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Tax</th>
                                        <td class="border-0 text-end"><?php echo $row['TotalWaterax']+$row['ElectricityTax']; ?></td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end"><h4 class="m-0 fw-semibold"><?php echo $row['TotalAmount']; ?></h4></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
 
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</body>
</html>