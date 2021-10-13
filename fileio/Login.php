<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

	<h1>Login Form</h1>

   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "GET">
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
		$handle = fopen("data.json", "r");
		$data =fread($handle, filesize("data.json"));
		
	?>

	

	<?php 
	$explode = explode("\n", $data);
	array_pop($explode);
	
	?>

	
    <?php 
	$arr1 = array();
	for ($i =0 ;$i<count($explode); $i++) {
		$json = json_decode($explode[$i]);
		array_push($arr1, $json);
	}

	?>
	

	<?php
	if($_SERVER['REQUEST_METHOD']==="GET" and count ($_REQUEST)>0 ) {
		$flag = false;
		for($k=0; $k <count($arr1); $k++){
			if ( $_GET['username']===$arr1[$k]->username and $_GET['password']===$arr1[$k]->password )  {
				$flag = true;
			}
		}
	

	if($flag){
		header("Location: Welcome.php?username=" . $_GET['username']);
	}
	else {
		echo "Login Failed";
	}
}

?>

</body>
</html>
