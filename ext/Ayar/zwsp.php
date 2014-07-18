<?php
/**
 * @file Ayar/zwsp.php	 Zero-Width-Space for word break using Ayar fonts.
 * @ingroup a_modules
 * 
 */
/**
 * @var array $zwsp 
 * @brief add Zero-Width-Space for word break using Ayar fonts.
 */
$zwsp = array(
			'(?<!္|ြ|ေ)([ြေက-အဣ၎ဤ၌၍ဥဦဧ၏ဩဪဿ])(?!်)'=>'​$1',
		);

