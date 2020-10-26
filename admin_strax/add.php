<?php 
require('../bd.php');
$km = $_POST['km'];
$sity_id = json_decode($_POST['sity_id'],true);

$qwery = 'SELECT * FROM strax WHERE id='.$_POST['id'];
$data = mysqli_query($bd,$qwery);
$row = mysqli_fetch_assoc($data);
$r = ',';
for ($i=0; $i <count($km) ; $i++) {
	$s = $km[$i];
	$r.=$s.',';
	if (!empty($sity_id[$s])) {
	}
	else{
		$sity_id[$s]=0;
	}
}

$item = json_encode($sity_id);
$qwery_strax = "UPDATE `strax` SET sities='$r',sity_tb='$item' WHERE id=".$_POST['id'];
$data_strax = mysqli_query($bd,$qwery_strax);
header('Location: index.php?id='.$_POST['id']);
?>