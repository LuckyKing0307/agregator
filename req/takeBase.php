<?php 
require '../bd.php';


	function takeBase(){
		global $bd;
		$arr = array();
		$query = 'SELECT * FROM `car_mark`';
	    $data = mysqli_query($bd,$query);
	    while ($cat = mysqli_fetch_assoc($data)) {
	    	$mark = $cat['mark'];
	    	$id = $cat['id'];
	    	$arr[count($arr)] = [$id,$mark];
	    }
	    return json_encode($arr);
	}
	function takeBaseList($mark){
		global $bd;
		$arr = array();
		$query = "SELECT * FROM `car_mark` WHERE mark LIKE '%$mark%'";
	    $data = mysqli_query($bd,$query);
	    while ($cat = mysqli_fetch_assoc($data)) {
	    	$mark = $cat['mark'];
	    	$id = $cat['id'];
	    	$arr[count($arr)] = [$id,$mark];
	    }
	    return json_encode($arr);
	}
	function takeCarList($mark){
		global $bd;
		$arr = array();
		$query = "SELECT * FROM `car` WHERE mark= $mark";
	    $data = mysqli_query($bd,$query);
	    while ($cat = mysqli_fetch_assoc($data)) {
	    	$mark = $cat['model'];
	    	$id = $cat['id'];
	    	$arr[count($arr)] = [$id,$mark];
	    }
	    return json_encode($arr);
	}
	function takeCar($mark,$car){
		global $bd;
		$arr = array();
		$query = "SELECT * FROM `car` WHERE mark = '$mark' AND model LIKE '%$car%'";
	    $data = mysqli_query($bd,$query);
	    while ($cat = mysqli_fetch_assoc($data)) {
	    	$mark = $cat['model'];
	    	$id = $cat['id'];
	    	$arr[count($arr)] = [$id,$mark];
	    }
	    return json_encode($arr);
	}
	// function takeBaseList($mark){
	// 	global $bd;
	// 	$arr = array();
	// 	$query = "SELECT * FROM `car_mark` WHERE mark LIKE '%$mark%'";
	//     $data = mysqli_query($bd,$query);
	//     while ($cat = mysqli_fetch_assoc($data)) {
	//     	$mark = $cat['mark'];
	//     	$id = $cat['id'];
	//     	$arr[count($arr)] = [$id,$mark];
	//     }
	//     return json_encode($arr);
	// }
	if (isset($_GET['mark'])) {
		echo takeBaseList($_GET['mark']);
	}
	if (isset($_GET['car'])) {
		echo takeCarList($_GET['car']);
	}
	if (isset($_GET['search'])) {
		echo takeCar($_GET['search'],$_GET['car_list']);
	}
	if (count($_GET)==0) {
		echo takeBase();
	}
?>