Converter
=========

This converter can be used to convert various Burmese encoding from one to another.
For example: 	Zawgyi-One to Myanmar3
		Myanmar3 to Ayar

Web Interface
=============
We have full featured web interface hosted on cloud server. Please visit http://converter.myanmapress.com/

Developer Usage
===============
Developer can use this converter in their application easily.
Add "ext" directory and class-converter.php in your application.
Below is example code.
```php

<?php
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

?>

```

Develop new converting rules
============================
Anyone can add new converting rules, if you know php array and regular expression. 
All rules are located in "ext/rules" directory as sub-directory.
Directory name as output encoding and files as source encoding rules.
In "ext/rules" directory, you can see 3 directories, Ayar, Myanmar3 and Zawgyi-One. These directories are for output encoding.
You can add more directory, if you need more output encoding.
For input encoding rules, you need to follow file name format. If your input encoding font is unicode based, you can name as in FONTNAME-rules.php.
If your input encoding font is ascii based, you need to name as in FONTNAME-rules-ascii.php.
In rules file, you need to add array variables. Add $convert = array(); and $order = array(); then modify as your need.
$convert is mandatory. Format is simple, source encoding character as key and output encoding character as value.
$order is optional. Its format is regular expression patptern as key and replacement as value.
