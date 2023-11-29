<div style="overflow-x: auto;">
  <table border=1>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>ID NO.</th>
      <th>Phone NO.</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
<?php
$conn=mysqli_connect("localhost","root","","billing");
if($conn)
{
 $sql="select * from users";
 $query=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_assoc($query))
 {
?>
 <tr>
      <td><?php echo $row['Firstname']; ?></td>
      <td><?php echo $row['Lastname']; ?></td>
      <td><?php echo $row['IDNO']; ?></td>
      <td><?php echo $row['Phone']; ?></td>
      <td><?php echo $row['role']; ?></td>
      <td><button>Edit</button><button>Delete</button></td>
    </tr>
<?php
 }
}
else{
    echo "There was an error in connecting to the database";
}
?>
  </table>
</div>


