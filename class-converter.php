<?php
/**
 * @file	class-converter.php
 * @brief	This is converter class file.
 * @author	Sithu Thwin(sithu@thwin.net)
 * @copyright 	Copyright 2014 Sithu Thwin <sithu@thwin.net> 
 * 
 * 				This program is free software; you can redistribute it and/or modify
 * 				it under the terms of the GNU General Public License as published by
 * 				the Free Software Foundation; either version 2 of the License, or
 * 				(at your option) any later version. 
 * 
 * 				This program is distributed in the hope that it will be useful,
 * 				but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 				MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 				GNU General Public License for more details. 
 * 
 * 				You should have received a copy of the GNU General Public License
 * 				along with this program; if not, write to the Free Software
 * 				Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * 				MA 02110-1301, USA.
 * 
 */

error_reporting ( E_ALL );

/**
 * @class Converter
 * @brief Converter class to convert from one encoding to another in different encoding of Myanmar language.
 */
class Converter {

	/**
	 * @var string $consonent	Myanmar consonent unicode string encoding in php syntax.
	 */
	private $consonent = '\x{1000}-\x{1021}';

	/**
	 * @var string $ka_group		Myanmar consonent(Ka Group) unicode string encoding in php syntax. 
	 */
	private $ka_group = '\x{1000}-\x{1004}';

	// ကဝဂ္
	/**
	 * @var string $sa_group		Myanmar consonent(Sa Group) unicode string encoding in php syntax. 
	 */
	private $sa_group = '\x{1005}-\x{100A}';

	// စဝဂ္
	/**
	 * @var string $tta_group	Myanmar consonent(Tta Group) unicode string encoding in php syntax.  
	 */
	private $tta_group = '\x{100B}-\x{100F}';

	// ဋဝဂ္
	/**
	 * @var string $ta_group		Myanmar consonent(Ta Group) unicode string encoding in php syntax.  
	 */
	private $ta_group = '\x{1010}-\x{1014}';

	// တဝဂ္
	/**
	 * @var string $pa_group		Myanmar consonent(Sa Group) unicode string encoding in php syntax. 
	 */
	private $pa_group = '\x{1015}-\x{1019}';

	// ပဝဂ္
	/**
	 * @var string $aa_group		Myanmar consonent(Aa Group) unicode string encoding in php syntax.  
	 */
	private $aa_group = '\x{101A}-\x{1021}';

	// အဝဂ္
	/**
	 * @var string $first_group		Myanmar consonent(First Group) unicode string encoding in php syntax.  
	 */
	private $first_group = '\x{1000}\x{1005}\x{100B}\x{1010}\x{1015}';

	// ပထမ အကၡရာ ၅ လုံး
	/**
	 * @var string $sec_group		Myanmar consonent(Second Group) unicode string encoding in php syntax.  
	 */
	private $sec_group = '\x{1001}\x{1006}\x{100C}\x{1011}\x{1016}';

	// ဒုတိယ
	/**
	 * @var string $third_group		Myanmar consonent(Third Group) unicode string encoding in php syntax. 
	 */
	private $third_group = '\x{1002}\x{1007}\x{100D}\x{1012}\x{1017}';

	// တတိယ
	/**
	 * @var string $fouth_group		Myanmar consonent(Fouth Group) unicode string encoding in php syntax. 
	 */
	private $fouth_group = '\x{1003}\x{1008}\x{100E}\x{1013}\x{1018}';

	// စတၱဳထ
	/**
	 * @var string $fifth_group		Myanmar consonent(Fifth Group) unicode string encoding in php syntax. 
	 */
	private $fifth_group = '\x{1004}\x{1009}\x{100A}\x{100F}\x{1014}\x{1019}';

	// ပဥၥမ
	/**
	 * @var $exception_fr_aa 
	 */
	private $exception_fr_aa = '__';

	/**
	 * @var string $tall_aa		Myanmar consonent attachable with tall AA vowel unicode string encoding in php syntax.  
	 */
	private $tall_aa = '\x{1001}\x{1002}\x{1004}\x{1012}\x{1015}\x{101D}';

	//ခ ဂ င ဒ ပ ဝ ေမာက္ခ်  (  ါ ) ျဖင့္ ေပါင္းရန္
	/**
	 * @var string $up_symbol_uni		Myanmar Vowel sign display above consonents unicode string encoding in php syntax. 
	 */
	private $up_symbol_uni = '\x{102D}\x{102E}\x{1032}\x{1036}\x{103A}';

