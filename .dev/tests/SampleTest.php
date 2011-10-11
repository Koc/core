<?php
require_once 'phpwebdriver/CWebDriverTestCase.php';

class WebTest extends CWebDriverTestCase
{

    protected function setUp()
    {
        parent::setUp('humanoid:197f2527-8e4e-4bad-aee8-a14f8e6fb329@ondemand.saucelabs.com',
                      80,
                      'firefox',
                      '5',
                      array('version' => '5',
                           'platform' => 'XP',
                           'name' => 'Testing Selenium 2 in Python at Sauce'));
        $this->setBrowserUrl("http://xcart2-530.crtdev.local/~humanoid/core/src/");
    }

}

?>
