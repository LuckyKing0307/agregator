<?php 
require('../bd.php');
    $query = "SELECT * FROM `master_key` WHERE id=1";
    $data = mysqli_query($bd,$query);
    $row = mysqli_fetch_assoc($data);
	echo $row['master_key'];
?>