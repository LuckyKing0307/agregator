<?php 
// Логин: Алгоритм
// Пароль: Алго1429ритм!
// Appid: 3024911
// Сервер: https://proxy.euro-ins.ru/soap?wsdl
$login1 = "Алгоритм";
$pass1 = "Алго1429ритм!";
	class XmlHelper
	{
	    public static function MakeRequestXml($appId, $reqName, $paramsText, $sid = null)
	    {
	        $doc = new DOMDocument('1.0', 'utf-8');
	        $data = $doc->createElement('data');
	        $request = $doc->createElement('request');
	        $ch = $request->appendChild($doc->createElement('RequestIp'));
	        $ch->appendChild($doc->createTextNode('127.0.0.1'));
	        $ch = $request->appendChild($doc->createElement('AppId'));
	        $ch->appendChild($doc->createTextNode($appId));
	        $ch = $request->appendChild($doc->createElement('reqName'));
	        $ch->appendChild($doc->createTextNode($reqName));
	        $pt = $doc->createDocumentFragment();
	        $pt->appendXML($paramsText);
	        $request->appendChild($pt);
	        $data->appendChild($request);
	        $doc->appendChild($data);
	        if (isset($sid)) {
	            $ch = $doc->getElementsByTagName('params')->item( 0)->insertbefore($doc->createElement('Sid'));
	            $ch->appendChild($doc->createTextNode($sid));
	        }
	        $doc->normalizeDocument();
	        return $doc->saveXML();
	    }
		public static function GetErrorFromXml($data)
		{
		        if(isset($data)){
		                $doc = new DOMDocument();
		                $doc->loadXML($data->ExecProcResult->any);
		                $error=$doc->getElementsByTagName('error')->item( 0);
		                if ($error instanceof DOMNode) $error=$error->getElementsByTagName('text')->item( 0);
		                if (isset($error)) return $error->nodeValue;
		        }
		        return null;
		}

		}
	function MakeSvcClient ($urlstr)
	{
	    ini_set('soap.wsdl_cache_enabled', '0');
		ini_set('soap.wsdl_cache_ttl', '0');
		ini_set('default_socket_timeout',820);
		
	    $client = new SoapClient($urlstr."?wsdl", array('soap_version' => SOAP_1_2,'trace' => 1,"location" => $urlstr));
	    // $client = $urlstr;
	    return $client;
	}
	function ExecuteSvcProc($appId, $procName, $paramsXml, $sid)
	{
		$arr = array();
	    $xh = new XmlHelper();
	    global $SvcURL;
		    $reqString=$xh->MakeRequestXml(
		        $appId,
		        $procName,
		        $paramsXml,
		        $sid);
		    $svc=MakeSvcClient($SvcURL); /*$SvcURL - Urlустановленноговеб-сервиса »ј—*/
		    $parameters = array('pData' => $reqString);
		    $result=$svc->ExecProc($parameters);
		    $error=$xh->GetErrorFromXml($result);
		    if (isset($error))
		     return $error;
			$tag= new DOMDocument();
		    libxml_use_internal_errors(true);
			$tag->loadHTML($result->ExecProcResult->any);
			foreach ($tag->getElementsByTagName("calcisn") as $element) 
			{
			   $arr['calcisn'] = $tag->saveXML($element);
			}foreach ($tag->getElementsByTagName("prem") as $element) 
			{
			   $arr['prem'] = $tag->saveXML($element);
			}
			return $arr;
		}
	function Auth ($login,$password)
	{
	    $password = $password;
	    $xh = new XmlHelper();
	    global $SvcURL, $Sid;
	    $reqString=$xh->MakeRequestXml('3024911','Auth',"<params><Name>{$login}</Name><Pwd>{$password}</Pwd></params>");
	    $svc=MakeSvcClient($SvcURL); /*$SvcURL - Urlустановленноговеб-сервиса » */
	    $parameters = array('pData' => $reqString);
	    $result=$svc->ExecProc($parameters);
	    $error=$xh->GetErrorFromXml($result);
	    if (isset($error))
	        {
	            throw new Exception($error);
	            return null;

	        }else{
			    $doc = new DOMDocument();
			    $doc->loadXML($result->ExecProcResult->any);
			    $Sid=$doc->getElementsByTagName('Sid')->item( 0)->nodeValue;
			    return $doc;
	        }
	}
	$SvcURL = "https://proxy.euro-ins.ru/soap";
	$Sid = "";
	try
	{
	    Auth('Алгоритм','8FB95E8CA40527404D2DC966DEB525397CFE69F06E2DD97D1FE2322A87B3414833AF55EB0C0878A2DC4F05F7539F0D0E6B548D071C5C059D119809DCC9E403AE');
	    if (isset($Sid))
	    {
	        $sum = ExecuteSvcProc("3024911", "USER_AgrCalcOsagoExport", "<params><CALCDATA><DraftPolicyRequest><DateRevision>2019-04-30T12:55:41</DateRevision><DateActionBeg>2019-05-12T00:00:00</DateActionBeg><DateActionEnd>2020-05-11T23:59:59</DateActionEnd><Period1Beg>2019-05-12</Period1Beg><Period1End>2020-05-11</Period1End><DriversRestriction>true</DriversRestriction><IsTransCar>false</IsTransCar><TrailerKPR>0</TrailerKPR><UseCar>1</UseCar><CarPart><CountryCar>1</CountryCar><CarIdent><VIN>WDD1111111111111</VIN><BodyNumber></BodyNumber><ChassisNumber></ChassisNumber></CarIdent><LicensePlate>С111СС197</LicensePlate><RsaCarCode>014800078928040106030000066814</RsaCarCode><YearIssue>2008</YearIssue><CatCar>B</CatCar><DocumentCar>31</DocumentCar><DocCarSerial>77АП</DocCarSerial><DocCarNumber>123123</DocCarNumber><DocumentCarDate>2011-07-07</DocumentCarDate><TicketCar>53</TicketCar><TicketCarSerial></TicketCarSerial><TicketCarNumber>08511111111115</TicketCarNumber><TicketDiagnosticDate>2019-09-19</TicketDiagnosticDate><EngCap>183</EngCap></CarPart><PolicyOwner><PhysicalPerson><Country>643</Country><PersonDocument><DocPerson>12</DocPerson><Serial>2222</Serial><Number>333333</Number></PersonDocument><Address> 107113, Россия, Москваг, ул. Строителей 999</Address><AddressFIASCode>0cd102ab-7fac-43aa-b0d9-07ade87e6a19</AddressFIASCode><MobileNumber>79999999999</MobileNumber><Email>9999999999@gmail.com</Email><PolicyOwnerPersonalData><Surname>Иванов</Surname><Name>Иван</Name><Patronymic>Иванович</Patronymic><BirthDate>1981-04-21</BirthDate></PolicyOwnerPersonalData></PhysicalPerson></PolicyOwner><CarOwner><PhysicalPerson><Country>643</Country><PersonDocument><DocPerson>12</DocPerson><Serial>4509</Serial><Number>508181</Number></PersonDocument><Address>107113, Россия, Москва г, Строителей 999</Address><AreaFIAS>88bd1de5-10a2-4978-ad42-171dab8dac89</AreaFIAS><AddressFIASCode>0cd102ab-7fac-43aa-b0d9-07ade87e6a19</AddressFIASCode><CarOwnerPersonalData><Surname>Иванов</Surname><Name>Иван</Name><Patronymic>Иванович</Patronymic><BirthDate>1981-04-21</BirthDate></CarOwnerPersonalData></PhysicalPerson></CarOwner><DriversPart><Drivers><Country>643</Country><DriverDocument><Serial>3456</Serial><Number>213412</Number></DriverDocument><CategoryDriverLicense>B</CategoryDriverLicense><DriverDocDate>2005-12-20</DriverDocDate><Age>41</Age><Experience>13</Experience><DriverPersonalData><Surname>Петров</Surname><Name>Петр</Name><Patronymic>Петрович</Patronymic><BirthDate>1977-04-14</BirthDate></DriverPersonalData></Drivers><Drivers><Country>643</Country><DriverDocument><Serial>7721</Serial><Number>746645</Number></DriverDocument><CategoryDriverLicense>B</CategoryDriverLicense><DriverDocDate>2006-10-10</DriverDocDate><Age>31</Age><Experience>12</Experience><DriverPersonalData><Surname>Чижик</Surname><Name>Григорий</Name><Patronymic>Вадимович</Patronymic><BirthDate>1988-01-22</BirthDate></DriverPersonalData></Drivers></DriversPart></DraftPolicyRequest></CALCDATA></params>
", $Sid);
			echo ('{"calcisn":"'.strip_tags($sum['calcisn']).'","prem":"'.strip_tags($sum['prem']).'"}');
			// $item = array();
	  //       $sum = explode(';',$sum);
	  //       $item['id']=explode('Тб=',$sum[0])[0].'<br>';
	  //       $item['sum']=explode('|КБМ больше ,95| ',explode('Прем=',$sum[count($sum)-1])[1])[0];
	  //       echo json_encode($item);
	        // $sum = explode('|КБМ больше ,95| ',);


	    }
	}
	catch (Exception $e)
	{
	    echo $e->getMessage();
	}

 ?>
