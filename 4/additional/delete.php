<?php
header("Content-type: text/html; charset=utf-8");

$dir = __DIR__ . "/temp";

delete($dir);

/**
 * Clear and delete all inner any depth folders and files, and this $dir folder itself
 * @param $dir what need to delete
 */
function delete($dir){
	$inner = scandir($dir);
	$inner = filterFiles($inner, "/^[^.]/");

	if(count($inner) > 0) {
		foreach ($inner as $value) {
			$filePath = "{$dir}/{$value}";

			if (preg_match("/^\./", $value) === 0) {
				if (is_dir($filePath)) {
					delete($filePath);
				} else {
					echo "{$filePath} <b style='color: red;'>DELETED</b><br>";
					unlink($filePath);
					delete($dir);
				}
			}
		}
	}

	echo "{$dir} <b style='color: red;'>DELETED</b><br>";
	rmdir($dir);
}

/**
 * @param [] $files array of files in folder
 * @param String $pattern regular expression pattern
 * @return array of files
 */
function filterFiles($files, $pattern){
	return preg_grep($pattern, $files);
}