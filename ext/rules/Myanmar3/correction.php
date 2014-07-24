<?php
/**
 * @file Myanmar3/correction.php Correction rules file for Myanmar3.
 * @ingroup m_modules
 * 
 */

 
/**
 * @var array $correction Spelling and human error correction for Unicode fonts.
 * @ingroup m_modules
 */
$correction = array(
			'ဥ([္်ာ])'=>'ဉ$1',
			'(?<![၀-၉])၇(?![၀-၉၊။])' => 'ရ',
			'(?<![၀-၉])၈(?![၀-၉၊။])' => 'ဂ',
			'(?<![၀-၉])၀(?![၀-၉၊။])' => 'ဝ',
			//'(?<=(?<!ြ)[ခဂငဒပဝ])ာ' => 'ါ',
			'(?<=[ခဂငဒပဝ](?<!ြ|ြေ ))ာ' => 'ါ',
			'(?<=[^္][ခဂငဒပဝ]ေ)ာ' => 'ါ',
			//'([က-အ])(ြ)ါ'=>'$1$2ာ',
			'([က-အ])င်္(?![က-အ])' => 'င်္$1',
			
			);
