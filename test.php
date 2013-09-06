<?php
if (@$_GET["id"] <= null) {
    $id = 1;
}else{
$id = $_GET["id"];
}
$url = 'http://localhost/Fastlane/view/user/id/'.$id.'/format/json';
$auth = 'X-API-KEY: admin';

    $handle = curl_init();
    // Set
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, array($auth));
    curl_setopt($handle, CURLOPT_URL, $url);
    $buffer = curl_exec($handle);
    $user = json_decode($buffer);


        echo "Data:</br>";
        echo 'id=> '; echo $user->id;
        echo "<br>";
        echo 'name=> '; echo $user->username;
        echo "<br>";
        echo 'password=> '; echo $user->password;
