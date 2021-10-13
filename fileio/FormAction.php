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
		$isValid = false;

		if (empty($firstname)){
			$isValid = false;
		}
		if (empty($lastname)){
			$isValid = false;
		}
		if (empty($gender)){
			$isValid = false;
		}
		if (empty($dob)){
			$isValid = false;
		}
		if (empty($religion)){
			$isValid = false;
		}
		if (empty($email)){
			$isValid = false;
		}
		if (empty($username)){
			$isValid = false;
		}
		if (empty($password)){
			$isValid = false;
		}
		else{
			$isValid = true;
		}
	?>

	<?php
		if ($isValid) { 
			$handle1 = fopen("data.json", "a");
			$arr1 = array('firstname' => $firstname, 'lastname' => $lastname,'gender'=> $gender, 'dob'=> $dob, 'religion'=> $religion, 'pp'=> $pp, 'pa'=> $pa,'telephone'=> $telephone,'email'=> $email,'url'=>$url,'username'=>$username,'password'=>$password);
			$encode = json_encode($arr1);

			$res = fwrite($handle1, $encode . "\n");
		}

		if ($res) {
			echo "Information saved successully.";
		}
		else {
			echo "Error while saving.";
		}
	?>

	<hr>


</body>
</html>
