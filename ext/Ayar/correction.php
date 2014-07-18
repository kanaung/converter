<?php
/**
 * @file Ayar/correction.php Correction rules file for Ayar.
 * @ingroup a_modules
 * 
 */

/**
 * @brief Spelling and human error correction for Ayar fonts.
 * @var array $correction Correction rules for Ayar fonts.
 * @ingroup a_modules
 */
$correction = array(
			'ဥ([္်ာ])'=>'ဉ$1',
			'(?<![၀-၉])၇(?![၀-၉])' => 'ရ',
			'(?<![၀-၉])၈(?![၀-၉])' => 'ဂ',
			'(?<![၀-၉])၀(?![၀-၉])' => 'ဝ',
			'(?<![ေြ])(?<=[ခဂငဒပဝ])ာ' => 'ါ',
			'([ုူ])([ိီ])'=>'$2$1',
			'([ွှ])(ျ)'=>'$2$1',
			'(ှ)(ွ)'=>'$2$1',
			);

