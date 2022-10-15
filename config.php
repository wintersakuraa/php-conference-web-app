<?php

// Database config
const DB_HOST = 'localhost';
const DB_USER = 'wintersakura';
const DB_PASS = '';
const DB_NAME = 'php_conference';

// Route config
define("BASE_ROUTE", 'http://' . $_SERVER['HTTP_HOST'] . '/BWT_Test');

$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if ($actual_link == BASE_ROUTE . '/config.php') die ("Direct access not permitted");
