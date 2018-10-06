<?php
date_default_timezone_set('Asia/Istanbul');

session_start();

function redirect ($url){
	header("Location: $url");
}