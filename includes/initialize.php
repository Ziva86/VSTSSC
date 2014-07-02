<?php
//separator
/*
defined('DS')?null:define('DS',DIRECTORY_SEPARATOR);
//definisanje putanje sajta
defined('SITE_ROOT')?null:define('SITE_ROOT','C:'.DS.'xampp'.DS.'htdocs'.DS.'VSTSSC');
defined('LIB_PATH')?null:define('LIB_PATH',SITE_ROOT.DS.'includes');
*/

defined('DS')? null : define('DS',DIRECTORY_SEPARATOR);
defined('SITE_ROOT')? null : define('SITE_ROOT','C:'.DS.'xampp'.DS.'htdocs'.DS.'VSTSSC');
defined('LIB_PATH')? null : define('LIB_PATH',SITE_ROOT.DS.'includes');


require_once(LIB_PATH.DS.'config.php');
require_once(LIB_PATH.DS.'database.php');

require_once(LIB_PATH.DS.'functions.php');
//require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'student.php');
require_once(LIB_PATH.DS.'odsek.php');
?>