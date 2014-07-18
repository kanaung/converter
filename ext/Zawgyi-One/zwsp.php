<?php
/**
 * @file Zawgyi-One/zwsp.php	Zero-Width-Space for word break using Unicode Standard encoding fonts.
 * @ingroup m_modules
 * 
 */
 
/**
 * @var $zwsp add Zero-Width-Space for word break using Zawgyi-One font
 */
$zwsp = array(
			'(?<!္)([က-အဣ၎ဤ၌၍ဥဦဧ၏ဩဪဿ])(?!်|့)'=>'​$1',
		);
