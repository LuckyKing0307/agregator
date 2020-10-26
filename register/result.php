<?php  
require('../bd.php');
$car= array();
$user= array();
$user_car= array();
$info= array();
	if ($_FILES['img']['name']=='') {
            $query = "SELECT * FROM `user` WHERE id=".$_COOKIE['id'];
            $data = mysqli_query($bd,$query);
            $row = mysqli_fetch_assoc($data);
            $user1 = json_decode( $row['user'],true);
            if ($user1['img']) {
				$user['img']=$user1['img'];
            }
	}
	elseif(isset($_FILES['img'])) {
		$filename= $_FILES['img']['name'];
		$filesize= $_FILES['img']['size'];
		$file_ext = strtolower(end(explode('.',$filename)));
		move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$filename);
		$user['img']=$filename;
	}
$car['car_number'] = $_POST['car_number'];
$car['car'] = $_POST['car'];
$car['carmodel'] = $_POST['carmodel'];
$car['year'] = $_POST['year'];
$car['car_type'] = $_POST['car_type'];
$car['vin'] = $_POST['vin'];
$car['ctc'] = $_POST['ctc'];
$car['vin_type'] = $_POST['vin_type'];
$car['sts_type'] = $_POST['sts_type'];
$car_js = json_encode($car,JSON_UNESCAPED_UNICODE);

$user['surname'] = $_POST['surname'];
$user['name'] = $_POST['name'];
$user['fathername'] = $_POST['fathername'];
// $user['birthday'] = $_POST['birthday'];
$user['passport'] = $_POST['passport'];
$user['passport_date'] = $_POST['passport_date'];
$user['passport_place'] = $_POST['passport_place'];
$user['vu'] = $_POST['vu'];
$user['date_vu'] = $_POST['date_vu'];
$user['register'] = $_POST['register'];
$user['check_img'] = $_POST['check_img'];

if (isset($_POST['check_img'])) {
	$user['check_img'] = 1;
}else{
	$user['check_img'] = 0;
}
if (isset($_POST['agent_check'])) {
	$user['agent_check'] = 1;
}else{
	$user['agent_check'] = 0;
}
if (isset($_POST['me1'])) {
	$user['default'] = 1;
}else{
	$user['default'] = 0;
}

$user_js = json_encode($user,JSON_UNESCAPED_UNICODE);

$user_car['surname'] = $_POST['user_surname'];
$user_car['name'] = $_POST['user_name'];
$user_car['fathername'] = $_POST['user_fathername'];
// $user_car['birthday'] = $_POST['user_birthday'];
$user_car['passport'] = $_POST['user_passport'];
$user_car['passport_date'] = $_POST['user_passport_date'];
$user_car['passport_place'] = $_POST['user_passport_place'];
$user_car['vu'] = $_POST['user_vu'];
$user_car['date_vu'] = $_POST['user_date_vu'];
$user_car['register'] = $_POST['user_register'];

$user_car_js = json_encode($user_car,JSON_UNESCAPED_UNICODE);
$role = 0;

// $info['uname'] = $_POST['uname'];
// $info['usurname'] = $_POST['usurname'];
// $info['ufathername'] = $_POST['ufathername'];
// $info['stage'] = $_POST['stage'];
// $info['data'] = $_POST['data'];
// $info['uvu'] = $_POST['uvu'];
$info_js = json_encode($info);



$phone = $_POST['phone'];
$email = $_POST['email'];
if ($_POST['pass']==$row['password']) {
	$pass=$_POST['newpass'];
}else{
	$pass=$row['password'];
}
$a_name = $_POST['a_name'];
$a_surname = $_POST['a_surname'];
$a_fathername = $_POST['a_fathername'];
echo (`username `.$a_name.`role `.$role.`surname `.$a_surname.`fathername `.$a_fathername. `car `.$car_js.`user `.$user_js.`user_car `.$user_car_js.`all_users `.$info_js.`phone `.$phone.`email `.$email.`password `.$pass);
$query_s = "UPDATE `user` SET `name`='$a_name',`role`='$role',`surname`='$a_surname',`fathername`='$a_fathername', `car`='$car_js',`user`='$user_js',`user_car`='$user_car_js',`all_users`='$info_js',`phone`='$phone',`email`='$email',`password`='$pass' WHERE id=".$_COOKIE['id'];
$data_s = mysqli_query($bd,$query_s);
header('Location: login.php')

?>