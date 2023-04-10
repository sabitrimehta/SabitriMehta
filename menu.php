


<!DOCTYPE html>
<html>
<head>
  <title>Show Employee Details</title>
   <link rel="stylesheet" type="text/css" href="style3.css">
  <style>
    body {
/*    background-image: url('stone.jpg');
*/     background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    nav {
      background-color: rgba(0, 0, 0, 0.5);
      height: 60px;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
    }
      h2 {
      margin-bottom: 600px;
      margin-right: -228px;
    }
       h2 header {
        text-align:center;
      margin-bottom: 600px;
      margin-right: -228px;
    }
    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }
    nav li {
      margin: 0 20px;
    }
    nav a {
      color: #fff;
      font-size: 18px;
      text-decoration: none;
      padding: 10px;
      transition: all 0.3s ease;
    }
    nav a:hover {
      background-color: #fff;
      color: #333;
      border-radius: 5px;
    }
  </style>
</head>
 <header>
  <nav>
    <ul>
      <li><a href="menu.php">Employeeview</a></li>
      <li><a href="viewaddress.php">Addressview</a></li>
      <li><a href="academicview.php">Academiview</a></li>
      <li><a href="viewdepartment.php">Departmentview</a></li>
      <li><a href="personallist.php">Personalview</a></li>
    </ul>
  </nav>
  
</header>
<form class="example" action="" method="POST">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit" name="submit"><i class="fa fa-search"></i>Search</button>
<body>

<h2 class="header">Show Employee List</h2>


  <table border="1" cellpadding="0">
    
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

 <?php include'connection1.php';

 $sql= mysqli_query($conn,"SELECT * FROM employee_details ");
?>

 <tr><?php 
 while($row=mysqli_fetch_assoc($sql)){
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
</form>
</body>
</html>
