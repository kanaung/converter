<?php
error_reporting(E_ALL);
class Converter {
		private $consonent = '\x{1000}-\x{1021}';
		private $ka_group = '\x{1000}-\x{1004}'; // ကဝဂ္
		private $sa_group = '\x{1005}-\x{100A}'; // စဝဂ္
		private $tta_group = '\x{100B}-\x{100F}'; // ဋဝဂ္
		private $ta_group = '\x{1010}-\x{1014}'; // တဝဂ္
		private $pa_group = '\x{1015}-\x{1019}'; // ပဝဂ္
		private $aa_group = '\x{101A}-\x{1021}'; // အဝဂ္
		private $first_group = '\x{1000}\x{1005}\x{100B}\x{1010}\x{1015}'; // ပထမ အကၡရာ ၅ လုံး
		private $sec_group = '\x{1001}\x{1006}\x{100C}\x{1011}\x{1016}'; // ဒုတိယ
		private $third_group = '\x{1002}\x{1007}\x{100D}\x{1012}\x{1017}'; // တတိယ
		private $fouth_group = '\x{1003}\x{1008}\x{100E}\x{1013}\x{1018}'; // စတၱဳထ
		private $fifth_group = '\x{1004}\x{1009}\x{100A}\x{100F}\x{1014}\x{1019}'; // ပဥၥမ
		private $exception_fr_aa = '__';
		private $tall_aa = '\x{1001}\x{1002}\x{1004}\x{1012}\x{1015}\x{101D}'; //ခ ဂ င ဒ ပ ဝ ေမာက္ခ်  (  ါ ) ျဖင့္ ေပါင္းရန္

		private $up_symbol_uni = '\x{102D}\x{102E}\x{1032}\x{1036}\x{103A}';
		private $kinzi_uni = '\x{1004}\x{103A}\x{1039}';
		private $up_symbol_zg = '\x{1039}\x{1064}\x{108B}-\x{108E}'; // အသတ္၊ ကင္းစီး ၊ ကင္းစီး လံုးၾကီးတင္ ၊ ကင္းစီး လံုးၾကီးတင္ ဆန္ခတ္၊ ကင္းစီး ေသးေသးတင္၊ လံုးၾကီးတင္ ေသးေသးတင္
		private $medial_uni = '\x{103B}-\x{103E}';
		private $medial_zg = '\x{103A}-\x{103D}\x{107D}-\x{1084}\x{108A}';
		private $medial_ra_zg = '\x{103B}\x{107E}-\x{1084}';
		private $medial_ya_zg = '\x{103A}\x{107D}';
		private $symbols = '\x{1023}-\x{1027}\x{1029}\x{102A}\x{104A}-\x{104F}';
		private $lower_zg = '\x{1033}\x{1034}\x{1060}-\x{1063}\x{1065}-\x{1069}\x{106C}\x{106D}\x{1070}-\x{107D}\x{1085}\x{1087}-\x{108A}\x{1093}';


	public function __construct()
		{
		mb_internal_encoding('UTF-8');
		require('./converter_array.php');
	}