	/**
	 * @var string $kinzi_uni		Myanmar consonent(Sa Group) unicode string encoding in php syntax. 
	 */
	private $kinzi_uni = '\x{1004}\x{103A}\x{1039}';

	/**
	 * @var $up_symbol_zg 
	 */
	private $up_symbol_zg = '\x{1039}\x{1064}\x{108B}-\x{108E}';

	// အသတ္၊ ကင္းစီး ၊ ကင္းစီး လံုးၾကီးတင္ ၊ ကင္းစီး လံုးၾကီးတင္ ဆန္ခတ္၊ ကင္းစီး ေသးေသးတင္၊ လံုးၾကီးတင္ ေသးေသးတင္
	/**
	 * @var $medial_uni 
	 */
	private $medial_uni = '\x{103B}-\x{103E}';

	/**
	 * @var $medial_zg 
	 */
	private $medial_zg = '\x{103A}-\x{103D}\x{107D}-\x{1084}\x{108A}';

	/**
	 * @var $medial_ra_zg 
	 */
	private $medial_ra_zg = '\x{103B}\x{107E}-\x{1084}';

	/**
	 * @var $medial_ya_zg 
	 */
	private $medial_ya_zg = '\x{103A}\x{107D}';

	/**
	 * @var $symbols 
	 */
	private $symbols = '\x{1023}-\x{1027}\x{1029}\x{102A}\x{104A}-\x{104F}';

	/**
	 * @var $lower_zg 
	 */
	private $lower_zg = '\x{1033}\x{1034}\x{1060}-\x{1063}\x{1065}-\x{1069}\x{106C}\x{106D}\x{1070}-\x{107D}\x{1085}\x{1087}-\x{108A}\x{1093}';

	/**
	 * @fn	__construct		
	 * @brief	Constructor function for Converter class.
	 */
	public function __construct ( ) {

		mb_internal_encoding ( 'UTF-8' );
	}

