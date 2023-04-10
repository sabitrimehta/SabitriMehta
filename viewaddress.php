


<!DOCTYPE html>
<html>
<head>
  <title>Show Employee Details</title>
  <style>
    body {
      background-image: url('stone.jpg');
      background-repeat: no-repeat;
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
<body>
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
    <h2>Show Employee Address List</h2>
  	<tr>
      <th >Id</th>
      <th >Address Type</th>
      <th >Country Name</th>
      <th >Province Name</th>
      <th >District Name</th>
      <th >City Name</th>
      <th >Ward no</th>
      <th >Tole</th>
      <th>Operation</th>
    </tr>
    <?php  include("connection1.php");?>

    <?php 
     
  
      
     $sql = mysqli_query ($conn, "SELECT address.*,country.c_name,district.d_name,province.p_name,city.ct_name
     FROM address join country on address.c_id=country.c_id join district on address.d_id=district.d_id 
    join province on address.p_id=province.p_id join city on address.ct_id=city.ct_id ");

    ?>
 <tr>
 	<?php 
 while($row=mysqli_fetch_assoc($sql)){
  ?>
  <td><?php echo $row['add_id']?></td>
   <td><?php echo $row['add_type']?></td>
     <td><?php echo $row['c_name']?></td>
      <td><?php echo $row['p_name'] ?></td>
       <td><?php echo $row['d_name']?></td>
        <td><?php echo $row['ct_name']?></td>
         <td><?php echo $row['ward_no'] ?></td>
           <td><?php echo $row['tole'] ?></td>

         <td><a type="button" href="deleteaddress.php?id=<?php echo $row['add_id'];?>" onClick="return confirm('are you sure want to Delete')">Delete</a>
          <a type="button" href="updateaddress.php?id=<?php echo $row['add_id'];?>">Update</a></td>
  </tr>
  <?php
   }
   ?> 

</table>
        
</body>
</html>
</body>
</html>











 
 