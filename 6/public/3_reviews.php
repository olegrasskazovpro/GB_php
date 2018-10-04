<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/config.php';
include ENGINE_DIR . 'reviews.php';
include ENGINE_DIR . 'main.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	uploadReview($_POST["name"], $_POST["review"]);
	redirect('3_reviews.php');
}
$reviews = getReviews();
closeConnection();

include TEMPLATES_DIR . 'reviews.php';

?>