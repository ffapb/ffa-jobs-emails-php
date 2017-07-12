# ffa-jobs-emails-php
PHP library to access [ffa-jobs-emails](https://github.com/minerva22/ffa-jobs-emails) API

# Installation
`composer install minerva22/ffa-jobs-emails-php`

# Usage
```
require_once 'vendor/autoload.php';
$url = "http://localhost:8000"
var_dump(\FfaJobsEmails\jobsEmails($url, "Treasury FFA017"));
var_dump(\FfaJobsEmails\jobsEmails($url, "BBG Price Recording - Lebanon"));
```