	/**
	 * @fn	convert
	 * @memberof Converter
	 * @brief	Public function to convert encoding of text contents.
	 * @param	$text	Source text content to convert.
	 * @param	$options	Options array
	 * 						Available Options -
	 * 							-# output (Output encoding - default is myanmar3)
	 * 							-# input_font (Input encoding)
	 * 							-# encoding (encoding type - ascii or utf8 - default is utf8 or none)
	 * 							-# text-only (Source content is plain text or other format such as html, php etc. - default is false)
	 * 							-# en_zwsp (enable or disable adding Zero-Width-Space in converted result.)
	 * 							-# exceptions (commas seperated list of words or phrase to ignore from conversion process.)
	 * 
	 * @returns	string $this->text	Return converted content.
	 */
	public function convert ( $text, $options = array
	(
		'output'     => 'myanmar3',
		'input_font' => '',
		'encoding'   => '',
		'text-only'  => false,
		'en_zwsp'    => true,
		'exceptions' => '',
	) ) {
		

		foreach ( $options as $option_name => $option_value )
		{
			$$option_name = $option_value;

			//extract $options and set $option_name as variable name and $option_value as variable value.
		}
		
		if ( $input_font === '' || $input_font == 'auto' )
		{

			/**
			 * @var $input 
			 */
			$input = $this -> enc_test ( $text );
		} else
		{

			/**
			 * @var $input 
			 */
			$input = $input_font;
		}

		/**
		 * @var $ext_dir 
		 */
		$ext_dir = 'ext/' .
			$output;

		/**
		 * @var $ext_file 
		 */
		$ext_file = $input .
			'-rules.php';
		

		if ( file_exists ( $ext_dir .
			'/' .
			$ext_file ) )
			{
				require ( $ext_dir .
				'/' .
				$ext_file );
			include ( $ext_dir .
				'/correction.php' );
			include ( $ext_dir .
				'/zwsp.php' );
		} else
		{
			die ( 'Fatal Error: Your converting rules file cannot be found!' );
		}
		
		if ( !isset ( $order ) )
		{

			/**
			 * @var $order 
			 */
			$order = array ( );

			//if $order is not defined, set it to empty array.
		}
		if ( $en_zwsp === true )
		{

			/**
			 * @var $final_regex_array 
			 */
			$final_regex_array = array_merge ( $order, $correction, $zwsp );

			//merge all defined regular expression arrays.
		} else
		{

			/**
			 * @var $final_regex_array 
			 */
			$final_regex_array = array_merge ( $order, $correction );

			//merge all defined regular expression arrays without zwsp array.
		}
		
		if ( $input === $output )
		{
			foreach ( $final_regex_array as $key => $value )
			{

				/**
				 * @var $final_text 
				 */
				$final_text = preg_replace ( '/' .
					$key .
					'/u', $value, $text );
			}
		} else
		{
			if ( isset ( $conv_rules ) )
			{
				if ( $encoding == 'ascii' )
				{

					/**
					 * @fn	trim_value
					 * @brief	
					 * @param	$value 
					 * @returns	
					 */
					function trim_value ( &$value ) {

						/**
						 * @var $value 
						 */
						$value = trim ( $value );
					}

					/**
					 * @fn	ucwords_value
					 * @brief	
					 * @param	$value 
					 * @returns	
					 */
					function ucwords_value ( &$value ) {

						/**
						 * @var $value 
						 */
						$value = ucwords ( $value );
					}

					/**
					 * @fn	space_on_short_words
					 * @brief	
					 * @param	$value 
					 * @returns	
					 */
					function space_on_short_words ( &$value ) {

						/**
						 * @var $value 
						 */
						$value = preg_replace ( '/^[\d\w]{1,3}$/u', ' $0 ', $value );
					}

					/* Output dictionary array from dictionary file */
					/*
												/**
												 * @var $en_GB_dic 
												 */
					$en_GB_dic = file ( './dic/en_GB.dic', FILE_SKIP_EMPTY_LINES );

					/**
					 * @var $en_US_dic 
					 */
					$en_US_dic = file ( './dic/en_US.dic', FILE_SKIP_EMPTY_LINES );

					/**
					 * @var $dic_file 
					 */
					$dic_file = array_merge ( $en_GB_dic, $en_US_dic );

					/**
					 * @var $dic_file_unique 
					 */
					$dic_file_unique = array_unique ( $dic_file );

					//$dic_file_unique_ucwords = $dic_file_unique;
					array_walk ( $dic_file_unique, 'trim_value' );
					array_walk ( $dic_file_unique, 'space_on_short_words' );

					//array_walk($dic_file_unique_ucwords, 'ucwords_value');
					//array_walk($dic_file_unique_ucwords, 'trim_value');
					/**
					 * @var $dic_words 
					 */
					$dic_words = array_combine ( $dic_file_unique, $dic_file_unique );

					//$dic_ucwords = array_combine($dic_file_unique_ucwords, $dic_file_unique_ucwords);
					/**
					 * @var $dictionary 
					 */
					$dictionary = $dic_words;
					array_multisort ( $dictionary );

					/**
					 * @var $content 
					 */
					$content = "<?php \n$dictionary = array(";
					foreach ( $dictionary as $word )
					{
						$content .= "\"$word\"=>\"$word\",\n";
					}
					$content .= ");\n?>";

					//die($content);
					/**
					 * @var $output_file 
					 */
					$output_file = './dic/dictionary_array.php';

					/**
					 * @var $af 
					 */
					$af = fopen ( $output_file, 'w' ) or die ( "File is not writable or directory does not exist." );
					fwrite ( $af, $content );
					fclose ( $af );
					//die ( );

					//die(var_dump($english_words));
					if ( isset ( $spelling_check ) && false !== $spelling_check )
					{

						/**
						 * @var $stripped_text 
						 */
						$stripped_text = strip_tags ( $text );

						/**
						 * @var $paragraph 
						 */
						$paragraph = preg_split ( "/[\s,]+/s", $stripped_text );
						array_walk ( $paragraph, 'trim_value' );

						/**
						 * @var $words_array 
						 */
						$words_array = array_unique ( $paragraph );
						array_multisort ( $words_array );
						
						if ( function_exists ( 'enchant_broker_init' ) )
						{

							/**
							 * @var $tag 
							 */
							$tag = 'en_US';

							/**
							 * @var $r 
							 */
							$r = enchant_broker_init ( );

							/**
							 * @var $bprovides 
							 */
							$bprovides = enchant_broker_describe ( $r );

							/**
							 * @var $dicts 
							 */
							$dicts = enchant_broker_list_dicts ( $r );
							if ( enchant_broker_dict_exists ( $r, $tag ) )
							{

								/**
								 * @var $d 
								 */
								$d = enchant_broker_request_dict ( $r, $tag );

								/**
								 * @var $dprovides 
								 */
								$dprovides = enchant_dict_describe ( $d );
								foreach ( $words_array as $word )
								{
									if ( !empty ( $word ) )
									{

										/**
										 * @var $wordcorrect 
										 */
										$wordcorrect = enchant_dict_check ( $d, $word );
										if ( $wordcorrect )
										{

											/**
											 * @var $word 
											 */
											$word = preg_replace ( '/^\d+$/u', '"$0"', $word );

											/**
											 * @var $word 
											 */
											$word = preg_replace ( '/^[\d\w]{1,3}$/u', ' $0 ', $word );
											$english_words_array[$word] = $word;
										}
									}
								}
								

								enchant_broker_free_dict ( $d );
							}
							enchant_broker_free ( $r );
						} else
						{
							include ( './dic/dictionary_array.php' );
							
							array_walk ( $words_array, 'space_on_short_words' );
							foreach ( $words_array as $word )
							{
								if ( !empty ( $word ) )
								{

									/**
									 * @var $plural_ies 
									 */
									$plural_ies = preg_match ( '/(\w+)(ies)|(\w+)(s)/', $word, $plural_match_ies );
									
									if ( !empty ( $plural_match_ies ) )
									{
										array_walk ( $plural_match_ies, 'space_on_short_words' );
										if ( $plural_match_ies[2] == ' ies ' )
										{

											/**
											 * @var $singular 
											 */
											$singular = $plural_match_ies[1] .
												'y';
										} elseif ( $plural_match_ies[4] == ' s ' )
										{

											/**
											 * @var $singular 
											 */
											$singular = $plural_match_ies[3];
										}
										
										if ( in_array ( $singular, $dictionary ) || in_array ( strtolower ( $singular ), $dictionary ) )
										{
											$plural_array[$plural_match_ies[0]] = $plural_match_ies[0];
										}
									}
									
									if ( in_array ( $word, $dictionary ) || in_array ( strtolower ( $word ), $dictionary ) )
									{
										$english_words_array[$word] = $word;
									}
								}
							}
						}

						/**
						 * @var $english_words 
						 */
						$english_words = array ( );
						if ( isset ( $english_words_array ) && !empty ( $english_words_array ) )
						{

							/**
							 * @var $english_words 
							 */
							$english_words = $english_words_array;
						}
						if ( isset ( $plural_array ) && !empty ( $plural_array ) )
						{

							/**
							 * @var $english_words 
							 */
							$english_words = array_merge ( $english_words, $plural_array );
						}

						/**
						 * @var $english_words 
						 */
						$english_words = array_unique ( $english_words );
					}

					/**
					 * @var $generated_array 
					 */
					$generated_array = array ( );
					if ( true !== $text_only )
					{
						preg_match_all ( '/<(.*)>/uU', $text, $html_tags );
						
						foreach ( $html_tags[0] as $html_tag )
						{
							if ( !empty ( $html_tag ) )
							{
								$generated_array[$html_tag] = $html_tag;
							}
						}
						
						preg_match_all ( '/<(style|script)(.*)<\/(style|script)>/uUs', $text, $script_tags );
						
						foreach ( $script_tags[0] as $script_tag )
						{
							if ( !empty ( $script_tag ) )
							{
								$generated_array[$script_tag] = $script_tag;
							}
						}
					}

					/**
					 * @var $user_content_array 
					 */
					$user_content_array = array ( );
					if ( isset ( $exceptions ) )
					{

						/**
						 * @var $exceps_array 
						 */
						$exceps_array = explode ( ',', $exceptions );
						
						if ( !empty ( $exceps_array ) )
						{
							
							foreach ( $exceps_array as $ignore_list )
							{
								if ( !empty ( $ignore_list ) && strlen ( $ignore_list ) > 4 )
								{
									$generated_array[$ignore_list] = $ignore_list;
									$user_content_array[] = $ignore_list;
								}
							}
						}
					}
					if ( isset ( $suggested ) && true === $suggested )
					{
						if ( file_exists ( './user/userdic.dic' ) )
						{

							/**
							 * @var $user_dic 
							 */
							$user_dic = file ( './user/userdic.dic', FILE_SKIP_EMPTY_LINES );
							array_walk ( $user_dic, 'trim_value' );
							foreach ( $user_dic as $user_word )
							{
								if ( !empty ( $user_word ) )
								{
									$generated_array[$user_word] = $user_word;
									$user_content_array[] = $user_word;
								}
							}
						}
					}
					
					if ( !empty ( $user_content_array ) )
					{

						/**
						 * @var $user_content 
						 */
						$user_content = "";
						array_walk ( $user_content_array, 'trim_value' );
						asort ( $user_content_array );

						/**
						 * @var $user_content_array 
						 */
						$user_content_array = array_unique ( $user_content_array );
						foreach ( $user_content_array as $phrase )
						{
							$user_content .= "$phrase\n";
						}

						/**
						 * @var $userdic_file 
						 */
						$userdic_file = './user/userdic.dic';

						/**
						 * @var $uaf 
						 */
						$uaf = fopen ( $userdic_file, 'w' ) or die ( "File is not writable or directory does not exist." );
						fwrite ( $uaf, $user_content );
						fclose ( $uaf );
					}

					/**
					 * @var $conv_array 
					 */
					$conv_array = $conv_rules;
					if ( !empty ( $generated_array ) )
					{

						/**
						 * @var $conv_array 
						 */
						$conv_array = array_merge ( $generated_array, $conv_array );
					}
					if ( isset ( $english_words ) && !empty ( $english_words ) )
					{

						/**
						 * @var $conv_array 
						 */
						$conv_array = array_merge ( $english_words, $conv_array );
					}

					/**
					 * @var $final_text 
					 */
					$final_text = strtr ( $text, $conv_array );
				} else
				{

					/**
					 * @var $final_text 
					 */
					$final_text = strtr ( $text, $conv_rules );
				}
				foreach ( array_merge ( $order, $correction, $zwsp ) as $key => $value )
				{

					/**
					 * @var $final_text 
					 */
					$final_text = preg_replace ( '/' .
						$key .
						'/us', $value, $final_text );
				}
			} else
			{
				foreach ( $final_regex_array as $key => $value )
				{

					/**
					 * @var $final_text 
					 */
					$final_text = preg_replace ( '/' .
						$key .
						'/us', $value, $text );
				}
			}
		}

		/**
		 * @var $text 
		 */
		$this -> text = $final_text;
		return $this -> text;
	}

