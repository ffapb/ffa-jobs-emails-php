# ffa-jobs-emails-php
PHP library to access [ffa-jobs-settings](https://github.com/ffapb/ffa-jobs-settings) API

[packagist](https://packagist.org/packages/minerva22/ffa-jobs-emails)

# Installation
`composer install ffapb/ffa-jobs-settings-php`

# Usage
```
require_once 'vendor/autoload.php';
# require_once 'src/JobsSettings.php';
$je = new \FfaJobsSettings\JobsEmails("http://localhost:8000");
var_dump($je->jobsEmails("Treasury FFA017"));
var_dump($je->jobsEmails("BBG Price Recording - Lebanon"));
var_dump($je->getEmails("inexistant")); # throws exception

$je = new \FfaJobsSettings\JobsEmails("http://inexistant:8000");
var_dump($je->jobsEmails("Treasury FFA017")); # throws exception

```


