Converter
=========

converter.php
=============
complete rewrite

Usage
=====
```
include('class-converter.php');
$source_text = "aeaumif;vm;";
$options = array(
		'input_font' => 'WinInnwa', // win innwa, ayar, zawgyi-one, myanmar3
		'output' => 'Zawgyi-One', // ayar, zawgyi-one, myanmar3
		'encoding' => 'ascii', //this is input source font encoding ascii or utf-8
		'spelling_check' => false, //boolean
		'text_only' => true, //boolean
		'en_zwsp' => true, //boolean
		'exceptions' => 'I love, love you!', //words list seperated by comma to ignore from converter
		'suggested' => true, //boolean
	);
$converter = new Converter();

echo $converter->convert($source_text, $options);
```