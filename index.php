<?php


function jobsproj(string $job_name) {
//run python with shell exec()
//$somequery = $_GET['query'];
//$result= shell_exec("python /home/minerva/Desktop/programming/django/jobsproj/manage.py which_email 'Debitors notice - LB'");
//var_dump($result); //output should be in here

//http://php.net/manual/en/function.curl-exec.php

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
#curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/36/");
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/?asjson=true");
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

$buffer = json_decode($buffer,true);
#var_dump($buffer);


#https://groups.google.com/forum/#!topic/keen-io-devs/eV2yUmEF7-M
$filters = array_filter($buffer, function($x) use($job_name) { return $x["job_text"] == $job_name; });	
#$filters_string = json_encode($filters);
$filters = array_values($filters)[0]["job_id"];

# var_dump($filters);

# Take ID, and send again to jobsproj, to get list of emails
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/emailffa/".$filters."/?asjson=true");
$buffer = curl_exec($ch);
$buffer = json_decode($buffer,true);
$buffer = $buffer['email_set'];

return $buffer;
}

var_dump(jobsproj("Treasury FFA017"));
var_dump(jobsproj("BBG Price Recording - Lebanon"));
?>





