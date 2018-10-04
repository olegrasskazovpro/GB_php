<?php
header("Content-type: text/html; charset=utf-8");

include_once PHP_DIR . '/funcImgResize.engine';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_FILES['failo'])) {
		if(!file_exists(MAX_DIR)){
			mkdir(MAX_DIR);
		}

		$name = $_FILES['failo']['name'];
		$files = scandir(MAX_DIR);

		if (findSame($files, $name)){
			$name = renameFile($files, $name);
		}

		$filename = MAX_DIR . $name;
		$minFileName = MIN_DIR . $name;

		move_uploaded_file($_FILES['failo']['tmp_name'], $filename);

		img_resize($filename, $minFileName, 300, 150);
	};
}

/**
 * Function returns TRUE if folder (presented by $files array) contains file $name
 * @param [] $files array of files in folder
 * @param $name - name of file included file extension
 * @return bool true if $name file exist in $files array
 */
function findSame($files, $name) {
	foreach ($files as $value) {
		if ($value == $name) {
			return true;
		}
	}
	return false;
};

/**
 * Return new file name with postfix (_num) increasing it to 1
 * @param [] $files - array of folder file names
 * @param String $name - name of file that trying to add to folder
 * @return string - new filename with postfix
 */
function renameFile($files, $name) {
	$fileName = explode('.', $name)[0];
	$fileExtension = explode('.', $name)[1];

	$FFiles = filterFiles($files, "/^$fileName\_\d+/");
	$_num = '_' . (count($FFiles) + 1);

	$newName = 	$fileName . $_num . ".$fileExtension";

	return $newName;
}

/**
 * @param [] $files array of files in folder
 * @param String $pattern regular expression pattern
 * @return array of files
 */
function filterFiles($files, $pattern){
	return preg_grep($pattern, $files);
}


function galeryRender() {
	$minDir = scandir(MIN_DIR);
	$minFiles = filterFiles($minDir, "/^[^.]/");

	foreach ($minFiles as $value) {
		echo "<img src=\"images/min/$value\" data-full_image_url=\"images/max/$value\" alt=\"$value\">";
	}
}
?>