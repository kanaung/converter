<?php
/**
 * @file ay/uni.php - Unicode to Ayar
 * @brief Unicode to Ayar
 * @defgroup unicode
 * @ingroup ayar
 */

/**
 * @ingroup unicode
 * Nothing to convert Unicode to Ayar
 * @var array $conv_rules 
 * 
 */
$conv_rules = array();

/**
 * @ingroup unicode
 * @section unicode Unicode
 * reorder Unicode standard to Ayar
 * @var array $order 
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

