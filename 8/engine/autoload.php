<?php

include __DIR__ . '/../config/config.php';
function autoload(){
	$files = scandir(ENGINE_DIR);
	foreach ($files as $file){
		if(!in_array($file, ['..', '.'])){
			if(substr($file, -4) == ".php"){
				include_once ENGINE_DIR . $file;
			}
		}
	}
}
autoload();