	public function convert($text, $options = array('output'=>'uni', 'input_font'=>'','encoding'=>'','text-only'=>false,'exceptions'=>''))
		{
			$ay_uni = $this->ay_uni;
			$uni_ay = $this->uni_ay;
			$zg_uni = $this->ToUni;
			$zg_ay = $this->ToUni;
			$uni_zg = $this->ToZg;
			$ay_zg = $this->ToZg;
			$win_uni = $this->win_uni;
			$win_ay = $this->win_uni;
			$win_zg = $this->win_zg;
			$prf_uni = $this->prf_uni;
			$zg_correction = $this->zg_correction;
			$ay_correction = $this->ay_correction;
			$uni_correction = $this->uni_correction;
			$uni2zg_order = $this->uni2zg_order;
			$ay2zg_order = $this->ay2zg_order;
			$zg2uni_order = $this->zg2uni_order;
			$prf2uni_order = $this->prf2uni_order;
			$win2uni_order = $this->win2uni_order;
			$win2ay_order = $this->win2ay_order;
			$win2zg_order = $this->win2zg_order;
			$zg2ay_order = $this->zg2ay_order;
			$ay2uni_order = $this->ay2uni_order;
			$uni2ay_order = $this->uni2ay_order;
			$ay_zwsp = $this->ay_zwsp;
			$zg_zwsp = $this->zg_zwsp;
			$uni_zwsp = $this->uni_zwsp;

			foreach($options as $option_name  => $option_value){
				$$option_name = $option_value;
				//var_dump($$option_name);
				}
//die();
		if($input_font === '' || $input_font == 'auto'){
			$input = $this->enc_test($text);
			} else {
			$input = $input_font;
			}

			$output_correction = ${$output.'_correction'};
			$output_zwsp = ${$output.'_zwsp'};
			$input_output = ${$input.'_'.$output};
			$order = ${$input.'2'.$output.'_order'};

				if($input === $output){
					foreach (array_merge($output_correction, $output_zwsp) as $key => $value) {
						$final_text = preg_replace('/'.$key.'/u', $value, $text);
					}
				}else{
					if(isset($input_output)){
						if($encoding == 'ascii'){
							function trim_value(&$value)
							{
								$value = trim($value);
							}
							function ucwords_value(&$value)
							{
								$value = ucwords($value);
							}
							function space_on_short_words(&$value)
							{
								$value = preg_replace('/^[\d\w]{1,3}$/u',' $0 ',$value);
							}
							/* Output dictionary array from dictionary file */
/*
							$en_GB_dic = file('./dic/en_GB.dic', FILE_SKIP_EMPTY_LINES);
							$en_US_dic = file('./dic/en_US.dic', FILE_SKIP_EMPTY_LINES);
							$dic_file = array_merge($en_GB_dic,$en_US_dic);
							$dic_file_unique = array_unique($dic_file);
							//$dic_file_unique_ucwords = $dic_file_unique;
							array_walk($dic_file_unique, 'trim_value');
							array_walk($dic_file_unique, 'space_on_short_words');
							//array_walk($dic_file_unique_ucwords, 'ucwords_value');
							//array_walk($dic_file_unique_ucwords, 'trim_value');
							$dic_words = array_combine($dic_file_unique, $dic_file_unique);
							//$dic_ucwords = array_combine($dic_file_unique_ucwords, $dic_file_unique_ucwords);
							$dictionary = $dic_words;
							array_multisort($dictionary);
							$content = "<?php \n\$dictionary = array(";
							foreach($dictionary as $word){
									$content.= "\"$word\"=>\"$word\",\n";
								}
							$content.=");\n?>";
							//die($content);
							$output_file = './dic/dictionary_array.php';
									$af = fopen($output_file, 'w') or die("File is not writable or directory does not exist.");
									fwrite($af, $content);
									fclose($af);
							die();
*/
							//die(var_dump($english_words));

							if(isset($spelling_check) && false !== $spelling_check){
								$stripped_text = strip_tags($text);
								$paragraph = preg_split("/[\s,]+/s", $stripped_text);
								array_walk($paragraph, 'trim_value');
								$words_array = array_unique($paragraph);
								array_multisort($words_array);

								if(function_exists('enchant_broker_init')){
									$tag = 'en_US';
									$r = enchant_broker_init();
									$bprovides = enchant_broker_describe($r);
									$dicts = enchant_broker_list_dicts($r);
									if (enchant_broker_dict_exists($r,$tag)) {
										$d = enchant_broker_request_dict($r, $tag);
										$dprovides = enchant_dict_describe($d);
											foreach($words_array as $word){
												if( !empty($word) ){
													$wordcorrect = enchant_dict_check($d, $word);
													if ($wordcorrect) {
															$word = preg_replace('/^\d+$/u','"$0"',$word);
															$word = preg_replace('/^[\d\w]{1,3}$/u',' $0 ',$word);
															$english_words_array[$word] = $word;
													}
												}
											}


										enchant_broker_free_dict($d);
									}
									enchant_broker_free($r);


								}/*elseif(function_exists('pspell_check')){
									foreach($words_array as $word){
										if( !empty($word) ){

											}
									}
								}*/else{
									include('./dic/dictionary_array.php');

									array_walk($words_array, 'space_on_short_words');
									foreach($words_array as $word){
										if( !empty($word) ){
										$plural_ies = preg_match('/(\w+)(ies)|(\w+)(s)/', $word, $plural_match_ies);

											if(!empty($plural_match_ies)){
												array_walk($plural_match_ies, 'space_on_short_words');
												if($plural_match_ies[2] == ' ies '){
													$singular = $plural_match_ies[1].'y';
												}elseif($plural_match_ies[4] == ' s '){
													$singular = $plural_match_ies[3];
												}

												if( in_array($singular, $dictionary) || in_array(strtolower($singular), $dictionary)){
												$plural_array[$plural_match_ies[0]] = $plural_match_ies[0];
												}
											}

										if(in_array($word, $dictionary) || in_array(strtolower($word), $dictionary)){
											$english_words_array[$word] = $word;
											}
										}
									}
								}

							//	die(var_dump($english_words_array));
								$english_words = array();
								if(isset($english_words_array) && !empty($english_words_array)){
								$english_words = $english_words_array;
								}
								if(isset($plural_array) && !empty($plural_array)){
								$english_words = array_merge($english_words, $plural_array);
								}

								$english_words = array_unique($english_words);
								//die(var_dump($english_words));
							}

							$generated_array = array();
							if(true !== $text_only){
								preg_match_all('/<(.*)>/uU',$text, $html_tags);

								foreach($html_tags[0] as $html_tag){
									if(!empty($html_tag)){
									$generated_array[$html_tag] = $html_tag;
									}
								}

								preg_match_all('/<(style|script)(.*)<\/(style|script)>/uUs',$text, $script_tags);

								foreach($script_tags[0] as $script_tag){
									if(!empty($script_tag)){
									$generated_array[$script_tag] = $script_tag;
									}
								}
							}
							$user_content = "";
							if( isset($exceptions) ){
								//var_dump($exceptions);
								$exceps_array = explode(',',$exceptions);
								//die(var_dump($exceps_array));
								if(!empty($exceps_array)){

									foreach($exceps_array as $ignore_list){
										if( !empty($ignore_list) && mb_strlen($ignore_list) > 3 ){
										$generated_array[$ignore_list] = $ignore_list;
										$user_content .= "$ignore_list\n";
										}
									}
								}
								//die(var_dump($exceptions_array));
							}
									//die($user_content);
							if(isset($suggested) && true === $suggested){
								if( file_exists('./user/userdic.dic') ){
									$user_dic = file('./user/userdic.dic', FILE_SKIP_EMPTY_LINES);
									array_walk($user_dic,'trim_value');
									foreach($user_dic as $user_word){
										if(!empty($user_word)){
											$generated_array[$user_word] = $user_word;
											$user_content .= "$user_word\n";
										}
									}
								}
							}

								if(!empty($user_content)){
									//die(var_dump($user_content));
									$userdic_file = './user/userdic.dic';
									$uaf = fopen($userdic_file, 'w') or die("File is not writable or directory does not exist.");
											fwrite($uaf, $user_content);
											fclose($uaf);
								}
							//die(var_dump($generated_array));
							$conv_array = $input_output;
							if(!empty($generated_array)){
							$conv_array = array_merge($generated_array, $conv_array);
							}
							if(isset($english_words) && !empty($english_words)){
							$conv_array = array_merge($english_words, $conv_array);
							}
							//$conv_array = array_unique($conv_array);
						//die(var_dump($input_output));
						//var_dump($english_words);
						//die(var_dump($conv_array));
						$final_text = strtr($text, $conv_array);
						//die(var_dump($final_text));
						}else{
						$final_text = strtr($text, $input_output);
						}
						//die(var_dump($order));
						foreach (array_merge($order, $output_correction, $output_zwsp) as $key => $value) {
							$final_text = preg_replace('/'.$key.'/us', $value, $final_text);
						}
					}else{
						foreach (array_merge($output_correction, $output_zwsp) as $key => $value) {
							$final_text = preg_replace('/'.$key.'/us', $value, $text);
						}
					}

				}

/*$info = sprintf(
        " \nPage : %s\nHTML size : %d bytes\n ",
        $_SERVER['REQUEST_URI'],
        mb_strlen($final_text, 'UTF-8')
    );
    *
    * */

		$this->text = $final_text;
//	}
		return $this->text;
	}

