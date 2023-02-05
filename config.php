<?php
/*
*
* Veritabanı bağlantısı için
* gerekli bağlantı bilgilerinin
* bulunduğu ayar dosyası.
*
*/

header('Content-Type: application/json; Charset=UTF-8');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'blog_proje');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');

include 'db.php';
