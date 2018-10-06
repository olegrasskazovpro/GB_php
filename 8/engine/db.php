<?php

function getConnection() {
	$db = include CONFIG_DIR . 'db.php';
	static $conn = null;
	if(is_null($conn)){
		$conn = mysqli_connect($db["host"], $db["user"], $db["pass"], $db["dbName"]);
	}
	return $conn;
}

function execute($sql){
	$query = mysqli_query(getConnection(), $sql);
	ifError($query);
	return $query;
}

function queryAll($sql){
	return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function queryOne($sql){
	return mysqli_fetch_assoc(execute($sql));
}

function closeConnection() {
	return mysqli_close(getConnection());
}

function ifError($query){
	if (!$query){
		var_dump(mysqli_error(getConnection()));
	}
}

function getInsertedId(){
	return mysqli_insert_id(getConnection());
}