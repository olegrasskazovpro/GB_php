<?php
require_once ENGINE_DIR . 'db.php';

function deleteProduct($id){
	execute("DELETE FROM catalog WHERE id = '{$id}'");
}

function addProduct($title, $desc, $price, $img){
		$sql = "INSERT INTO catalog (title, `desc`, price) VALUES ('{$title}', '{$desc}', '{$price}')";
		execute($sql);
		$newProductId = getInsertedId();
		$sql = "INSERT INTO images (product_id, img, main) VALUES ('{$newProductId}', '{$img}', '1')";
		execute($sql);
}

function loadFile($attr, $dir){
	if(isset($_FILES[$attr])) {
		$name = $_FILES[$attr]['name']; // имя файла картинки

		$files = scandir($dir);

		if (findSame($files, $name)){
			$name = renameFile($files, $name);
		}

		$filename = $dir . $name;

		move_uploaded_file($_FILES[$attr]['tmp_name'], $filename);

		return $name;
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