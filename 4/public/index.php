<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../php/config.php';
include_once PHP_DIR . '/reviews.php';
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
    .galleryWrapper__screen{
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #222;
      opacity: 0.8;
      position: fixed;
      top: 0;
      z-index: 100;
      display: block;
      text-align: center;
    }
    .galleryWrapper__image {
      max-height: 80%;
      max-width: 80%;
      z-index: 101;
      position: absolute;
      margin: auto;
      left: 0;
      top: 0;
      bottom: 0;
      right: 0;
    }
    .galleryWrapper__close {
      z-index: 101;
      position: absolute;
      top: 0;
      right: 0;
    }
    .galleryWrapper__next {
      z-index: 101;
      position: absolute;
      top: 50%;
      right: 0;
    }
    .galleryWrapper__back {
      z-index: 101;
      position: absolute;
      top: 50%;
      left: 0;
    }
  </style>
</head>
<body>
  <div class="galleryPreviewsContainer">
		<?php galeryRender()?>
  </div>

<!--
  <div class="galleryWrapper">
    <img class="galleryWrapper__back" src="images/gallery/back.png" alt="Назад">
    <img class="galleryWrapper__next" src="images/gallery/next.png" alt="Вперед">
    <div class="galleryWrapper__screen"></div>
    <img class="galleryWrapper__close" src="images/gallery/close.png" alt="">
    <img class="galleryWrapper__image" src="images/max/1.jpg" alt="">
  </div>
-->
<form action="" enctype="multipart/form-data" method="POST">
  <input type="file" name="failo">
  <input type="submit" value="ПОСЛАТЬ ФАЙЛО">
</form>

  <script src="js.js"></script>
</body>
</html>