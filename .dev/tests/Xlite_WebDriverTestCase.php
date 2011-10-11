<?php

require_once 'phpwebdriver/CWebDriverTestCase.php';
 
class Xlite_WebDriverTestCase extends CWebDriverTestCase
{
    function __construct($browser =  'firefox', $version = '5', $port = 4444, $caps = array()){
        parent::setUp(SELENIUM_SERVER,
                      $port,
                      $browser,
                      $version,
                      $caps);
        $this->setBrowserUrl(SELENIUM_SOURCE_URL_ADMIN);

    }
}
