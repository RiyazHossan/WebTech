<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Beneficiary</title>
</head>
<body>
    
	<h1>Page 2 [Add Beneficiary] </h1>

    <h2>Digital Wallet</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <a href="Home.php">1.Home</a>
    <a href="add-beneficiary.php">2.Add Beneficiary</a>
    <a href="transaction-history.php">3.Transaction History</a>

    <h2>Add Beneficiary:</h2>

    Beneficiary Name: <input type="text" name="bname">
    Mobile No: <input type="tel" name="mobile">

    <input type="submit" name="submit">
   </form>
   
    <?php 

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $bname = $_POST['bname'];
        $mobile = $_POST['mobile'];

            $isValid = false;

            if (empty($bname) or empty($mobile)) {
                $isValid = false;
                echo "Please fill up the form Properly";
            }
            else {
                $isValid = true;
            }
            if ($isValid) { 
            $handle1 = fopen("data.json", "a");
            $arr1 = array('bname' => $bname, 'mobile' => $mobile);
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
    <br>
    <br>
    <table border="1">

        <tbody>
            <?php 
            for ($j = 0; $j <count($arr1); $j++){
                echo "<tr>";
                echo "<td>". $arr1[$j]->bname."</td>";
                echo "<td>". $arr1[$j]->mobile."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
</body>
</html>
