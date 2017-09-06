<?php

namespace FfaJobsSettings;

class JobsEmailsTest extends \PHPUnit\Framework\TestCase {
	public function testGetEmails_default() {
    $db = new JobsEmails("http://localhost:8004");
    $settings = $db->getEmails("KYC");
		$this->assertLessThan(count($settings), 0);
	}
} // end class
