



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Details</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>


	<table border="1" cellpadding="0">
    <h2>Show Employee List</h2>
  	<tr>
      <th >S.No</th>
      <th >First Name</th>
      <th >Middle Name</th>
      <th >Last Name</th>
      <th >Gender</th>
      <th >Contact</th>
      <th >Email</th>
      <th >Department</th>
      <th>Operation</th>
    </tr>
        <?php 
       
 include'connection1.php';


 $sql="SELECT * FROM employee_details";
 $result=mysqli_query($conn,$sql);
 ?>

 <tr><?php 
 while($row=mysqli_fetch_assoc($result)){
  ?>
  <td><?php echo $row['e_id']?></td>
   <td><?php echo $row['first_name']?></td>
    <td><?php echo $row['middle_name']?></td>
     <td><?php echo $row['last_name']?></td>
      <td><?php echo $row['gender'] ?></td>
       <td><?php echo $row['contact']?></td>
        <td><?php echo $row['email']?></td>
         <td><?php echo $row['department'] ?></td>
         <td><a type="button" href="deleteemployee.php?id=<?php echo $row['e_id'];?>" onClick="return confirm('are you sure want to Delete')">Delete</a>
          <a type="button" href="updateemployee.php?id=<?php echo $row['e_id'];?>">Update</a></td>
         
  </tr>
  <?php
   }
   ?> 

</table>
 <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>

</body>
</html>










 
 