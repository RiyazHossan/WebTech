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
		<legend>Account Information</legend>
		User Name:<input type="text"name="username">
		<br>
		<br>
		Email:<input type="email" name="email">
		<br>
		<br>
		Password:<input type="password"name="password">
	</fieldset>
	<input type="submit" name="submit" value="Register">
    </form>

	<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

	if (empty($username) or empty($password) or empty($email)){
		echo "Fill the form Properly !!";
	}
	else{
  
  $servername = "localhost";
	$userName = "root";
	$passWord = "";
	$dbname = "chatdb";

	$connection = new mysqli($servername, $userName, $passWord, $dbname);

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	else{
		echo "Database Connection Successfull";
	}

	$sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

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
   }

	?>

  <hr>
  <button onclick="window.location.href='Login.html';"> Go to Login</button>


</body>
</html>