<?php
/*
 * @package Win Innwa
 * 
 * @file ay/uni.php - Win Innwa to Zawgyi-One
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
 * @var array $conv_rules Converting rules for Win Innwa to Zawgyi-One
 */
$conv_rules = array(
			/*1st rows on keyboard*/
			'`'=>'ႁ','0'=>'၀','1'=>'၁','2'=>'၂','3'=>'၃','4'=>'၄','5'=>'၅','6'=>'၆','7'=>'၇','8'=>'၈','9'=>'၉',
			/*2nd rows on keyboard*/
			'q'=>'ဆ','w'=>'တ','e'=>'န','r'=>'မ','t'=>'အ','y'=>'ပ','u'=>'က','i'=>'င','o'=>'သ','p'=>'စ','['=>'ဟ',']'=>'‘','\\'=>'၏',
			/*3rd rows on keyboard*/
			'a'=>'ေ','s'=>'်','d'=>'ိ','f'=>'္','g'=>'ါ','h'=>'့','j'=>'ျ','k'=>'ု','l'=>'ူ',';'=>'း','\''=>'ဒ',
			/*4th rows on keyboard*/
			'z'=>'ဖ','x'=>'ထ','c'=>'ခ','v'=>'လ','b'=>'ဘ','n'=>'ည','m'=>'ာ',','=>'ယ','/'=>'။',
			/*shift + 1st rows on keyboard*/
			'~'=>'ႂ','!'=>'ဍ','@'=>'႑','#'=>'ဋ','$'=>'ကျပ်','^'=>'/','&'=>'ရ','*'=>'ဂ','_'=>'x',
			/*shift + 2nd rows on keyboard*/
			'Q'=>'်ွ','W'=>'်ြွ','E'=>'ႏ','R'=>'်ြ','T'=>'ြွ','Y'=>'႕','U'=>'႔','I'=>'ႈ','O'=>'ဥ','P'=>'ဏ','{'=>'ဧ','}'=>'’','|'=>'႒',
			/*shift + 3rd rows on keyboard*/
			'A'=>'ဗ','S'=>'ွ','D'=>'ီ','F'=>'ၤ','G'=>'ြ','H'=>'ံ','J'=>'ဲ','K'=>'ဳ','L'=>'ဴ',':'=>'ၚ','"'=>'ဓ',
			/*shift + 4th rows on keyboard*/
			'Z'=>'ဇ','X'=>'ဌ','C'=>'ဃ','V'=>'ဠ','B'=>'ႀ','N'=>'ၿ','M'=>'ၾ','<'=>'ႂြ','>'=>'ႁြ','?'=>'၊',
			/*others*/
			'¡'=>'ဎ','¢'=>'ၣ','£'=>'ဣ','¤'=>'၎','¥'=>'႗','¦'=>'ၴ','§'=>'ှ','¨'=>'္ဓ','©'=>'္ခ','ª'=>'ှူ','«'=>'[','»'=>']',
			'¬'=>'ၳ','®'=>'ၼ','²'=>'ၭ','³'=>'ၬ','´'=>'ၵ','¹'=>'ၯ','½'=>'႐','¾'=>'ၢ','Á'=>'ၺ','Å'=>'ၲ',
			'Æ'=>'ၨ','Ç'=>'႓','É'=>'႖','Í'=>'ၪ','Ð'=>'ႌ','Ñ'=>'ၩ', 'Ó'=>'ဉာ','Ö'=>'ၰ','×'=>'ၮ','Ø'=>'ႋ','Ú'=>'ဉ','Ü'=>'ၸ',
			'ß'=>'ၽ','ä'=>'ၦ','å'=>'ၱ','æ'=>'ၹ','é'=>'ၷ','ê'=>'ၾဳ','í'=>'၍','ð'=>'ႎ','ñ'=>'ၫ','ó'=>'ႆ','ö'=>'ၥ',
			'ø'=>'ႋ','ú'=>'ၠ','û'=>'ျဳ','ü'=>'၌','þ'=>'ဤ','’'=>'ႅ','µ'=>'!','¿'=>'?','ç'=>',','è'=>'__',
			'Š'=>'၃/၅','ƒ'=>'၁/၂','ˆ'=>'၁/၅','„'=>'၁/၃','†'=>'၁/၄','‡'=>'၃/၄','…'=>'၂/၃','‰'=>'၂/၅','‹'=>'၄/၅',
			'‚'=>'☎','À'=>'♦','Ã'=>'♣','à'=>'♥','ã'=>'♠','Â'=>'✓','><'=>'><','</'=>'</','&nbsp;'=>' ',

		);

/**
 * @var array $order reorder Win Innwa to Unicode standard
 */
$order = array(
			'([ြၾၿႀ])([ွုဳူဴ])([က-အ])'=>'$1$3$2',
			'([a-z0-9]+)်'=>'$1s',
			'([a-z0-9]+)ယ'=>'$1,',
			'([a-z0-9]+)ၚ'=>'$1:',
		);
?>

