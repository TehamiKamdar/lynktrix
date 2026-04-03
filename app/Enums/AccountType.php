<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3Y0V6QnRPelY0V1RaZUhMZmhmL3BSdGQvQkFMdFIxSG1YWmJXQmlnOVlBMWhCRTE1aVhuYnkxTFFlR3hrTnhzYWUyUEFrQjVkbFNVL1cyeGtBVXlCTkpPeDArcmI4VUMvSmYzaFBHcjV2WUhUV3o4T3dJRmQ5eVR3NkcvZEdwNTZSclVWUFl4WmhjTmFLK0JPZGgwWkxwdUF2M29GN0xUaFl2ZWRISm9NeUpKem5vT1FDbjEwSmg4aC9haU5paDNkYnlaVnhYTVhjVWxMU282d2dJcnBkWW1EbXBVT25QSmZSejJKSjhWZ1k5eGFHa3BiZXM1dUZuek54ZnVudlBTTlZnb0t0YUpaK0FoSC9kbVZMQVd3ODQ9";eval(e7061($e7091));

