<?php
/*
 * @file ayar/m-myanmar1-rules.php - NLD1 to Unicode conveting rules
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
 * 
 */
 

/**
 * @var array $conv_rules convert from m-myanmar1 to Unicode.
 */
$conv_rules = array(
			'!'=>'ဏ္ဌ',
			'"'=>'ဓ',
			'#'=>'ဏ္ဏ',
			'$'=>'မ္ပ',
			'%'=>'ဇ္ဇ',
			'&'=>'ရ',
			'\''=>'ဒ',
			'*'=>'ဂ',
			'+'=>'ဏ',
			','=>'ယ',
			'-'=>'ြ',
			'.'=>'၏',
			'/'=>'၊',
			'0'=>'၀',
			'1'=>'၁',
			'2'=>'၂',
			'3'=>'၃',
			'4'=>'၄',
			'5'=>'၅',
			'6'=>'၆',
			'7'=>'၇',
			'8'=>'၈',
			'9'=>'၉',
			':'=>'ါ်',
			';'=>'း',
			'<'=>'ဒ္ဓ',
			'='=>'ှု',
			'>'=>'စ္ဆ',
			'?'=>'။',
			'@'=>'ဏ္ဍ',
			'A'=>'ဗ',
			'B'=>'မ္ဘ',
			'C'=>'ဂ္ဂ',
			'D'=>'ီ',
			'E'=>'န',
			'F'=>'ွှ',
			'G'=>'ွ',
			'H'=>'ံ',
			'I'=>'၍',
			'J'=>'ဲ',
			'K'=>'ု',
			'L'=>'ူ',
			'M'=>'န္တ',
			'N'=>'န္ဒ',
			'O'=>'ဥ',
			'P'=>'စ္စ',
			'Q'=>'က္ခ',
			'R'=>'မ္မ',
			'S'=>'ှ',
			'T'=>'ဤ',
			'U'=>'က္က',
			'V'=>'ဥ္စ',
			'W'=>'တ္တ',
			'X'=>'ဌ',
			'Y'=>'၌',
			'Z'=>'ဇ',
			'['=>'ဟ',
			'\\'=>'့',
			']'=>'ဒ္ဒ',
			'^'=>'၇',
			'_'=>'ပ္ပ',
			'`'=>'ျွ',
			'a'=>'ေ',
			'b'=>'ဘ',
			'c'=>'ခ',
			'd'=>'ိ',
			'e'=>'န',
			'f'=>'်',
			'g'=>'ါ',
			'h'=>'့',
			'i'=>'င',
			'j'=>'ြ',
			'k'=>'ု',
			'l'=>'ူ',
			'm'=>'ာ',
			'n'=>'ည',
			'o'=>'သ',
			'p'=>'စ',
			'q'=>'ဆ',
			'r'=>'မ',
			's'=>'ျ',
			't'=>'အ',
			'u'=>'က',
			'v'=>'လ',
			'w'=>'တ',
			'x'=>'ထ',
			'y'=>'ပ',
			'z'=>'ဖ',
			'{'=>'ဧ',
			'|'=>'ှ',
			'}'=>'ဋ္ဌ',
			'~'=>'ျှ',
			'„'=>'​-',
			'…'=>'​…',
			'†'=>'ဣ',
			'‡'=>'င်္',
			'ˆ'=>'င်္ီ',
			'Š'=>'င်္ံ',
			'‹'=>'င်္ိ',
			'Œ'=>'ှူ',
			'‘'=>'‘',
			'’'=>'’',
			'©'=>'္ခ',
			'“'=>'ဋ္ဋ',
			'”'=>'ဍ္ဍ',
			'•'=>'ဃ',
			'–'=>'ဠ',
			'—'=>'ဉ',
			'˜'=>'ဎ',
			'™'=>'ဋ',
			'š'=>'တ္ထ',
			'›'=>'၎',
			'œ'=>'လ္လ',
			' '=>' ',
			'¡'=>'ဍ',
			'¢'=>'ဥ္ဇ',
			'£'=>'ပ္ဖ',
			'¤'=>'ဗ္ဗ',
			'¦'=>'ဟ္မ',
			'§'=>'+',
			'¨'=>'မ္ဖ',
			'©'=>'ဿ',
			'ª'=>'န္ထ',
			'«'=>'ဇ္ဈ',
			'®'=>'င်္',
			'±'=>'.',
			'²'=>'/',
			'³'=>'န္န',
			'´'=>'ဍ္ဎ',
			'µ'=>'ဥ္ဈ',
			'¶'=>'န္ဓ',
			'· ∙'=>'-',
			'¸'=>'ဗ္ဘ',
			'¹'=>'ျ',
			'º'=>'မ္ဗ',
			'Ã'=>'န္တွ',
			'Ä'=>'ဏ္ဋ',
			'Å'=>'ဉ္ဆ',
			'Æ'=>'သ္မ',
			'Ç'=>'÷',
			'È'=>'{',
			'É'=>'}',
			'Ó'=>'=',
			'Ô'=>'[',
			'Õ'=>']',
			'Ö'=>'*',
			'×'=>'+',
			'Ø'=>'{',
			'Ù'=>'}',
			'Ú'=>'/',
		);

/**
 * @var array $order Reorder m-myanmar1 to Unicode standard. 
 */
$order = array(
			'([^၀-၉])၇([^၀-၉])?'=>'$1ရ$2',
			'([a-z0-9]+)ျ'=>'$1s',
			'([a-z0-9]+)ယ'=>'$1,',
			'([a-z0-9]+)ါ်'=>'$1:',
		);
