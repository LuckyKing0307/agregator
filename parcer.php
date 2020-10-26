<?php 
	require 'bd.php';
	$query = 'SELECT * FROM `car_mark`';
    $data = mysqli_query($bd,$query);
    while ($cat = mysqli_fetch_assoc($data)) {
    	$mark = $cat['mark'];
    	$id = $cat['id'];
    	$ins = "UPDATE `car` SET `mark`= '$id' WHERE mark='$mark'";
    	mysqli_query($bd,$ins);
    	echo $mark.'<br>';
    }
?>
