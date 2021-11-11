<?php
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
 
class WebTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://www.sunet.se/');
    }
 
    public function testTitle()
    {
        $this->open('http://www.sunet.se/');
        $this->assertTitle('SUNET - Swedish University Network');
    }
}
?>