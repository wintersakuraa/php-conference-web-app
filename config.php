<?php

// Database config
const DB_HOST = 'YOUR_HOST';
const DB_USER = 'YOUR_USERNAME';
const DB_PASS = 'YOUR_PASSWORD';
const DB_NAME = 'DB_NAME';

// Route config
define("BASE_ROUTE", 'YOUR_PATH');

$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if ($actual_link == BASE_ROUTE . '/config.php') die ("Direct access not permitted");
