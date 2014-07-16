<?php
/** @addtogroup ayar
 *  
 *  @{
 */
/**
 * @var array $zwsp 
 * @brief add Zero-Width-Space for word break using Ayar fonts
 */
$zwsp = array(
			'(?<!္|ြ|ေ)([ြေက-အဣ၎ဤ၌၍ဥဦဧ၏ဩဪဿ])(?!်)'=>'​$1',
		);
/** @} */ 
