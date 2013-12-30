<?php
class FormSubmit{

	private $file_array;
	private $post_array;
	private $filename;
	private $upload_error;
	private $upload_error_message = array();
	private $mime_type = array('text/javascript', 'text/css', 'text/html', 'application/x-php', 'text/x-gettext-translation', 'text/plain', 'text/x-sql','text/xml');
	private $source_file = array();
	public $converted = array();
	private $converter;
	private $conv_array;

	public function __construct(){
		mb_internal_encoding('UTF-8');

		require_once('./class-converter.php');

		$converter = new Converter();

		$this->converter = $converter;

		$file_array = $_FILES;
		$post_array = $_POST;

			if(isset($post_array['input']) && !empty($post_array['input'])){

				$this->converted = $this->convert($post_array);

			}else{
				$file = $this->source_file($file_array);

				if($file !== false){

				$this->converted = $this->convert($post_array, $file);

				}
			}
	}


	public function converted(){
		return $this->converted;
	}


	private function convert($post_array, $file_data = ''){
		//die(var_dump($post_array));
		/*
		array
		  'input' => string '' (length=0)
		  'output' => string '' (length=0)
		  'ifont' => string 'ay' (length=2)
		  'ofont' => string 'ay' (length=2)
		  'submit' => string '' (length=0)

		array
		  'file' => string '/tmp/phpK6hEQp' (length=14)
		  'type_error' => string 'Your file is valid!' (length=19)
		  'error_message' => string 'Upload Successfull!' (length=19)
		  'error_num' => int 0

		*/
		 // var_dump($file_data);
		 // var_dump($post_array);
		  $converted = array();
			if(isset($post_array['input'])){
			$input = $post_array['input'];
			}
			if(isset($post_array['output'])){
			$output = $post_array['output'];
			}

		//  $submit = $post_array['submit'];

		if(isset($post_array['ofont'])){
		$ofont = $post_array['ofont'];
		}else{
		$ofont = 'uni';
		}
		if(isset($post_array['ifont']) && $post_array['ifont'] != "auto"){
		$ifont = $post_array['ifont'];
		}else{
		$ifont = '';
		}
		if(isset($post_array['spelling_check']) && $post_array['spelling_check'] == true){
		$spelling_check = true;
		}else{
		$spelling_check = false;
		}
		if(isset($post_array['text-only']) && $post_array['text-only'] == true){
		$text_only = true;
		}else{
		$text_only = false;
		}
		if(isset($post_array['suggested']) && $post_array['suggested'] == true){
		$suggested = true;
		}else{
		$suggested = false;
		}
		if(isset($post_array['exceptions'])){
		$exceptions = $post_array['exceptions'];
		}else{
		$exceptions = null;
		}

		switch ($ifont) {
			case 'ay':
				$converted['ifont_family'] = "Ayar";
				$converted['ichecked'] = 'ay';
				$encoding = '';
				break;
			case 'zg':
				$converted['ifont_family'] = "Zawgyi-One";
				$converted['ichecked'] = 'zg';
				$encoding = '';
				break;
			case 'uni':
				$converted['ifont_family'] = "Padauk, Ayar Uni, MyanmarText, Tharlon, Myanmar3";
				$converted['ichecked'] = 'uni';
				$encoding = '';
				break;
			case 'win':
				$converted['ifont_family'] = "win innwa";
				$converted['ichecked'] = 'win';
				$encoding = 'ascii';
				break;
			case 'nld':
				$converted['ifont_family'] = "NLD1";
				$converted['ichecked'] = 'nld';
				$encoding = 'ascii';
				break;
			case 'knk':
				$converted['ifont_family'] = "Kannaka";
				$converted['ichecked'] = 'knk';
				$encoding = 'ascii';
				break;
			case 'mym':
				$converted['ifont_family'] = "m-myanmar1";
				$converted['ichecked'] = 'mym';
				$encoding = 'ascii';
				break;
			case 'prf':
				$converted['ifont_family'] = "private font";
				$converted['ichecked'] = 'prf';
				$encoding = '';
				break;
			default:
				$encoding = '';
				$converted['ichecked'] = 'auto';
				break;
		}
		switch ($ofont) {
			case 'ay':
				$converted['ofont_family'] = "Ayar";
				$converted['ochecked'] = 'ay';
				break;
			case 'zg':
				$converted['ofont_family'] = "Zawgyi-One";
				$converted['ochecked'] = 'zg';
				break;
			case 'uni':
				$converted['ofont_family'] = "Padauk, MyanmarText, Tharlon, Myanmar3";
				$converted['ochecked'] = 'uni';
				break;
			default:
				$converted['ofont_family'] = "Padauk, MyanmarText, Tharlon, Myanmar3";
				$converted['ochecked'] = 'uni';
				break;
		}

			$options = array(
			'input_font' => $ifont,
			'output' => $ofont,
			'encoding' => $encoding,
			'spelling_check' => $spelling_check,
			'text_only' => $text_only,
			'exceptions' => $exceptions,
			'suggested' => $suggested,
			);
//die(var_dump($options));
		if(!empty($file_data)){
			if(isset($file_data['file'])){
		  		$source_file = $file_data['file'];
		  		if (is_uploaded_file($source_file)) {
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
		  $error_num = $file_data['error_num'];

		}else{
			$converted['output_text'] = $this->converter->convert($input, $options);
		}

		return $converted;
	}

	private function check_file_error($error){
		//var_dump($upload_error);

		switch ($error) {
			case '0':
				# code...
				$message = "Upload Successfull!";
				break;

			case '1':
				# code...
				$message = "File exceeds maximum upload size specified in php.ini!";
				break;

			case '2':
				# code...
				$message = "File exceeds size specified by MAX_FILE_SIZE!";
				break;

			case '3':
				# code...
				$message = "File only partially uploaded!";
				break;

			case '4':
				# code...
				$message = "Form submitted with no file specified!";
				break;

			case '5':
				# code...
				$message = "Undefined Error!";
				break;

			case '6':
				# code...
				$message = "No temporary folder!";
				break;

			case '7':
				# code...
				$message = "Cannot write file to disk!";
				break;

			case '8':
				# code...
				$message = "Upload stopped by an unspecified PHP extension!";
				break;

			default:
				# code...
				$message = "";
				break;
		}


		return $message;
	}

	private function source_file($file_array){
			if(!empty($file_array)){
			//var_dump($file_array);
				foreach($file_array as $k => $v){
				//	var_dump($k);
					$file_input = $k;
					$filename = $v;
					$error = $filename['error'];
					$message = $this->check_file_error($error);
					if($message ==  "Upload Successfull!" && $error === 0){
						$check_type = $this->file_type($filename);
							if($check_type){
								$type_message = "Your file is valid!";
								$source_file['filename'] = $filename['name'];
								$source_file['file'] = $filename['tmp_name'];
								$source_file['type'] = $check_type;
							}else{
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

	private function file_type($filename){
		$file = $filename['tmp_name'];
		$type = $filename['type'];
		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension

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
$form = new FormSubmit();

?>
