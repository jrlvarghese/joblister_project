<?php
// require_once('lib/Template.php');
// instead of doing as above we can autoload as follows

function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';
}