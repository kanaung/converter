<?php
/**
 * @file Myanmar3/NLD1-rules-ascii.php	NLD1 to Unicode conveting rules.
 * @ingroup m_modules
 * 
 */

 

/**
 * @var array $conv_rules convert from NLD1 to Unicode.
 */
$conv_rules = array(
			'!'=>'ဍ',
			'"'=>'ဓ',
			'#'=>'ဋ',
			'&'=>'ရ',
			'\''=>'ဒ',
			'*'=>'ဂ',
			','=>'ယ',
			'/'=>'။',
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
			'<'=>'ြွ',
			'='=>'=',
			'>'=>'ြွ',
			'?'=>'၊',
			'@'=>'ဏ္ဍ',
			'A'=>'ဗ',
			'B'=>'ြ',
			'C'=>'ဃ',
			'D'=>'ီ',
			'E'=>'န',
			'F'=>'င်္',
			'G'=>'ွ',
			'H'=>'ံ',
			'i'=>'ှု',
			'J'=>'ဲ',
			'K'=>'ု',
			'L'=>'ူ',
			'M'=>'ြ',
			'N'=>'ြ',
			'O'=>'ဥ',
			'P'=>'ဏ',
			'Q'=>'ျှ',
			'R'=>'ျွ',
			'S'=>'ှ',
			'T'=>'ွှ',
			'U'=>'့',
			'V'=>'ဠ',
			'W'=>'ျွှ',
			'X'=>'ဌ',
			'Y'=>'့',
			'Z'=>'ဇ',
			'['=>'ဟ',
			'\\'=>'\'',
			'^'=>'/',
			'_'=>'x',
			'`'=>'ြန္ဒ',
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
			'|'=>'ဋ္ဌ',
			'}'=>'’',
			']'=>'‘',
			'~'=>'့',
			'¡'=>'ဎ',
			'¢'=>'ဂ္ဃ',
			'£'=>'ဣ',
			'¤'=>'၎',
			'¥'=>'ဋ္ဋ',
			'¦'=>'န္ထ',
			'§'=>'ှ',
			'¨'=>'္ဓ',
			'©'=>'္ခ',
			'ª'=>'ူ့',
			'«'=>'[',
			'¬'=>'္ထ',
			'®'=>'္မ',
			'¯'=>'င်္ါ',
			'²'=>'ဏ္ဌ',
			'³'=>'္ဋ',
			'´'=>'္ဒ',
			'µ'=>'!',
			'¶'=>'ဖွံ့',
			'·'=>'္ဎ',
			'¹'=>'ဍ္ဎ',
			'»'=>']',
			'¼'=>'-',
			'½'=>'ရ',
			'¾'=>'္ဂ',
			'¿'=>'?',
			'À'=>'ည့',
			'Á'=>'္ဗ',
			'Ä'=>'*',
			'Å'=>'န္တ',
			'Æ'=>'္ဇ',
			'Ç'=>'မ္ဘ',
			'È'=>'ှူ',
			'É'=>'ဉ္ဇ',
			'Í'=>'ဉ္စ',
			'Ð'=>'င်္ီ',
			'Ñ'=>'္ဈ',
			'Ó'=>'ဉာ',
			'Ö'=>'ဏ္ဏ',
			'×'=>'ဍ္ဍ',
			'Ø'=>'င်္ိ',
			'Ú'=>'ဉ',
			'Ü'=>'္ပ',
			'à'=>'ြမွှ',
			'á'=>'ရူ',
			'â'=>'ရှု',
			'ä'=>'စ္ဆ',
			'å'=>'္တ',
			'æ'=>'္ဖ',
			'ç'=>',',
			'è'=>'ရှ',
			'é'=>'္န',
			'ê'=>'ြင',
			'í'=>'၍',
			'ï'=>'ရု',
			'ð'=>'ိ့',
			'ñ'=>'ည',
			'ò'=>'ညွှ',
			'ó'=>'ဿ',
			'ö'=>'္စ',
			'ø'=>'င်္ံ',
			'ú'=>'္က',
			'û'=>'ြင',
			'ü'=>'၌',
			'þ'=>'ဤ',
			'’'=>'္လ',
			'I'=>'ှု',
			'>>>'=>'>>>',
		);

/**
 * @var array $order Reorder NLD1 to Unicode standard. 
 */
$order = array(
			'(ြ)([က-အ])(္)?'=>'$2$3$1',
			'(ေ)([က-အ])(္)?'=>'$2$3$1',
			'(ေ)([က-အ])([ျြွှ]+)?'=>'$2$3$1',
			'(ံ)(ု)' => '$2$1',
			'(်)(့)'=>'$2$1',
			'(ဲ)(ွ)'=>'$2$1',
			'(ိ)(ှ)'=>'$2$1',
			'([က-အ])([က-အ])(င်္)' => '$1$3$2',
			'([က-အ])f'=>'$1်',
			'([a-z0-9]+)ျ'=>'$1s',
			'([a-z0-9]+)ယ'=>'$1,',
			'([a-z0-9]+)ါ်'=>'$1:',
		);