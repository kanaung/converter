<?php
/*
 * @package Zawgyi-One
 * 
 * @file uni/zg.php - Zawgyi-One to Unicode
 * 
 * Copyright 2014 Sithu Thwin <sithu@thwin.net>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 */


/**
 * @var array $conv_rules Zawgyi-One to Unicode.
 */
$conv_rules = array(
			'ဳ' => 'ု',
			'ဴ' => 'ူ',
			'္' => '်',
			'်' => 'ျ',
			'ျ' => 'ြ',
			'ြ' => 'ွ',
			'ွ' => 'ှ',
			'ၚ' => 'ါ်',
			'ၠ' => '္က',
			'ၡ' => '္ခ',
			'ၢ' => '္ဂ',
			'ၣ' => '္ဃ',
			'ၤ' => 'င်္',
			'ၥ' => '္စ',
			'ၦ' => '္ဆ',
			'ၧ' => '္ဆ',
			'ၨ' => '္ဇ',
			'ၩ' => '္ဈ',
			'ၪ' => 'ဉ',
			'ၫ' => 'ည',
			'ၬ' => '္ဋ',
			'ၭ' => '္ဌ',
			'ၮ' => 'ဍ္ဍ',
			'ၯ' => 'ဍ္ဎ',
			'ၰ' => '္ဏ',
			'ၱ' => '္တ',
			'ၲ' => '္တ',
			'ၳ' => '္ထ',
			'ၴ' => '္ထ',
			'ၵ' => '္ဒ',
			'ၶ' => '္ဓ',
			'ၷ' => '္န',
			'ၷ' => '္ပ',
			'ၹ' => '္ဖ',
			'ၺ' => '္ဗ',
			'ၻ' => '္ဘ',
			'ၼ' => '္မ',
			'ၽ' => 'ျ',
			'ၾ' => 'ြ',
			'ၿ' => 'ြ',
			'ႀ' => 'ြ',
			'ႁ' => 'ြ',
			'ႂ' => 'ြ',
			'ႃ' => 'ြ',
			'ႄ' => 'ြ',
			'ႅ' => '္လ',
			'ႆ' => 'ဿ',
			'ႇ' => 'ှ',
			'ႈ' => 'ှု',
			'ႉ' => 'ှူ',
			'ႊ' => 'ွှ',
			'ႏ' => 'န',
			'႐' => 'ရ',
			'႑' => 'ဏ္ဍ',
			'႒' => 'ဋ္ဌ',
			'႓' => '္ဘ',
			'႔' => '့',
			'႕' => '့',
			'႗' => 'ဋ္ဋ',
			'၈ၤ'=>'ဂင်္',
			'ဧ။္'=>'၏',
			'၄​င္း'=>'၎င်း',
			'၎'=>'၎င်း',
			'၎င္း'=>'၎င်း',
			'ေ၀' => 'ေဝ',
			'ေ၇' => 'ေရ',
			'ေ၈'=>'ေဂ',
			'စ်'=>'ဈ',
			'ဥ​ာ'=>'ဉာ​',
			'ဥ​္'=>'ဉ်',
			'ၾသ'=>'ဩ',
			'ေၾသာ္'=>'ဪ',
		);
		

/**
 * @var array $order reorder Zawgyi-One to Unicode standard. 
 */
$order = array(
			'(ြ)([က-အ])'=>'$2$1',
			'ေ([က-အ])င်္'=>'င်္$1ေ',
			'(ေ)([က-အ])([ျြွဲှ]+)?'=>'$2$3$1',
			'(ံ)(ု)' => '$2$1',
			'(်)(့)'=>'$2$1',
			'([က-အ])([က-အ])(င်္)' => '$1$3$2'
		);
?>

