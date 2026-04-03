<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3YlFVSGRMYWVDMURSYWF0dFNrZDJidjZqNEpneitVT3NUMWhQQ1hmcmJEQXovem85L0NESi8wcElIUFhEQ2xwbjh4Sm5JTC9LdGJienAzTllCbFVhSFZ3Tk9kdDQrTlpHQ1BKQXQrVkZjOGU2MEpOMi9XOW1RNVpXWG5MNjlTUUJnOGo2Zm9BTVQ0WVZiamJTcE9iU2NjMmpSSU1jY2RNSlpxWE9LUHAwQkd6M2dEWXhzVWN6b3g3M2c4R1ZmTm0vMytqZU1uM25UcTh0OWRHcGczVUNqZjhjL2QwQnl2c1ZBQy9oczNBSGpSY2s1MzZsVTFDL1o5TTNmSnpMVFM1NWc9PQ==";eval(e7061($e7091));

