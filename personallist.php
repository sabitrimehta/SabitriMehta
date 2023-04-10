
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
        <h2>Show Employee Personal List</h2>
  	<tr>
      <th >Full Name</th>
      <th >Contact No</th>
      <th >Email</th>
      <th >Age</th>
      <th >Blood Group</th>
      <th >nationality</th>
      <th >Citizenship No</th>
      <th>Citizenship issued from</th>
      <th >Father's Name</th>
      <th >Mother's Name</th>
      <th >Spouse Name</th>
      <th >Operation</th>
    </tr>

 <?php 
       
 include'connection1.php';


 $sql="SELECT * FROM personal_details";
 $result= mysqli_query($conn,$sql);
 ?>

 <tr><?php 
 while($row=mysqli_fetch_assoc($result)){
  ?>
  <td><?php echo $row['full_name']?></td>
   <td><?php echo $row['contact_no']?></td>
    <td><?php echo $row['email']?></td>
     <td><?php echo $row['age']?></td>
      <td><?php echo $row['blood_group'] ?></td>
       <td><?php echo $row['nationality']?></td>
        <td><?php echo $row['citizenship_no']?></td>
         <td><?php echo $row['citizenship_issued_from'] ?></td>
          <td><?php echo $row['father_name']?></td>
           <td><?php echo $row['mother_name']?></td>
             <td><?php echo $row['spouse_name']?></td>
             
            <td><a type="button" href="deletepersonal.php?id=<?php echo $row['citizenship_no'];?>" onClick="return confirm('are you sure want to Delete')">Delete</a>
            <a type="button" href="updatepersonal.php?id=<?php echo $row['citizenship_no'];?>">Update</a>
          </td>
  </tr>
  <?php
   }
   ?> 

</table>

</body>
</html>
</body>
</html>










 
 