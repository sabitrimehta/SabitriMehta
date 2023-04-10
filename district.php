 <?php
 include'connection1.php';
 $sql = "SELECT * FROM district
 WHERE p_id LIKE '%".$_GET['id']."%'"; 


 $result = mysqli_query($conn,$sql);


 $json = [];
 while($row = $result->fetch_assoc()){
  $json[$row['d_id']] = $row['d_name'];
}


echo json_encode($json);
?> 