<?php
/**
 * @file ay/uni.php - Win Innwa to Ayar
 * @brief Win Innwa to Ayar
 * @defgroup win
 * @ingroup ayar
 */
 
/**
 * @ingroup win
 * @section wininnwa Win Innwa
 * Converting rules for Win Innwa to Ayar
 * @var array $conv_rules 
 * @ref unicode
 * @include ayar/win\ innwa-rules.php
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
 * @ingroup win
 * @section wininnwa Win Innwa
 * reorder Win Innwa to Ayar
 * @var array $order
 * 
 */
$order = array(
			'(ြ)([ုွ])([က-အ])'=>'$1$3$2',
			'([a-z0-9]+)ျ'=>'$1s',
			'([a-z0-9]+)ယ'=>'$1,',
			'([a-z0-9]+)ါ်'=>'$1:',
		);


