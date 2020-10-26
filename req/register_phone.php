<?php 
function generateRandomPass($length = 10) {
    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_GET['ph'])) {
	$arr = array();
	$mass = generateRandomPass(4);
	$str = file_get_contents('https://smsc.ru/sys/send.php?login=goldpreis&psw=NwAT@5jjgTA@2cQ&phones='.$_GET['ph'].'&mes='.$mass);
	if (explode(' ', $str)[0]=='OK') {
		$arr['status'] = 'OK';
		$arr['code'] = $mass;
		echo json_encode($arr);
	}else{
		$arr['status'] = 'Error';
		$arr['code'] = $mass;
		echo json_encode($arr);
	}
}

// goldpreis
// NwAT@5jjgTA@2cQ
?>