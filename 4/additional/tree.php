<?php
header("Content-type: text/html; charset=utf-8");

$dir = __DIR__ . "/../";

tree($dir);

function tree($dir) {
	$files = scandir($dir);
	echo "<ul>";

	foreach ($files as $value) {
		if (preg_match("/^\./", $value) === 0) {
			if (is_dir($dir . '/' . $value)) {
				echo "<li><b>{$value}</b>";
				tree($dir . "/" . $value);
				echo "</li>";
			} else {
				echo "<li>{$value}</li>";
			}
		}
	}
	echo "</ul>";
}