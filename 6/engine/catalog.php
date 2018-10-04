<?php
require_once ENGINE_DIR . 'db.php';

function getCatalog(){
	return queryAll("SELECT * FROM catalog");
}

function getOneProduct($id) {
	return queryOne("SELECT * FROM catalog WHERE id = $id");
}

function getProductImages($id){
	return queryAll("SELECT img FROM images WHERE product_id = $id");
}

function getMainImages(){
	return queryAll("SELECT product_id, img FROM images WHERE main = 1");
}

function getMainImgArray(){
	$arr = [];
	foreach (getMainImages() as $value){
		$arr += [$value["product_id"] => $value["img"]];
	}
	return $arr;
}