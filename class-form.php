<?php
/**
 * @file	class-form.php
 * @brief	This is form submitting class file.
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
/**
 * @class FormSubmit
 * @brief form submit processing class.
 */
class FormSubmit{

	/**
	 * @var $file_array 
	 */
	private $file_array;
	/**
	 * @var $post_array 
	 */
	private $post_array;
	/**
	 * @var $filename 
	 */
	private $filename;
	/**
	 * @var $upload_error 
	 */
	private $upload_error;
	/**
	 * @var $upload_error_message 
	 */
	private $upload_error_message = array();
	/**
	 * @var $mime_type 
	 */
	private $mime_type = array('text/javascript', 'text/css', 'text/html', 'application/x-php', 'text/x-gettext-translation', 'text/plain', 'text/x-sql','text/xml');
	/**
	 * @var $source_file 
	 */
	private $source_file = array();
	/**
	 * @var $converted 
	 */
	public $converted = array();
	/**
	 * @var $converter 
	 */
	private $converter;
	/**
	 * @var $conv_array 
	 */
	private $conv_array;
	/**
	 * @var $font_list 
	 */
	public $font_list;
	/**
	 * @var $ascii_array 
	 */
	private $ascii_array;

	/**
	 * @fn	__construct
	 * @brief	
	 * @returns	
	 */
	public function __construct(){
		mb_internal_encoding('UTF-8');
		
		/**
		 * @var $files 
		 */
		$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./ext'));

		/**
		 * @var $rules_files 
		 */
		$rules_files = new RegexIterator($files, '/-rules(.*)\.php$/i');
		
		foreach ($rules_files as $file) {

		preg_match('/\/ext\/(.*)\/(.*)-rules(.*)\.php/',$file, $match);
		//print_r($match);
		$ifont_name[] = $match[2];
		$ofont_name[] = $match[1];
		$this->ifont_array[$match[2]] = ucwords($match[2]);
		$this->ofont_array[$match[1]] = ucwords($match[1]);
		$font_list[] = array($match[1] => $match[2]);
		/**
		 * @var $file_name 
		 */
		$file_name = $match[2];
		/**
		 * @var $dir_name 
		 */
		$dir_name = $match[1];
		if(!empty($match[3])){
			$this->ascii_array[] = $file_name;
		}else{
			$this->ascii_array[] = false;
			} 
		}
		/**
		 * @var $font_list 
		 */
		$font_list = call_user_func_array('array_merge_recursive', $font_list);

		/**
		 * @var $font_list 
		 */
		$this->font_list = $font_list;

		require_once('./class-converter.php');

		/**
		 * @var $converter 
		 */
		$converter = new Converter();

		/**
		 * @var $converter 
		 */
		$this->converter = $converter;

		/**
		 * @var $file_array 
		 */
		$file_array = $_FILES;
		/**
		 * @var $post_array 
		 */
		$post_array = $_POST;

			if(isset($post_array['input']) && !empty($post_array['input'])){

				/**
				 * @var $converted 
				 */
				$this->converted = $this->convert($post_array);

			}else{
				/**
				 * @var $file 
				 */
				$file = $this->source_file($file_array);

				if($file !== false){

				/**
				 * @var $converted 
				 */
				$this->converted = $this->convert($post_array, $file);

				}
			}
	}


	/**
	 * @fn	converted
	 * @brief	
	 * @returns	
	 */
	public function converted(){
		return $this->converted;
	}



