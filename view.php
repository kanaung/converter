<?php
$start = microtime(true);
require_once('./class-form.php');

$converted = $form->converted();


	if(isset($converted['ichecked'])){
		$ichecked = $converted['ichecked'];
	}else{
		$ichecked = 'ay';
	}
	if(isset($converted['ochecked'])){
		$ochecked = $converted['ochecked'];
	}else{
		$ochecked = 'uni';
	}
	if(isset($converted['ifont_family'])){
		$ifontfamily = $converted['ifont_family'];
	}else{
		$ifontfamily = 'Ayar';
	}
	if(isset($converted['ofont_family'])){
		$ofontfamily = $converted['ofont_family'];
	}else{
		$ofontfamily = "Padauk, MyanmarText, Tharlon, Myanmar3";
	}


	if(isset($converted['output_text'])){

	$output_text = $converted['output_text'];
	$end = microtime(true);
	$time = "Converted in ".FormatElapsed($start, $end)." seconds !\n";
	}
	if(isset($converted['file_text'])){
		$filename = $converted['filename'];
		$file_type = $converted['type'];
		//var_dump($filename);
		$tmp_dir = sys_get_temp_dir();
		//var_dump($tmp_dir);
		//die('tmp_dir');
		$output_file = $tmp_dir.'/out_'.$filename;
		$today = getdate();
		$now = sprintf("\n/* %s - % s - %s (%s) - %s:%s:%s  */\n", $today['mday'], $today['month'], $today['year'], $today['weekday'], $today['hours'], $today['minutes'], $today['seconds']);
		$content = $converted['file_text'];
		$end = microtime(true);
		$time = "/*Converted in ".FormatElapsed($start, $end)." seconds */\n";
		//var_dump($content);

		$af = fopen($output_file, 'w') or die("File is not writable or directory does not exist.");
			fwrite($af, $content.$now.$time);
			fclose($af);

			header("Content-Description: File Transfer");
			header("Content-Type: $file_type");
			header("Content-Disposition: attachment; filename=".basename($output_file));
			header("Content-Transfer-Encoding: text");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Pragma: public");
			header("Content-Length: " . filesize($output_file));
			ob_clean();
			flush();
			readfile($output_file);
			exit;
	}else{
	if(isset($converted['error_message'])){
	$error_message = $converted['error_message'];
	}

	if(isset($converted['type_error'])){
	$type_error = $converted['type_error'];
	}	
	
	}

function FormatElapsed($Start, $End = NULL) {
		  if($End === NULL)
			 $Elapsed = $Start;
		  else
			 $Elapsed = $End - $Start;

		  $m = floor($Elapsed / 60);
		  $s = $Elapsed - $m * 60;
		  $Result = sprintf('%02d:%05.2f', $m, $s);

		  return $Result;
		}
	$font_options = array(
		'ifont' => array('ay'=>'Ayar','zg'=>'Zawgyi-One','uni'=>'Myanmar3','win'=>'Win Innwa'),
		'ofont' => array('ay'=>'Ayar','zg'=>'Zawgyi-One','uni'=>'Myanmar3')
	);

