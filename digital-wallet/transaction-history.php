<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>History</title>
</head>
<body>
    
	<h1>Page 3 [Transaction History] </h1>

    <h2>Digital Wallet</h2>

    <a href="Home.php">1.Home</a>
    <a href="add-beneficiary.php">2.Add Beneficiary</a>
    <a href="transaction-history.php">3.Transaction History</a>
    <br>
    <br>
    From:<input type="datetime-local" name="from">
    To:<input type="datetime-local" name="to">

    <input type="submit" name="submit" value="Search">
<?php 
        $handle = fopen("History.json", "r");
        $data =fread($handle, filesize("History.json"));
        
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
    <h2>Total Records (<?php echo count($arr1);?>)</h2>
 
    <br>
    <br>
    <table border="1">

        <thead>
            <tr>
                <th>Transaction Category</th>
                <th>To</th>
                <th>Amount</th>
                <th>Transferred On</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            for ($j = 0; $j <count($arr1); $j++){
                echo "<tr>";
                echo "<td>". $arr1[$j]->category."</td>";
                echo "<td>". $arr1[$j]->to."</td>";
                echo "<td>". $arr1[$j]->amount."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>

</body>
</html>
