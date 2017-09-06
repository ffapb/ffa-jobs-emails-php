<?php

namespace FfaJobsSettings;

class JobsEmails {

public function __construct(string $url) {
  $this->url = $url."/emailffa";
}

public function getEmails(string $job_name) {
//run python with shell exec()
//$somequery = $_GET['query'];
//$result= shell_exec("python /home/minerva/Desktop/programming/django/jobsproj/manage.py which_email 'Debitors notice - LB'");
//var_dump($result); //output should be in here

//http://php.net/manual/en/function.curl-exec.php

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
#curl_setopt($ch, CURLOPT_URL, $this->url."/36/");
$url2 = $this->url."/?asjson=true";
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 



// grab URL and pass it to the browser
//curl_exec($ch);
//curl_close($ch);

$buffer = curl_exec($ch);

// get http code before continuing
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode==0) throw new \Exception(sprintf("Failed to fetch URL %s", $url2));
if($httpcode!=200) throw new \Exception(sprintf("HTTP code %s returned from URL %s", $httpcode, $url2));

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


#https://groups.google.com/forum/#!topic/keen-io-devs/eV2yUmEF7-M
$filters = array_filter($buffer, function($x) use($job_name) { return $x["job_text"] == $job_name; });	

if(count($filters)==0) throw new \Exception(sprintf("Job with name '%s' not found", $job_name));
#$filters_string = json_encode($filters);
$filters = array_values($filters)[0]["job_id"];

# var_dump($filters);

# Take ID, and send again to jobsproj, to get list of emails
curl_setopt($ch, CURLOPT_URL, $this->url."/".$filters."/?asjson=true");
$buffer = curl_exec($ch);
$buffer = json_decode($buffer,true);
$buffer = $buffer['email_set'];

return $buffer;
}

} // end of class
