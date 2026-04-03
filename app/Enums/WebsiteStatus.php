<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3WiswZkJWY3R0dXh3NUp2alN4T09FV01HbGhXVFMyZVJuSGN0MFJadCtlV09lSSttbGRDM1pWZ2xtZWRWTlJHQVRDTWpaRENhbzN3L1ZXYjhIdXo0SFZuYzVvVGxYRnFLZWZmeCtJSzdQcjFUdllEUjhCT2NJTFVGTGRBaUdXTlpYSXNmL2JUMnlDL1hsZzdmdTlXSzlPRzFvcWp0cmRtdVJ4NmkzRnBtQjRG";eval(e7061($e7091));

