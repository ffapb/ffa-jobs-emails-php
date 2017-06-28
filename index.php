<?php

//run python with shell exec()

//$result= shell_exec("python -m http://localhost:8000/emailffa/36/");
//var_dump($result); //output should be in here
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/44/");


// grab URL and pass it to the browser
curl_exec($ch);


?>