	public function enc_test($text){
	$zg_preg = '/\x{1031}[\x{1047}\x{1048}\x{1040}]|[\x{1004}]\x{1039}|(\x{1031}[\x{103B}\x{107E}-\x{1084}])|([\x{107E}-\x{1084}]['.$this->consonent.'])|(?<=['.$this->consonent.'])[\x{1094}\x{1095}]|(?<=\x{1000})[\x{1060}\x{1061}]|(?<=\x{1002})[\x{1062}\x{1063}]|(?<=\x{1005})[\x{1065}\x{1066}\x{1067}]|(?<=\x{1007})[\x{1068}\x{1069}]|['.$this->consonent.']['.$this->lower_zg.']|(^[\x{1004}\x{1005}\x{1009}\x{100A}]x{103A})|(^['.$this->aa_group.$this->fifth_group.']\x{103D})/u';
	$uni_preg = '/\x{103C}[\x{1031}\x{102D}\x{102E}\x{102F}\x{1030}\x{103D}\x{103E}]|\x{1031}\x{1038}|\x{1031}['.$this->consonent.'][\x{102D}-\x{1030}\x{1032}]+|\x{1031}['.$this->consonent.']\x{103B}['.$this->consonent.']\x{103A}|\x{1031}$|\x{103C}$/u';
	$ay_preg = '/^\x{1031}|^\x{103C}|(\x{1031}\x{103C})|(\x{1031})['.$this->consonent.'](\x{1038})|(\x{1031}\x{103C})['.$this->consonent.']|(?<=\x{1031})['.$this->consonent.']|(?<!['.$this->consonent.'])\x{1031}/u';

		$length = mb_strlen($text, 'UTF-8');

		if( preg_match($zg_preg, $text, $m) ){
			$font_enc = 'zg';
			} elseif ( $length < 7 && preg_match($uni_preg, $text, $m) && !preg_match($ay_preg, $text, $m) ) {
			$font_enc = 'uni';
			} elseif ( preg_match($uni_preg, $text, $m) ) {
			$font_enc = 'uni';
			} elseif ( preg_match($ay_preg, $text, $m) ) {
			$font_enc = 'ay';
			} else {
			$font_enc = 'ay';
			}
		return $font_enc;
		}

}

?>
