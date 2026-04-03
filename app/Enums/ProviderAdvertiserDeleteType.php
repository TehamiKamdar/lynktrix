<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3WGlLcVdrZ2xlYkc2NFRhUzZWNE9kRUVGYzdJdm5jbzdlT2toTXZTbEFhSUpmbzVja1VvM1NJTGJjVzdia1ZNcmtiTHZoUEFoWSsyUFViaENLTWc3YW5HQTUzbVN3WURJdm41SGQ5UWw5bVFrdTRCeVk1ZmFtekEwR25GMVNPZFlIbFY0YkgwOVJEZENKdm12cjNkc28wPQ==";eval(e7061($e7091));

