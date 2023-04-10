<?php
// Include the database connection file
include('connection1.php');

if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {


    // Fetch state name base on country id
    $query = "SELECT * FROM province WHERE c_id = ".$_POST['countryId'];
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<option value="">Select province</option>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>'; 
        }
    } else {
        echo '<option value="">province not available</option>'; 
    }
} elseif(isset($_POST['provinceId']) && !empty($_POST['provinceId'])) {



    //Fetch districts name base on state id
    $query = "SELECT * FROM district WHERE p_id = ".$_POST['provinceId'];
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<option value="">Select district</option>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['d_id'].'">'.$row['d_name'].'</option>'; 
        }
    } else {
        echo '<option value="">district not available</option>'; 
    }
}elseif(isset($_POST['districtId']) && !empty($_POST['districtId'])) {




    // Fetch city name base on state id
    $query = "SELECT * FROM city WHERE d_id = ".$_POST['districtId'];
    $result = $conn->query($query);

    if ($result-> num_rows>0) {
       echo '<option value="">Select city</option>';   
        while ($row = $result->fetch_assoc()){
           echo '<option value="'.$row['ct_id'].'">'.$row['ct_name'].'</option>';  
        }

    }else{
        echo '<option value="">city not available</option>';
    }
}
?>