	/**
	 * @fn	enc_test
	 * @brief	
	 * @param	$text 
	 * @returns	
	 */
	public function enc_test ( $text ) {

		/**
		 * @var $zg_preg 
		 */
		$zg_preg = '/\x{1031}[\x{1047}\x{1048}\x{1040}]|[\x{1004}]\x{1039}|(\x{1031}[\x{103B}\x{107E}-\x{1084}])|([\x{107E}-\x{1084}][' .
			$this -> consonent .
			'])|(?<=[' .
			$this -> consonent .
			'])[\x{1094}\x{1095}]|(?<=\x{1000})[\x{1060}\x{1061}]|(?<=\x{1002})[\x{1062}\x{1063}]|(?<=\x{1005})[\x{1065}\x{1066}\x{1067}]|(?<=\x{1007})[\x{1068}\x{1069}]|[' .
			$this -> consonent .
			'][' .
			$this -> lower_zg .
			']|(^[\x{1004}\x{1005}\x{1009}\x{100A}]x{103A})|(^[' .
			$this -> aa_group .
			$this -> fifth_group .
			']\x{103D})/u';

		/**
		 * @var $uni_preg 
		 */
		$uni_preg = '/\x{103C}[\x{1031}\x{102D}\x{102E}\x{102F}\x{1030}\x{103D}\x{103E}]|\x{1031}\x{1038}|\x{1031}[' .
			$this -> consonent .
			'][\x{102D}-\x{1030}\x{1032}]+|\x{1031}[' .
			$this -> consonent .
			']\x{103B}[' .
			$this -> consonent .
			']\x{103A}|\x{1031}$|\x{103C}$/u';

		/**
		 * @var $ay_preg 
		 */
		$ay_preg = '/^\x{1031}|^\x{103C}|(\x{1031}\x{103C})|(\x{1031})[' .
			$this -> consonent .
			'](\x{1038})|(\x{1031}\x{103C})[' .
			$this -> consonent .
			']|(?<=\x{1031})[' .
			$this -> consonent .
			']|(?<![' .
			$this -> consonent .
			'])\x{1031}/u';

		/**
		 * @var $length 
		 */
		$length = mb_strlen ( $text, 'UTF-8' );
		
		if ( preg_match ( $zg_preg, $text, $m ) )
		{

			/**
			 * @var $font_enc 
			 */
			$font_enc = 'zg';
		} elseif ( $length < 7 && preg_match ( $uni_preg, $text, $m ) && !preg_match ( $ay_preg, $text, $m ) )
		{

			/**
			 * @var $font_enc 
			 */
			$font_enc = 'uni';
		} elseif ( preg_match ( $uni_preg, $text, $m ) )
		{

			/**
			 * @var $font_enc 
			 */
			$font_enc = 'uni';
		} elseif ( preg_match ( $ay_preg, $text, $m ) )
		{

			/**
			 * @var $font_enc 
			 */
			$font_enc = 'ay';
		} else
		{

			/**
			 * @var $font_enc 
			 */
			$font_enc = 'ay';
		}
		return $font_enc;
	}
}

?>
