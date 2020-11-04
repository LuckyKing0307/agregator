<?php
if (isset($_GET['data'])) {
  $info = json_decode($_GET['data']);
}
$curl = curl_init();
$data = array(
  'key' => 'SECRET_KEY_DEMO',
  'dateStart' => $info->reg_date,
  'period' => '12',
  'owner[name]' => 'Андрей',
  'owner[lastname]' => 'Аюбджанов',
  'owner[middlename]' => 'Жамшидов',
  'owner[birthday]' => '2000-08-10',
  'owner[document][dateIssue]' => '2020-08-10',
  'owner[document][issued]' => 'Алексинским РОВД Тульской области',
  'owner[document][number]' => '670963',
  'owner[document][series]' => '7004',
  'trailer' => '0',
  'isJuridical' => '0',
  'purpose' => 'Личная',
  'codeKladr' => '77000000000182100',
  'car[category]' => 'B',
  'car[power]' => '89',
  'car[documents][registrationNumber]'=>'М258СВ177',
  'car[documents][chassisNumber]' => '',
  'car[documents][carcaseNumber]' => '',
  'car[documents][vin]' => ''
);
if (isset($_GET['data'])) {
  // $data['dateStart']=$info->car;
  $data['car[make]']=$info->car;
  $data['car[model]']=$info->carmodel;
  $data['car[dateStart]']=$info->reg_date;
  if (isset($info->default)) {
    $data['limitDrivers'] = '1';
    for ($i=0; $i < count($info->uname); $i++) { 
      $data['usagePeriod['.$i.'][dateStart]'] = $info->reg_date;
      $data['usagePeriod['.$i.'][dateEnd]'] = '2021-10-26';
      $data['drivers['.$i.'][name]'] = $info->uname[$i];
      $data['drivers['.$i.'][lastname]'] = $info->usurname[$i];
      $data['drivers['.$i.'][middlename]'] = $info->ufathername[$i];
      $data['drivers['.$i.'][birthday]'] = $info->data[$i];
      $data['drivers['.$i.'][license][dateBeginDrive]'] = $info->stage[$i].'-08-10';
      $data['drivers['.$i.'][license][dateIssue]'] = $info->stage[$i].'-08-10';
      $data['drivers['.$i.'][license][number]'] = '77823';
      $data['drivers['.$i.'][license][series]'] = '7705';
    }
  }else{
    $data['limitDrivers'] = '0';
  }
}
// print_r($data);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://osago.ads-soft.ru/calculate/?fullInformation=false",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
));

$response = curl_exec($curl);
curl_close($curl);
getPrice($response);
// echo $response;
function getPrice($data){
	$data = json_decode($data);
	if ($data->result==1) {
		$curl = curl_init();
		$id = $data->data[0]->id;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://osago.ads-soft.ru/calculate/$id/?key=SECRET_KEY_DEMO",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		curl_close($curl);
    $array_item = array();
    if (isset(json_decode($response)->data->calculationId)) {
      $array_item['id'] = json_decode($response)->data->calculationId;
      $array_item['price'] = json_decode($response)->data->premium;
      echo json_encode($array_item);
    }else{
      echo "Нет";
    }
	}
}

