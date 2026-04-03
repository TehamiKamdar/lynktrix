<?php
$keyfile = public_path("key.inc.php");
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
if(file_exists($keyfile)){include_once($keyfile);}else{die("<h2>include: $keyfile not found!</h2>");}
$e7091="cmpTZnNYMlh1ZllTbW1Qbk5HQlFQc0piaTdjR1h6cFlBY1NUQnRCejNzb2g2THRwWnpVeUQwdjZIOUxvMC9qNTQ5ZnZwSnFPWWFuMlVmemY0MitwL1NYc3djT1RsUXlXbUVic213T2JNRjY0NEtEMEhPUVJEM3gyandiN0ZMR05SV0VnWmt2K0FsNDJDR0tsbUVUeStCOFlKVnZ4MGxFc2x2VTFhT2VBYkw5ZEl0NWo1MXk4K0FNYXJoY3FYUWdpY0E0bGVKclNaMW1PaG1mMjFxSGt4aHpNRzBjeTZaVjBBZFRuY3YwTGMrVjVBQlYxQ1NzMDY3c2tQZ2lHTkV0ZGFuNmpwN3NuOFlzMy9Qa0RqWmszTm1SekFHeGxSOHN2QmMxdTFwOXFRYTV3dnNSNU5LQ3NhNHpPcEY1MCtFZVFUYXkyY0dEZldWSUpxWXRjYzE5YXU0bjkxeUVEZTVRalpGRENONGRacGVUR05LMUdRRUt3OEVRb0ltZVZFNFJYQjZ6UllGb3hXb2labGk4MVIwN1FiKzFtSk5uS04wRjhlbGM3MkJCcFhjR0hRTTU1RzRldFlkZUpOYVp3VW9tWlJ2d2t2S2RYQzVEUXh6a2xTV0hGR1o0dGVPUVhuMVE4MzBvL21YSW1SWXQzRE52T2hDQnVLMElVS3NsZlJsaGF3N0N5YkdSenI2K0dQbWFOajB3RllsZGpsU0RhQWsxa2hYV2VQcnBHb0ZWZnkxeUp3bmVqbTBCdGFaVmM1TStlYkJNNXhCOUs0VUswNUJMZmZhWHg1SFRDV3hrbGRadExvWG9oTC9wTEx5UEIrSXBRcHRTdEV5enBlMWtNVjJIVw==";eval(e7061($e7091));

