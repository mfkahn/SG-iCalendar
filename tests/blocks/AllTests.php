<?php
require_once 'PHPUnit/Framework/TestSuite.php';
require_once dirname(__FILE__).'/VEventTest.php';

class Blocks_AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();
        $suite->addTestSuite('VEventTest');

        return $suite;
    }
}
