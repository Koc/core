<?php
require_once 'phpwebdriver/CWebDriverTestCase.php';

class WebTest extends CWebDriverTestCase
{

    protected function setUp()
    {
        parent::setUp(SELENIUM_SERVER, 4444, 'firefox C:\Program Files\Firefox_5\firefox.exe');
        $this->setBrowserUrl(SELENIUM_SOURCE_URL_ADMIN);
    }

    public function testTitle()
    {
        $this->open(SELENIUM_SOURCE_URL_ADMIN);

        $this->assertEquals('Access denied', $this->getBodyText());
    }
}
?>
