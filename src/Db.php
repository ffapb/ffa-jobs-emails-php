<?php

namespace FfaJobsSettings;

class Db extends JobsEmails {

  public function __construct(string $url) {
    $this->url = $url."/jobsdb";
  }

  public function getConnectionSettings(string $location=NULL) {
    //http://php.net/manual/en/function.curl-exec.php
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
#curl_setopt($ch, CURLOPT_URL, $this->url."/36/");
    $url2 = $this->url."/?asjson=true";
    curl_setopt($ch, CURLOPT_URL, $url2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $buffer = curl_exec($ch);

    // get http code before continuing
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($httpcode==0) throw new \Exception(sprintf("Failed to fetch URL %s", $url2));
    if($httpcode!=200) throw new \Exception(sprintf("HTTP code %s returned from URL %s", $httpcode, $url2));

    //http://php.net/manual/en/function.strip-tags.php
    $buffer = json_decode($buffer,true);

    // identify default location
    if(is_null($location)) {
      $buffer = array_filter($buffer, function($x) { return $x["isdefault"]; });	
      if(count($buffer)==0) throw new \Exception("No default location found");
      if(count($buffer) >1) throw new \Exception("Several default locations found");
    } else {
      #https://groups.google.com/forum/#!topic/keen-io-devs/eV2yUmEF7-M
      $buffer = array_filter($buffer, function($x) use($location) { return $x["location_name"] == $location; });	
      if(count($buffer)==0) throw new \Exception(sprintf("Location with name '%s' not found", $location));
      if(count($buffer) >1) throw new \Exception(sprintf("Several Locations with name '%s' found", $location));
    }

    #$filters_string = json_encode($filters);
    $id = array_values($buffer)[0]["location_id"];

    # Take ID, and send again to jobsproj, to get list of emails
    curl_setopt($ch, CURLOPT_URL, $this->url."/".$id."/?asjson=true");
    $buffer = curl_exec($ch);
    $buffer = json_decode($buffer,true);
    $buffer = $buffer['connection_set'];

    return $buffer;
  }

} // end of class
