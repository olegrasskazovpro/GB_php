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
 * @return String transliterated string
 */
function trans($str, $lib) {
	echo "$str<br><br>";

	foreach ($lib as $key => $value) {
		$reg = "/$key/";
		$str = preg_replace($reg, $value, $str);
		$reg = mb_strtoupper($reg);
		$value = mb_strtoupper($value);
		$str = preg_replace($reg, $value, $str);
	}

	return $str;
}

$str = "А-Б-В-Г-Д. а-б-в-г-д";

$trans = trans($str, $lib);

echo "$trans";
?>