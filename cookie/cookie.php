<?php 
require 'vendor/autoload.php';
$instagram = \InstagramScraper\Instagram::withCredentials('+998936475203', 'Lucky0307');
$instagram->login();
$account = $instagram->getAccountById(3);
echo $account->getUsername();

?>