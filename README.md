# ffa-jobs-emails-php
PHP library to access [ffa-jobs-settings](https://github.com/ffapb/ffa-jobs-settings) API

[packagist](https://packagist.org/packages/minerva22/ffa-jobs-emails)

# Installation
`composer require ffapb/ffa-jobs-settings-php`

# Usage

To get list of emails of a particular job
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

To get database credentials (IP, port, username, password, database name)
```
$db = new \FfaJobsSettings\Db("http://localhost:8000");
var_dump($db->getConnectionSettings()); # shows credentials for databases the default "location"
var_dump($db->getConnectionSettings("Beirut")); # shows credentials for databases in Beirut
```

# Testing

```
git clone http://.../ffa-jobs-settings-php
cd ffa-jobs-settings-php
composer install
vendor/bin/phpunit tests
```
