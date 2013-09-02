<?php
if (@$_GET["id"] <= null) {
    $id = 99999999;
}else{
$id = $_GET["id"];
}
$url = 'http://localhost/Fastlane/profile/user/id/'.$id.'/format/json';


    $handle = curl_init();
    // Set
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_POST, 1);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, array('Accept:application/json','Content-type: application/json', 'X-API-KEY: admin'));
    curl_setopt($handle, CURLOPT_URL, $url);
    $buffer = curl_exec($handle);

 
    var_dump($buffer);
  
    
//$user = json_decode(  
//    file_get_contents($result)  
//);  
//
//echo "Data:</br>";
//echo 'id=> '; echo $user->id;
//echo "<br>";
//echo 'name=> '; echo $user->username;
//echo "<br>";
//echo 'password=> '; echo $user->password;
