<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The PHP Group                                     |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Bertrand Mansion <bmansion@mamasam.com>                      |
// +----------------------------------------------------------------------+
//
// $Id$

/**
 * Unit tests for Console_Getargs package.
 */
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Console_Getargs_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';


chdir(dirname(__FILE__) . '/../');
require_once 'Getargs_basic_testcase.php';
require_once 'Getargs_getValues_testcase.php';

class Console_Getargs_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Console_Getargs Tests');
        /** Add testsuites, if there is. */
        $suite->addTestSuite('Getargs_basic_testcase');
        $suite->addTestSuite('Getargs_getValues_testcase');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Console_Getargs_AllTests::main') {
    Console_Getargs_AllTests::main();
}
?>