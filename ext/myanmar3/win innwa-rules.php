<?php
/*
 * myanmar3/win innwa-rules.php - Win Innwa to Unicode conveting rules
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
 * @var array $conv_rules convert from Win Innwa to Unicode.
 */
$conv_rules = array(
			/*1st rows on keyboard*/
			'`'=>'ြ','0'=>'၀','1'=>'၁','2'=>'၂','3'=>'၃','4'=>'၄','5'=>'၅','6'=>'၆','7'=>'၇','8'=>'၈','9'=>'၉',
			/*2nd rows on keyboard*/
			'q'=>'ဆ','w'=>'တ','e'=>'န','r'=>'မ','t'=>'အ','y'=>'ပ','u'=>'က','i'=>'င','o'=>'သ','p'=>'စ','['=>'ဟ',']'=>'‘','\\'=>'၏',
			/*3rd rows on keyboard*/
			'a'=>'ေ','s'=>'ျ','d'=>'ိ','f'=>'်','g'=>'ါ','h'=>'့','j'=>'ြ','k'=>'ု','l'=>'ူ',';'=>'း','\''=>'ဒ',
			/*4th rows on keyboard*/
			'z'=>'ဖ','x'=>'ထ','c'=>'ခ','v'=>'လ','b'=>'ဘ','n'=>'ည','m'=>'ာ',','=>'ယ','/'=>'။',
			/*shift + 1st rows on keyboard*/
			'~'=>'ြ','!'=>'ဍ','@'=>'ဏ္ဍ','#'=>'ဋ','$'=>'ကျပ်','^'=>'/','&'=>'ရ','*'=>'ဂ','_'=>'x',
			/*shift + 2nd rows on keyboard*/
			'Q'=>'ျှ','W'=>'ျွှ','E'=>'န','R'=>'ျွ','T'=>'ွှ','Y'=>'့','U'=>'့','I'=>'ှု','O'=>'ဥ','P'=>'ဏ','{'=>'ဧ','}'=>'’','|'=>'ဋ္ဌ',
			/*shift + 3rd rows on keyboard*/
			'A'=>'ဗ','S'=>'ှ','D'=>'ီ','F'=>'င်္','G'=>'ွ','H'=>'ံ','J'=>'ဲ','K'=>'ု','L'=>'ူ',':'=>'ါ်','"'=>'ဓ',
			/*shift + 4th rows on keyboard*/
			'Z'=>'ဇ','X'=>'ဌ','C'=>'ဃ','V'=>'ဠ','B'=>'ြ','N'=>'ြ','M'=>'ြ','<'=>'ြွ','>'=>'ြွ','?'=>'၊',
			/*others*/
			'¡'=>'ဎ','¢'=>'္ဃ','£'=>'ဣ','¤'=>'၎','¥'=>'ဋ္ဋ','¦'=>'္ထ','§'=>'ှ','¨'=>'္ဓ','©'=>'္ခ','ª'=>'ှူ','«'=>'[','»'=>']',
			'¬'=>'္ထ','®'=>'္မ','²'=>'္ဌ','³'=>'္ဋ','´'=>'္ဒ','¹'=>'ဍ္ဎ','½'=>'ရ','¾'=>'္ဂ','Á'=>'္ဗ','Å'=>'္တ',
			'Æ'=>'္ဇ','Ç'=>'္ဘ','É'=>'္တွ','Í'=>'ဉ','Ð'=>'င်္ီ','Ñ'=>'္ဈ', 'Ó'=>'ဉာ','Ö'=>'္ဏ','×'=>'ဍ္ဍ','Ø'=>'င်္ိ','Ú'=>'ဉ','Ü'=>'္ပ',
			'ß'=>'ျ','ä'=>'္ဆ','å'=>'္တ','æ'=>'္ဖ','é'=>'္န','ê'=>'ြု','í'=>'၍','ð'=>'ိံ','ñ'=>'ည','ó'=>'ဿ','ö'=>'္စ',
			'ø'=>'င်္ံ','ú'=>'္က','û'=>'ြု','ü'=>'၌','þ'=>'ဤ','’'=>'္လ','µ'=>'!','¿'=>'?','ç'=>',','è'=>'__',
			'Š'=>'၃/၅','ƒ'=>'၁/၂','ˆ'=>'၁/၅','„'=>'၁/၃','†'=>'၁/၄','‡'=>'၃/၄','…'=>'၂/၃','‰'=>'၂/၅','‹'=>'၄/၅',
			'‚'=>'☎','À'=>'♦','Ã'=>'♣','à'=>'♥','ã'=>'♠','Â'=>'✓','><'=>'><','</'=>'</','&nbsp;'=>' ',

		);

/**
 * @var array $order Reorder Win Innwa to Unicode standard. 
 */
$order = array(
			'(ြွ)([က-အ])'=>'$2$1',
			'(ြု)([က-အ])'=>'$2$1',
			'(ြ)([က-အ])(္)?'=>'$2$3$1',
			'(ေ)([က-အ])(္)?'=>'$2$3$1',
			'(ေ)([က-အ])([ျြွှ]+)?'=>'$2$3$1',
			'(ံ)(ု)' => '$2$1',
			'(်)(့)'=>'$2$1',
			'(ဲ)(ွ)'=>'$2$1',
			'([က-အ])([က-အ])(င်္)' => '$1$3$2',
			'([က-အ])f'=>'$1်',
			'([a-z0-9]+)ျ'=>'$1s',
			'([a-z0-9]+)ယ'=>'$1,',
			'([a-z0-9]+)ါ်'=>'$1:',

		);
