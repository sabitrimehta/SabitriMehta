
<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X_UA_compatible" content="ie=edge">
	<title>navigation</title>
	<style>
		.body{
			font-family: montserrat;

		}
		.navbar{
			background: #0082e6;
			border-radius: 30px;
			height: 60px;
			width: 100%
		}
		.navbar ul{
			overflow: auto;
		}
		.navbar li{
			float: left;
			list-style: none;
			margin: 13px 20px;


		}
		.navbar li a{
			padding:3px 3px;
			text-decoration: none;
			color: white;
		}
		.navbar li a:hover{
			color: red;
		}
		.search{
			float: right;
			color: white;
			padding:12px 75px;
		}
		.navbar input{
			border:2px solid black;
			border-radius: 14px;
			padding:3px 17px;
			width: 139px;

		}
		
	</style>
</head>
<body>
	<header>
		
		
		<nav class="navbar">
			<ul>
				<li><a href="navbar.php">Employee Details</a></li>
				<li><a href="address.php">Employee Address</a></li>
				<li><a href="academic.php">Employee Academic</a></li>
				<li><a href="department.php">Employee Department</a></li>
				<li><a href="personal_details.php">Employee Personal Details</a></li>
				<div class="search">
					<input type="text" name="search" id="search" placeholder="Search">
					
				</div>
			</ul>
			<div class="image">
			<img src="employee.jpg"  style="  height: 100%; width: 100%;">
			</div>
		</nav>
	</header>
	<?php
include("connection1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>


<body>
	<div class="center">

		<form action="#" method="POST">

		<h1>Employee Address</h1>
		<div class="form">
			

			<select class="textfield" name="add_type" required>
				<option value=""></option>
				<option value="permanent">Permanent</option>
				<option value="temporary">Temporary</option>
			</select>
<?php 
	$country_res = mysqli_query($conn, "SELECT * FROM country");
?>
			<select class="textfield" name="country" id="country" required>
				 <option value=""></option>
				<?php while($country= mysqli_fetch_array($country_res)){?>
					<option value="<?php echo $country['c_id'];?>"><?php echo $country['c_name'];?></option>
			    <?php }?> 

			</select>

			

			<select class="textfield" name="province" id="province" required>
				<option value=""></option>
				
			</select>

			<select class="textfield" name="district" id="district" required>
				<option value=""></option>
				

			</select>
   
			<select class="textfield" name="city" id="city" required>
				<option value=""></option>
				
			</select>

			<input type="text" name="ward" class="textfield" placeholder="ward_no"required>

			<input type="text" name="tole" class="textfield" placeholder="Tole Name" required>

			<input type="submit" name="next" value="next" name="" class="btn">

			
			
		</div>
		</form>

		
	</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
      // Country dependent ajax
      $("#country").on("change",function(){
        var countryId =$(this).val();
        $.ajax({
          url :"ajax.php",
          type:"POST",
          data:{countryId:countryId},
          success:function(data){
          	console.log(data);
          	$('select[name= "province"]').empty();
          	

          
            $("#province").html(data);
            // $('#district').html('<option value="">Select district</option>');
          }
        });     
      });

     // province dependent ajax
      $("#province").on("change", function(){
        var provinceId = $(this).val();
        $.ajax({
          url :"ajax.php",
          type:"POST",
          data:{provinceId:provinceId},
          success:function(data){
          	console.log(data);
            $('select[name= "district"]').empty();
            $("#district").html(data);
            // $("#city").html('<option value ="">Select city</option>');
          }
        });
      });

       //city dependent ajax
      $("#district").on("change", function(){
        var districtId = $(this).val();
        $.ajax({
          url :"ajax.php",
          type:"POST",
          data:{districtId:districtId},
          success:function(data){
          	$('select[name= "city"]').empty();
            $("#city").html(data);
           
          }
        });
      });
    });	
</script>

</body>
</html>




<?php
include "connection1.php";
if(isset($_POST['next'])){
    $e_id      = $_SESSION["employee_id"];
	$addtype   = $_POST['add_type'];
	$country   = $_POST['country'];
    $province  = $_POST['province'];
	$district  =$_POST['district'];
    $city      =$_POST['city'];
    $ward      =$_POST['ward'];
    $tole      =$_POST['tole'];

	 $query = "INSERT INTO address (e_id, add_type, c_id,p_id, d_id,ct_id,ward_no,tole)
  VALUES ($e_id, '$addtype',$country, $province, $district, $city, $ward, '$tole')";

  $data = mysqli_query($conn, $query);
      
     if ($data) {
		echo "Data inserted into Database";
	}

	 else{
	 echo "failed to save data";
	}

}
?>

</body>
</html>

