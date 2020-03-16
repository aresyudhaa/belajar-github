<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB','172101794_praktikum');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect');