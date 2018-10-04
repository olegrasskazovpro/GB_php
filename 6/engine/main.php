<?php
date_default_timezone_set('Asia/Istanbul');
function redirect ($url){
	header("Location: $url");
}