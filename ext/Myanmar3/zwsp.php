<?php
/**
 * @file Myanmar3/zwsp.php	Zero-Width-Space for word break using Unicode Standard encoding fonts.
 * @ingroup m_modules
 * 
 */
 
/**
 * @var $zwsp  Zero-Width-Space for word break using Unicode Standard encoding fonts array.
 */

$zwsp = array(
			'(?<!္)([က-အဣ၎ဤ၌၍ဥဦဧ၏ဩဪဿ])(?!်|့)'=>'​$1',
		);
