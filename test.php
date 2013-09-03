<?php
if (@$_GET["id"] <= null) {
    $id = 99999999;
}else{
$id = $_GET["id"];
}
$url = 'http://localhost/Fastlane/profile/user/id/'.$id.'/format/json';


    $handle = curl_init();
    // Set
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, array('X-API-KEY: admin'));
    curl_setopt($handle, CURLOPT_URL, $url);
    $buffer = curl_exec($handle);

 
//    $buffer = json_decode($buffer, true);
//    $result = file_get_contents($buffer);
//$buffer = array_values($buffer);
//  $buffer = json_encode($buffer);  
  var_dump(get_object_vars($buffer));
  
    
$user = json_decode(  
    file_get_contents($buffer));  
//
//echo "Data:</br>";
echo 'id=> '; echo $user->id;
//echo "<br>";
//echo 'name=> '; echo $user->username;
//echo "<br>";
//echo 'password=> '; echo $user->password;
