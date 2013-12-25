Converter
=========

converter.php
=============
complete rewrite

Usage
=====
```
include('class-converter.php');
$source_text = "ေနေကာင္းလား";
$options = array(
		'input_font' => 'win', // win, ay, zg, uni
		'output' => 'zg', // ay, zg, uni
		'encoding' => 'ascii', //this is source font encoding ascii or utf-8
		'spelling_check' => false, //boolean
		'text_only' => true, //boolean
		'exceptions' => 'I love, love you!', //words list seperated by comma to ignore from converter
		'suggested' => true, //boolean
	);
$converter = new Converter();

echo $converter->convert($source_text, $options);
```
