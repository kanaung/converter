<?php
/**
 * @file Ayar/Myanmar3-rules.php	Myanmar3 to Ayar rules.
 * @ingroup a_modules
 * 
 */

/**
 * Nothing to convert Unicode to Ayar
 * @var array $conv_rules No rules to convert for Ayar.
 * 
 */
$conv_rules = array();

/**
 * @var array $order Character ordering rules.
 */
$order = array(
			'([က-အ]္[က-အ])ြေ'=>'ေြ$1',
			'([က-အ]္[က-အ])ေ'=>'ေ$1',
			'([ျြွဲှ]+)(ေ)' => '$2$1',
			'င်္([က-အ])ေ'=>'ေ$1င်္',
			'([က-အ])(ေြ|ေ|ြ)' => '$2$1',
			'([က-အ])(င်္)([က-အ])' => '$1$3$2',
			'(ု)(ံ)' => '$2$1',
			'(့)(်)'=>'$2$1',

		);

