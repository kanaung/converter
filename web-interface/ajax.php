<?php
$start = microtime(true);
define('ROOT_DIR', dirname(dirname(__FILE__)) . '/');

require_once( ROOT_DIR . 'web-interface/class-form.php');

/**
 * @var $form 
 */
$form = new FormSubmit ( );
$converted = $form->converted();


	if(isset($converted['ichecked'])){
		$ichecked = $converted['ichecked'];
	}else{
		$ichecked = 'ayar';
	}
	if(isset($converted['ochecked'])){
		$ochecked = $converted['ochecked'];
	}else{
		$ochecked = 'unicode';
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
	if(isset($converted['error_message'])){
	$error_message = $converted['error_message'];
	$json_output['error_message'] = $error_message;
	}

	if(isset($converted['type_error'])){
	$type_error = $converted['type_error'];
	$json_output['type_error'] = $type_error;
	}
$json_output = array(
	'ichecked' => $ichecked,
	'ochecked' => $ochecked,
	'ifont_family' => $ifontfamily,
	'ofont_family' => $ofontfamily
	);
	if(isset($converted['output_text'])){
	$output_text = $converted['output_text'];
	$json_output['output_text'] = $output_text;
	$end = microtime(true);
	$time = "Converted in ".FormatElapsed($start, $end)." seconds !\n";
	$json_output['time'] = $time;
	echo json_encode($json_output);
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



?>
