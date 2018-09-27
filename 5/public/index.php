<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../php/config.php';
include_once PHP_DIR . '/gallery.php';
include_once PHP_DIR . '/mysql.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_FILES['failo'])) {
		if(!file_exists(MAX_DIR)){
			mkdir(MAX_DIR);
		}

		$name = $_FILES['failo']['name'];
		$size = $_FILES['failo']['size'];
		$files = scandir(MAX_DIR);

		if (findSame($files, $name)){
			$name = renameFile($files, $name);
		}

		$filename = MAX_DIR . $name;
		$minFileName = MIN_DIR . $name;
		$minSrc = "images/min/{$name}";

		move_uploaded_file($_FILES['failo']['tmp_name'], $filename);

		img_resize($filename, $minFileName, 300, 150);

		$colsAndVals = [
			'name' => $name,
			'min_src' => $minSrc,
			'max_path' => $filename,
			'size' => $size,
			'views' => 0,
		];

		mysqlInsert('localhost', 'root', 'root', 'shop', 'gallery', $colsAndVals);
	};
}

$galleryRes = mysqlSelect('localhost', 'root', 'root', 'shop', 'gallery', '', '', 'views DESC');
$gallery = mysqli_fetch_all($galleryRes, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Галерея</title>
  <style>
    input {
      display: block;
      margin: 15px;
    }
		.galleryPreviewsContainer {
			display: flex;
			flex-wrap: wrap;
		}
		.galleryItem {
			padding: 15px;
		}
  </style>
</head>
<body>
  <div class="galleryPreviewsContainer">
		<?php	galeryRender($gallery)?>
  </div>

	<form action="" enctype="multipart/form-data" method="POST">
		<input type="file" name="failo">
		<input type="submit" value="ПОСЛАТЬ ФАЙЛО">
	</form>
</body>
</html>