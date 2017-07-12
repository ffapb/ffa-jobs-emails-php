# ffa-jobs-emails-php
PHP library to access [ffa-jobs-emails](https://github.com/minerva22/ffa-jobs-emails) API

[packagist](https://packagist.org/packages/minerva22/ffa-jobs-emails)

# Installation
`composer install minerva22/ffa-jobs-emails-php`

# Usage
```
require_once 'vendor/autoload.php';
# require_once 'src/JobsEmails.php';
$je = new \FfaJobsEmails\JobsEmails("http://localhost:8000");
var_dump($je->jobsEmails("Treasury FFA017"));
var_dump($je->jobsEmails("BBG Price Recording - Lebanon"));
var_dump($je->getEmails("inexistant")); # throws exception

$je = new \FfaJobsEmails\JobsEmails("http://inexistant:8000");
var_dump($je->jobsEmails("Treasury FFA017")); # throws exception

```


