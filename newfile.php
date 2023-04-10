<?php
include("connection1.php");
$id = $_GET['id'];
$employee = mysqli_query($conn,"DELETE * FROM employee_details WHERE e_id=$id");
header('Refresh:1; url = list.php');





<?php
include("connection1.php");
$e_id = $_GET['id'];
$employee = mysqli_query($conn,"DELETE  FROM employee_details WHERE id = $e_id");
header('Refresh:1; url = list.php');
?>




<?php
// Step 1: Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Retrieve the record you want to delete from the database
$id = $_GET['id'];

// Step 3: Use a SQL DELETE statement to remove the record from the database
$sql = "DELETE FROM personal_details WHERE e_id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

// Step 4: Redirect the user to the appropriate page
header("Location: personallist.php");
exit();

// Close the database connection
mysqli_close($conn);
?>





<?php
// Check if the update button was clicked
if(isset($_POST['update'])){
    // Connect to database
    $host = 'localhost';
    $username = 'your_username';
    $password = 'your_password';
    $dbname = 'your_database_name';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    // Get the updated values from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Update the record in the database
    $sql = "UPDATE your_table_name SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    mysqli_query($conn, $sql);
    
    // Close database connection
    mysqli_close($conn);
    
    // Redirect to the previous page
    header("Location: previous_page.php");
    exit();
}
?>


<?php
// Check if the delete button was clicked
if(isset($_POST['delete'])){
    // Connect to database
    $host = 'localhost';
    $username = 'your_username';
    $password = 'your_password';
    $dbname = 'your_database_name';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    // Get the ID of the record to delete
    $id = $_POST['id'];
    
    // Delete the record from the database
    $sql = "DELETE FROM your_table_name WHERE id = $id";
    mysqli_query($conn, $sql);
    
    // Close database connection
    mysqli_close($conn);
    
    // Redirect to the previous page
    header("Location: previous_page.php");
    exit();
}
?>





<?php
// establish database connection
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get data from database
$sql = "SELECT * FROM yourtablename";
$result = mysqli_query($conn, $sql);

// display data in table format
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// close database connection
mysqli_close($conn);
?>
