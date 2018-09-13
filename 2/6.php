<?php

$val = 2;
$pow = 5;
$rec = rec($val, $pow);

function rec($val, $pow){
	if ($pow === 1) {
		return $val;
	}
	return $val * rec($val, $pow - 1);
}

echo "$val^$pow = $rec";

?>