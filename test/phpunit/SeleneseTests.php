<?php
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
 
class SeleneseTests extends PHPUnit_Extensions_SeleniumTestCase
{
 public static $browsers = array(
      array(
        'name'    => 'Firefox on Linux',
        'browser' => '*firefox',
        'host'    => 'localhost',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      /*
      array(
        'name'    => 'Safari on MacOS X',
        'browser' => '*safari',
        'host'    => '10.0.1.3',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      
      array(
        'name'    => 'Safari on Windows XP',
        'browser' => '*custom C:\Program Files\Safari\Safari.exe -url',
        'host'    => 'my.windowsxp.box',
        'port'    => 4444,
        'timeout' => 30000,
      ),
      array(
        'name'    => 'Internet Explorer on Windows XP',
        'browser' => '*iexplore',
        'host'    => 'my.windowsxp.box',
        'port'    => 4444,
        'timeout' => 30000,
	) */
    );
 
    protected function setUp()
    {
        #$this->setBrowser('*firefox');
	#$this->setBrowser('*iexplore');
        $this->setBrowserUrl('http://localhost/');
    }

    public static $seleneseDirectory = '/home/joe/internetbazar/test/seleniumtests'; #'/path/to/files';
}
?>