<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
    
	<h1>Page 1 [Home] </h1>
   
    <h2>Digital Wallet</h2>
<?php
 


?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <a href="Home.php">1.Home</a>
    <a href="add-beneficiary.php">2.Add Beneficiary</a>
    <a href="transaction-history.php">3.Transaction History</a>
    <br>
    <h3>Fund Transfer:</h3>
    Select Category:
    <select name="category" >
			<option value="select">Select a value</option>
            <option value="send_money">Send Money</option>
            <option value="recharge">Recharge</option>
            <option value="etc">etc</option>
        </select>
    <br>
    <br>
    To:<select name="to">
			<option value="select">Select a value</option>
            <option value="this">This</option>
            <option value="that">That</option>
            <option value="other">Other</option>
        </select>
    <br>
    <br>
    Amount: <input type="number" name="amount" >
    <br>
    <br>

    
    <input type="submit" name="submit" value="Submit">
   
</form>
    <?php 

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

           $category = $_POST['category'];
           $to = $_POST['to'];
           $amount = $_POST['amount'];

            $isValid = false;

            if (empty($amount) or $category == "select" or $to ==
                "select" ) {
                $isValid = false;
                echo "Please fill up the form Properly";
            }
            else {
                $isValid = true;
            }
            if ($isValid) { 
            $handle1 = fopen("History.json", "a");
            $arr1 = array('category' => $category, 'to' => $to, 
                'amount'=> $amount);
            $encode = json_encode($arr1);

            $res = fwrite($handle1, $encode . "\n");
            if ($res) {
                   echo "File Saved Successfully "; }
             else {
                echo " Error while saving ";
             }
        }
       
    
        }

    ?>
    

</body>
</html>
