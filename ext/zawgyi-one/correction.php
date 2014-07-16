<?php
/*
 * @copyright Copyright 2014 Sithu Thwin <sithu@thwin.net>
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
 
/*
 * @brief Zawgyi to Unicode correction array
 * @var array $correction Spelling and human error correction for Zawgyi-One font.
 */
$correction = array(
			'ဥ([္်ာ])'=>'ဉ$1',
			'၇([ိီုူှွဲြျ]+)'=>'ရ$1',
			'(ေ)၇([ိီုူှွဲြျ]+)?'=>'ရ$2$1',
			'၈([ိီုူှွဲြျ]+)'=>'ဂ$1',
			'(ေ)၈([ိီုူှွဲြျ]+)?'=>'ဂ$2$1',
			'၀([ိီုူှွဲြျ]+)'=>'ဝ$1',
			'(ေ)၀([ိီုူှွဲြျ]+)?'=>'ဝ$2$1',
			'၀([်ြွႊိီုဳူဴာါ္])'=>'ဝ$1',
			'၀([က-အ])(်)'=>'ဝ$1$2',
			'၇([်ြွႊိီုဳူဴာါ္])'=>'ရ$1',
			'၇([က-အ])(်)'=>'ရ$1$2',
			'၈([်ြွႊိီုဳူဴာါ္])'=>'ဂ$1',
			'၈([က-အ])(်)'=>'ဂ$1$2',
			'(^ျ)([ခဂငဒပဝ])ာ'=>'$1$2ါ',
			'([က-အ])(ြ)ါ'=>'$1$2ာ',
			'([ုူ])([ိီ])'=>'$2$1',
			'([ွှ])(ျ)'=>'$2$1',
			'(ှ)(ွ)'=>'$2$1',
			);
