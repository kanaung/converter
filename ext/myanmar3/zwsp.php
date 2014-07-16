<?php
/**
 * @var $zwsp add Zero-Width-Space for word break using Unicode Standard encoding fonts
 */

$zwsp = array(
			'(?<!္)([က-အဣ၎ဤ၌၍ဥဦဧ၏ဩဪဿ])(?!်|့)'=>'​$1',
		);
