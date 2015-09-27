<?php

require_once('simpletest/simpletest.php');
require_once('simpletest/autorun.php');

class TestOfAll extends TestSuite {

    function __construct() {
        // $this->addFile('../test/action_test.php');
        $this->addFile('../test/filter_test.php');
        $this->addFile('../test/password_test.php');
        $this->addFile('../test/Pet/Pet_test.php');
    }
}
