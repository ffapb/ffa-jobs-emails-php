<?php

namespace FfaJobsSettings;

class DbTest extends \PHPUnit\Framework\TestCase {
	public function testGetConnectionSettings_default() {
    $db = new Db("http://localhost:8004");
    $settings = $db->getConnectionSettings();
		$this->assertNotNull($settings["Lebanon"]["host"]);
	}
} // end class
