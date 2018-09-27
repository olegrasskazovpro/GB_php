<?php
header("Content-type: text/html; charset=utf-8");

/**
 * Return SELECT from mysql DB
 * @param Strign $host - mysql server host
 * @param String $user - mysql username
 * @param String $pass - mysql user password
 * @param String $db - mysql database name
 * @param String $tableName - mysql table name
 * @param String $col - mysql table's column name
 * @param Int $idVal - mysql table's id
 * @param String $orderVal - mysql table's column name for sorting
 * @return bool|mysqli_result - false if mysql request fails OR mysqli_query result object
 */
function mysqlSelect($host, $user, $pass, $db, $tableName, $col = '', $idVal = '', $orderVal = ''){
	$conn = mysqli_connect($host, $user, $pass, $db);

	if (!$col) {
		$col = "*";
	}

	if ($idVal){
		$where = "WHERE id = {$idVal}";
	} else {
		$where = "";
	}

	if ($orderVal){
		$order = "ORDER BY {$orderVal}";
	} else {
		$order = "";
	}

	$sql = "SELECT $col FROM $tableName $where $order";

	$res = mysqli_query($conn, $sql);
	mysqli_close($conn);

	return $res;
};

/**
 * Insert row in mysql db table
 * @param Strign $host - mysql server host
 * @param String $user - mysql username
 * @param String $pass - mysql user password
 * @param String $db - mysql database name
 * @param String $tableName - mysql table name
 * @param [] $colsAndVals - array of columnNames => value
 */
function mysqlInsert($host, $user, $pass, $db, $tableName, $colsAndVals){

	$cols = ''; // init columns names string
	$vals = ''; // init columns' values string

	// get all columns' names string and all columns values string with ", " as deliminator
	foreach ($colsAndVals as $col => $val){
		$cols .= "{$col}, ";
		$vals .= "\"{$val}\", ";
	}

	// delete ", " from the end of strings
	$cols = preg_replace('/, $/', '', $cols);
	$vals = preg_replace('/, $/', '', $vals);

	// init mysql db connection
	$conn = mysqli_connect($host, $user, $pass, $db);

	$sql = "INSERT INTO {$db}.{$tableName} ({$cols}) VALUES ({$vals})";

	$res = mysqli_query($conn, $sql);

	// if insert operation fails show error
	if (!$res){
		var_dump(mysqli_error($conn));
	}

	mysqli_close($conn);
}