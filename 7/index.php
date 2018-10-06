<?php
header("Content-type: text/html; charset=utf-8");

session_start ();
$_SESSION['name'] = 'Oleg';
$_SESSION['age'] = '23';
var_dump($_SESSION);
session_destroy();
var_dump($_SESSION);