	/**
	 * @fn	convert
	 * @memberof FormSubmit
	 * @brief	Convert function for form post data
	 * @param array $post_array 	$_POST array.
	 * 
	 *					array
	 *	  					'input' => string '' (length=0)
	 *	  					'output' => string '' (length=0)
	 *	 					'ifont' => string 'ay' (length=2)
	 *	  					'ofont' => string 'ay' (length=2)
	 *	  					'submit' => string '' (length=0)
	 *
	 *					array
	 *	  					'file' => string '/tmp/phpK6hEQp' (length=14)
	 *	  					'type_error' => string 'Your file is valid!' (length=19)
	 *	  					'error_message' => string 'Upload Successfull!' (length=19)
	 *    					'error_num' => int 0`
	 * @param $file_data 	returned value from `source_file($_FILES)`;
	 * @returns array $converted	return converted result as array.
	 */
	private function convert($post_array = array(), $file_data = array()){

		  /**
		   * @var array $converted	initialize $converted array. 
		   */
		  $converted = array();
			if(isset($post_array['input'])){
			/**
			 * @var string $input	input content.  
			 */
			$input = $post_array['input'];
			}
			if(isset($post_array['output'])){
			/**
			 * @var string $output	output content. Usually empty. 
			 */
			$output = $post_array['output'];
			}


		if(isset($post_array['ofont'])){
		/**
		 * @var string $ofont	output encoding/font. 
		 */
		$ofont = $post_array['ofont'];
		}else{
		$ofont = 'unicode';
		}
		if(isset($post_array['ifont']) && $post_array['ifont'] != "auto"){
		/**
		 * @var string $ifont	input encoding/font. 
		 */
		$ifont = $post_array['ifont'];
		}else{
		$ifont = 'zawgyi-one';
		}
		if(isset($post_array['en_zwsp'])){
		/**
		 * @var bool $en_zwsp	Enable to add Zero-Width-Space
		 */
		$en_zwsp = true;
		}else{
		$en_zwsp = false;
		}
		if(isset($post_array['spelling_check'])){
		/**
		 * @var bool $spelling_check	enable to Spelling check in ASCII conversion. 
		 */
		$spelling_check = true;
		}else{
		$spelling_check = false;
		}
		if(isset($post_array['text-only'])){
		/**
		 * @var bool $text_only 	Plain text or others.
		 */
		$text_only = true;
		}else{
		$text_only = false;
		}
		if(isset($post_array['suggested'])){
		/**
		 * @var bool $suggested		To use or not user suggested word list. 
		 */
		$suggested = true;
		}else{
		$suggested = false;
		}
		if(isset($post_array['exceptions'])){
		/**
		 * @var string $exceptions	string with commas seperated word list to ignore from convertion process.
		 */
		$exceptions = $post_array['exceptions'];
		}else{
		$exceptions = null;
		}

		if (in_array($ifont, $this->ifont_array) || in_array(ucwords($ifont), $this->ifont_array)) {

				$converted['ifont_family'] = ucwords($ifont);
				$converted['ichecked'] = $ifont;
		}else{
				$converted['ifont_family'] = "Padauk, MyanmarText, Tharlon, Myanmar3";
				$converted['ichecked'] = 'myanmar3';
		}
		
		if (in_array($ofont, $this->ofont_array) || in_array(ucwords($ofont), $this->ofont_array)) {
				$converted['ofont_family'] = ucwords($ofont);
				$converted['ochecked'] = $ofont;
		}else{
				$converted['ofont_family'] = "Padauk, MyanmarText, Tharlon, Myanmar3";
				$converted['ochecked'] = 'myanmar3';
		}
		if (in_array($ifont, $this->ascii_array) || in_array(ucwords($ifont), $this->ascii_array)) {
	
				/**
				 * @var string $encoding 	ascii or utf-8. But can be empty for utf-8.
				 */
				$encoding = 'ascii';
		}else{
				$encoding = '';
		}

			/**
			 * @var array $options	array of options to use in conversion process by convert() function of converter class.
			 * 						Example: $this->converter->convert($source_text, $options);
			 */
			$options = array(
			'input_font' => $ifont,
			'output' => $ofont,
			'encoding' => $encoding,
			'spelling_check' => $spelling_check ? true:false,
			'text_only' => $text_only ? true:false,
			'en_zwsp' => $en_zwsp ? true:false,
			'exceptions' => $exceptions,
			'suggested' => $suggested ? true:false,
			);

		if(!empty($file_data)){
			if(isset($file_data['file'])){
		  		/**
				   * @var string $source_file	source file complete path.
				   */
				  $source_file = $file_data['file'];
		  		if (is_uploaded_file($source_file)) {
		  		/**
				   * @var string $source_text 	source text content to convert.
				   */
				  $source_text = file_get_contents($source_file);
		  		$converted['file_text'] = $this->converter->convert($source_text, $options);
		  		}else{
		  		$converted['file_text'] = "possible file upload attack!!!";
		  		}
		  		$converted['filename'] = $file_data['filename'];
		  		$converted['type'] = $file_data['type'];
			}
			if(isset($file_data['type_error'])){
		  		$converted['type_error'] = $file_data['type_error'];
		  	}
			if(isset($file_data['error_message'])){
			$converted['error_message'] = $file_data['error_message'];
			}
		  /**
		   * @var int $error_num	error message id from $_FILES array.
		   */
		  $error_num = $file_data['error_num'];

		}else{
			$converted['output_text'] = $this->converter->convert($input, $options);
		}

		return $converted;
	}

