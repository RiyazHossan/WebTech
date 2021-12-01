<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

	<h1>Login Form</h1>

   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
	<fieldset>
		User Name:<input type="text"name="username">
		<br>
		<br>
		Password:<input type="password"name="password">
	</fieldset>

<br>
<br>
	<input type="submit" name="submit" value="LOGIN">
	
   </form>

   <?php 
    $servername = "localhost";
	$userName = "root";
	$password = "";
	$dbname = "chatdb";

	$connection = new mysqli($servername, $userName, $password, $dbname);

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	?>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
	$flag =false;

	$sql = "SELECT * FROM user";
    
    $data = $connection->query($sql);


if ( $data->num_rows > 0) {
		while ($row = $data->fetch_assoc()) {
			if ( $_POST['username']===$row["username"] and $_POST['password']===$row["password"])  {
				$flag =true;
			}

		}
	} 
	if($flag){
		header("Location: Home.php?username=" . $_POST['username']);
	}
	else {
		echo "Login Failed";
	}

}
    $connection->close();
?>

</body>
</html>