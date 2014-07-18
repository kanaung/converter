<?php
/**
 * @file Myanmar3/Ayar-rules.php	Ayar to Myanmar3  rules.
 * @ingroup m_modules
 * 
 */

 
/**
 * @var array $conv_rules Nothing to convert from Ayar to Unicode.
 */
$conv_rules = array ( );

/**
 * @var array $order Reorder Ayar to Unicode standard. 
 */
$order = array
(
	'ေ([က-အ])င်္' => 'င်္$1ေ',
	
	'(ေ)([က-အ၀၈၇])([ျြွဲှ္]+)?' => '$2$3$1',
	'ေြ([က-အ၀၈၇])' => '$1ြေ',
	'ြ([က-အ၀၈၇])' => '$1ြ',
	'ေ([က-အ၀၈၇])' => '$1ေ',
	'(ံ)(ု)' => '$2$1',
	'(်)(့)' => '$2$1',
	'([က-အ])([က-အ])(င်္)' => '$1$3$2',
	'' => '',
);
