<?php
/*
 * ay.php - Ayar to Unicode conveting rules
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
 * @var array $conv_rules Nothing to convert from Ayar to Unicode.
 */
$conv_rules = array();

/**
 * @var array $order Reorder Ayar to Unicode standard. 
 */
$order = array(
			'(ြ)([က-အ])(္)'=>'$2$3$1',
			'(ေ)([က-အ])(္)'=>'$2$3$1',
			'ေ([က-အ])င်္'=>'င်္$1ေ',
			'(ေ)([က-အ])([ျြွဲှ္]+)?'=>'$2$3$1',
			'ေြ([က-အ])'=>'$1ြေ',
			'ြ([က-အ])'=>'$1ြ',
			'(ံ)(ု)' => '$2$1',
			'(်)(့)'=>'$2$1',
			'([က-အ])([က-အ])(င်္)' => '$1$3$2',
		);
