<?php
$url = 'http://localhost/Fastlane/profile/user/id/4/format/json';
$auth = 'X-API-KEY: admin';


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($auth));
    curl_setopt($ch, CURLOPT_URL, $url);
    $buffer = curl_exec($ch);

    echo $buffer;
    
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
