<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form Action</title>
</head>
<body>

	<h1>Registration Form</h1>

<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<fieldset>
		<legend>Basic Information:</legend>
		First Name:<input type="text"name="firstname">
		<br>
		<br>
		Last Name:<input type="text"name="lastname">
		<br>
		<br>
		Gender: 
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="other">Other
		<br>
		<br>
		Date of Birth :  <input type="date" name="dob">
		<br>
		<br>
		Religion:
		<select name="religion">
			<option value="islam">Islam</option>
            <option value="hindu">Hindu</option>
            <option value="christian">Christian</option>
            <option value="buddhist">Buddhist</option>
            <option value="other">Other</option>
        </select>
	</fieldset>
	<br>
	<fieldset>
		<legend>Contact Information</legend>
		
		Present Address:
		<textarea id="pp" name="pp" rows="3" cols="40">
		</textarea>	
		<br>

		Permanent Address:
		<textarea id="pa" name="pa" rows="3" cols="40">
		</textarea>	
		<br>
		<br>
		Phone:<input type="tel" name="telephone">
		<br>
		<br>
		Email:<input type="email" name="email">
		<br>
		<br>
		Personal Website Link<input type="url" name="url">
	</fieldset>

	<fieldset>
		<legend>Account Information</legend>
		User Name:<input type="text"name="username">
		<br>
		<br>
		Password:<input type="password"name="password">
	</fieldset>
	<input type="submit" name="submit" value="Register">
    </form>

	<?php 

	$request_method = $_SERVER['REQUEST_METHOD'];

	if($request_method == "POST"){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		if(isset($_POST['gender'])){
      $gender = $_POST['gender'];
    }
    else{
      $gender = "";
    }
		$dob = $_POST['dob'];
		$religion = $_POST['religion'];
		$pp= $_POST['pp'];
		$pa = $_POST['pa'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$url = $_POST['url'];
		$username = $_POST['username'];
		$passWord= $_POST['password'];
	}
	?>

	<?php

	if (empty($firstname) or empty($lastname) or empty($gender)
      or empty($dob) or empty($religion)or empty($email)
      or empty($username) or empty($passWord)){
		echo "Fill the form Properly !!";
	}
	else{
  
  $servername = "localhost";
	$userName = "root";
	$password = "";
	$dbname = "userinfo";

	$connection = new mysqli($servername, $userName, $password, $dbname);

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	else{
		echo "Database Connection Successfull";
	}

	$sql = "INSERT INTO userinfo (FirstName, LastName, Gender, DOB, Religion, PresentA, PermanentA, Phone, Email, Website, UserName, Password) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$religion', '$pp', '$pa', '$telephone', '$email', '$url', '$username', '$passWord')";

	$res = $connection->query($sql);

	echo "<br><hr><br>";

	if ($res === true) {
		echo "Data Inserted Succssfully";
	}
	else {
		echo "Error while saving";
	}

	$connection->close();

}
	?>

  <hr>


</body>
</html>