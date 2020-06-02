<?php
// start session
session_start();
// add configuration file where database details are present
require_once 'config.php';
// add helper file
require_once 'helpers/system_helper.php';

// require_once('lib/Template.php');
// instead of doing as above we can autoload as follows

function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';
}