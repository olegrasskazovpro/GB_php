<?php
require_once ENGINE_DIR . 'db.php';

function getReviews(){
	return queryAll("SELECT * FROM reviews");
}

function uploadReview($name, $review) {
	$date = date('d.m.Y H:i');
	execute("INSERT INTO reviews (date, name, review) VALUES ('{$date}', '{$name}', '{$review}')");
}