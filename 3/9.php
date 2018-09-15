<?php

$lib = [
	'а' => 'a',
	'б' => 'b',
	'в' => 'v',
	'г' => 'g',
	'д' => 'd',
	'е' => 'e',
	'ё' => 'e',
	'ж' => '*',
	'з' => 'z',
	'и' => 'i',
	'й' => 'j',
	'к' => 'k',
	'л' => 'l',
	'м' => 'm',
	'н' => 'n',
	'о' => 'o',
	'п' => 'p',
	'р' => 'r',
	'с' => 's',
	'т' => 't',
	'у' => 'u',
	'ф' => 'f',
	'х' => 'h',
	'ц' => 'c',
	'ч' => '4',
	'ш' => 'sh',
	'щ' => 's4',
	'ъ' => "'",
	'ы' => 'y',
	'ь' => "'",
	'э' => 'e',
	'ю' => 'yu',
	'я' => 'ya',
];

/**
 * @param String $str string that needs to be transliterated
 * @param String [] $lib array of transliteration library
 * @param String [] $pattern what to replace
 * @param String [] $replace to what replace
 * @return String transliterated string
 */
function transAndReplace($str, $lib, $pattern, $replace) {
	echo "$str<br><br>";

	foreach ($lib as $key => $value) {
		$reg = "/$key/";
		$str = preg_replace($reg, $value, $str);
		$reg = mb_strtoupper($reg);
		$value = mb_strtoupper($value);
		$str = preg_replace($reg, $value, $str);
	}

	return preg_replace($pattern, $replace, $str);
}

$str = "У попа была собака. Он ее любил. Маша любит кашу.<br>Мама мыла раму.";
$trans = transAndReplace($str, $lib, '/\s/', '_');

echo "$trans";

?>