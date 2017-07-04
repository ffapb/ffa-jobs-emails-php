<?php


//run python with shell exec()
//$somequery = $_GET['query'];
//$result= shell_exec("python /home/minerva/Desktop/programming/django/jobsproj/manage.py which_email 'Debitors notice - LB'");
//var_dump($result); //output should be in here

//http://php.net/manual/en/function.curl-exec.php

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
#curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/36/");
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/44/?asjson=true");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// grab URL and pass it to the browser
//curl_exec($ch);
//curl_close($ch);

$buffer = curl_exec($ch);



//http://php.net/manual/en/function.strip-tags.php

/*
$string  = strip_tags($buffer); 
$string = str_replace("\r", '', $string);    // --- replace with empty space
$string = str_replace("\n", '', $string);   // --- replace with space
$string = str_replace("\t", '', $string);   // --- replace with space
 $string = str_replace("&nbsp;", "\n", $string);  // --- replace &nbsp; with \n
$string = trim(preg_replace('/ {2,}/', "\n", $string));  // ----- remove multiple spaces ----- 
var_dump($string);
*/

//Result

//minerva@minerva-pc:~/Desktop/programming/test/run_python_in_php$ php index.php 
//string(235) "FFA Private Bank - Jobs EmailFFA Private Bank sal

//FFA Private Bank Jobs EmailAudit Active ledger Cron: 20 15 1 * *
//s.akiki@ffaprivatebank.com
//m.moawad@ffaprivatebank.com
//d.adada@ffaprivatebank.com 
//Developed by: Minerva Moawadt - 2017"

var_dump(json_decode($buffer,true));




?>





