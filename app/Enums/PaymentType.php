<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3ZEh1TlJzbTlndHp1Mnc4MGFwYkRnZVpzUkorR2FHZExjQnI4dkdKWGo3QXlNUXpTc1NKTWtEa1dvcW80bWhUbGpHc3N3MUprVTRWMGFaY2VHV0l4aXFzdDZ2VzIxUkp6T0hOVlQ2alE3bmpLU0pIN0VHR1hremV4MmpQVmlZRFExck5scW85RHhRVUN3ZDFjdjZwdnhXK29vYkRiRnlEQ1JmSjVaNGxlY1NlbjBJazRmaEtWMXduVVM3eWFVUXpGdz09";eval(e7061($e7091));

