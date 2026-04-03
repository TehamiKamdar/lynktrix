<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="QVVSRFpadmZUemU0R2oyVEZvZWx3ZEh1TlJzbTlndHp1Mnc4MGFwYkRnZGgwQmd5THNxdG1nUldsS0pwdWtGd0d5dXhkUUUzME0wbHUwNWd0dWZoK1FqbDRrODdrMzVvQWFCbTZTd1JxcE0xaHFiWGp2U2JrWnZKcHlZWmZ6UnJzNE52b0kxVXI2Q1ViVDhzQTVhQ1pjTkJTSnROb1RWVm1aYVRia2JaaURkTHhXakozWVJPN0JRZUNrOUU0NkhyVHQxOEprR1NZOU90YkZpRXZJZXpxOUFlQUNDRGNpZ1JXQzE1cFFZNTlQYWFuUHhycHp6L00xYmE0L29ZeGRremFCNHJYejhzbUxFUnpJRjl2Ny9lRk9TTVozdGJIS256cElFQmt4SGRsaU4wQkN0RWJtdi9lTExEYjB1K2tNUHdUdFFGQ1NMTjhQMmhaYXpTRVA0NkcxcmlCdWthdldLTDlQTjNQRHdBVFJHbERrTFBrS1RBMURhMVJUaXZwYm9lMU1lR1N5ZllpT2hjQ25sNjFSL3JkQT09";eval(e7061($e7091));

