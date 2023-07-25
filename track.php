<?php
// this files just stores the IP address of users in a user database for tracking connecions
require 'db-conn.php';
ini_set('allow_url_fopen', 1);
$ip = ''; $country = ''; $city = ''; $isp = '';

// Get the IP address
$ip_address = $_SERVER['REMOTE_ADDR'];
if ($ip_address == '::1'){
    $url = 'https://ipinfo.io/8.8.8.8?token=274b5657510981';
}else{
    $url = 'https://ipinfo.io/$ip_address?token=274b5657510981';

}

$checkip = file_get_contents($url);
$data = json_decode($checkip, true);

// echo $result->city;

$ip = $data['ip'];
$country =  $data['country'];
$city =  $data['city'];
$isp = $data['org'];

// Access the values in the array

// echo 'Name: ' . $data['ip'] . '\n';
// echo 'Age: ' . $data['country'] . '\n';
// echo 'City: ' . $data['city'] . '\n';

// Display the information

// echo 'Your IP address is: $ip_address\n';
// echo 'You are visiting from: $country ($country)\n';

$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
$sql = "INSERT INTO trackers (IP, Country_name, ISP ) VALUES ('$ip', '$country', '$isp')";

$db->query($sql);

$db->close();

?>