	/**
	 * @fn	check_file_error	check file upload message id. 
	 * @brief	check file upload message id from $FILES array and return error message.
	 * @param	int $error 	upload message id.
	 * @returns	string $message	File upload message.
	 */
	private function check_file_error($error){

		switch ($error) {
			case '0':
				/**
				 * @var string $message 	file upload message from $_FILES array.
				 */
				$message = "Upload Successfull!";
				break;

			case '1':
				$message = "File exceeds maximum upload size specified in php.ini!";
				break;

			case '2':
				$message = "File exceeds size specified by MAX_FILE_SIZE!";
				break;

			case '3':
				$message = "File only partially uploaded!";
				break;

			case '4':
				$message = "Form submitted with no file specified!";
				break;

			case '5':
				$message = "Undefined Error!";
				break;

			case '6':
				$message = "No temporary folder!";
				break;

			case '7':
				$message = "Cannot write file to disk!";
				break;

			case '8':
				$message = "Upload stopped by an unspecified PHP extension!";
				break;

			default:
				$message = "";
				break;
		}


		return $message;
	}

	/**
	 * @fn	source_file
	 * @brief	
	 * @param	$file_array 
	 * @returns	
	 */
	private function source_file($file_array){
			if(!empty($file_array)){
			//var_dump($file_array);
				foreach($file_array as $k => $v){
				//	var_dump($k);
					/**
					 * @var $file_input 
					 */
					$file_input = $k;
					/**
					 * @var $filename 
					 */
					$filename = $v;
					/**
					 * @var $error 
					 */
					$error = $filename['error'];
					/**
					 * @var $message 
					 */
					$message = $this->check_file_error($error);
					if($message ==  "Upload Successfull!" && $error === 0){
						/**
						 * @var $check_type 
						 */
						$check_type = $this->file_type($filename);
							if($check_type){
								/**
								 * @var $type_message 
								 */
								$type_message = "Your file is valid!";
								$source_file['filename'] = $filename['name'];
								$source_file['file'] = $filename['tmp_name'];
								$source_file['type'] = $check_type;
							}else{
								/**
								 * @var $type_message 
								 */
								$type_message = "Your file is invalid type($check_type), Please choose different file type!";
							}
						$source_file['type_error'] = $type_message;
					} else {
						$source_file['error_message'] = $message;
					}

					$source_file['error_num'] = $error;
				}
				return $source_file;
			}
		return false;
	}

	/**
	 * @fn	file_type
	 * @brief	
	 * @param	$filename 
	 * @returns	
	 */
	private function file_type($filename){
		/**
		 * @var $file 
		 */
		$file = $filename['tmp_name'];
		/**
		 * @var $type 
		 */
		$type = $filename['type'];
		/**
		 * @var $finfo 
		 */
		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension

		/**
		 * @var $finfo_type 
		 */
		$finfo_type = finfo_file($finfo, $file);

		finfo_close($finfo);

		if(in_array($type, $this->mime_type) || in_array($finfo_type, $this->mime_type)){
			return $finfo_type;
		}else{
			return false;
		}
		//return;
	}

}
/**
 * @var $form 
 */
$form = new FormSubmit();

?>
