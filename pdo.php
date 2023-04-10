<?php
$db_name = "mysql:host=localhost;dbname=employee";
$username = "root";
$password = "";
$conn = new PDO($db_name, $username, $password);

$sql = $conn->query("SELECT * FROM pdo");
$result = $sql->fetchAll();

while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    echo "{$row['pid']} - {$row['name']} - {$row['contact']} - {$row['address']} - {$row['age']} <br>";
   // echo "<pre>";
   // print_r($row);
   // echo "</pre>";
}

?>