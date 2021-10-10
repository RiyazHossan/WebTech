<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Action</title>
</head>
<body>

	<h1>Form Action</h1>


	<?php 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$religion = $_POST['religion'];
		$pp= $_POST['pp'];
		$pa = $_POST['pa'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$url = $_POST['url'];
		$username = $_POST['username'];
		$password= $_POST['password'];
	?>

	<hr>

	<p> Retrieved values: 
	</p>

	First Name: <?php echo $firstname; ?>
	<br>
	Last Name: <?php echo $lastname; ?>
	<br>
	Gender: <?php echo $gender; ?>
	<br>
	Date of Birth: <?php echo $dob; ?>
	<br>
	Religion : <?php echo $religion; ?>
	<br>
	Present Address: <?php echo $pp; ?>
	<br>
	Parmanent Address: <?php echo $pa; ?>
	<br>
	Telephone: <?php echo $telephone; ?>
	<br>
	Email : <?php echo $email; ?>
	<br>
	Website : <?php echo $url; ?>
	<br>
	User Name: <?php echo $username; ?>
	<br>
	Password : <?php echo $password; ?>


	<hr>

	<p>Validate data: 
		
	</p>

	<?php
		
		if (empty($firstname)){
			echo "First name is empty <br>"; 
		}
		if (empty($lastname)){
			echo "Last Name is empty <br>"; 
		}
		if (empty($gender)){
			echo "Gender is empty <br>"; 
		}
		if (empty($dob)){
			echo "Date of Birth is empty <br>"; 
		}
		if (empty($pp)){
			echo "Present Address is empty <br>"; 
		}
		if (empty($pa)){
			echo "Permanent Address is empty <br>"; 
		}
		if (empty($telephone)){
			echo "Telephone is empty <br>"; 
		}
		if (empty($email)){
			echo "Email is empty <br>"; 
		}
		if (empty($url)){
			echo "Website is empty <br>"; 
		}
		if (empty($username)){
			echo "User Name is empty <br>"; 
		}
		if (empty($password)){
			echo "Password is empty <br>"; 
		}
	?>

	<hr>

</body>
</html>
