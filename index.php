<?php include_once('./view.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="images/favicon.html">
		<title>Kanaung Font Converter</title>
		<link href="template/css/bootstrap.css" rel="stylesheet">
		<link href="template/css/bootstrap-theme.css" rel="stylesheet">
		<link href="template/css/font.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#km-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Kanaung Font Converter</a>
				</div>
				<div class="collapse navbar-collapse" id="km-navbar-collapse">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="#" data-toggle="modal" data-target="#uploadModal">Upload</a></li>
						<li><a href="#" data-toggle="modal" data-target="#helpModal">Help</a></li>
						<li><a href="#" data-toggle="modal" data-target="#aboutModal">About</a></li>
					</ul>
				</div>
			</div>
			</nav>
			<form id="converter" name="converter" enctype="multipart/form-data" action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Input
							</div>
							<div class="panel-body">
								<textarea class="form-control" rows="7" name="input" id="input" style="font-family:<?php echo $ifontfamily;?>"></textarea>
								<br/>
								<select class="form-control" name="ifont" id="ifont" onchange="adjustOutputFont(this,document.getElementById('ofont'),document.getElementById('input'))">
									<option value="">Select Input Font</option>
							<?php 
								foreach ($font_options['ifont'] as $ifont) 
								{
							?>
									<option value="<?php echo $ifont;?>" id="<?php echo $ifont;?>" <?php echo (isset($ichecked) && $ichecked == $ifont ? "selected": "");?>><?php echo ucwords($ifont);?></option>
							<?php	
								}
							?>
								</select>
							</div>
						</div>								
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Output
							</div>
							<div class="panel-body">
								<div class="zero-clipboard">
									<span class="btn-clipboard" data-clipboard-target="output">Copy</span>
								</div>
								<textarea class="form-control" rows="7" name="output" id="output" style="font-family:<?php echo $ofontfamily;?>"></textarea>
								<br/>
								<select class="form-control" name="ofont" id="ofont" onchange="adjustOutputFont(this,'',document.getElementById('output'))">
									<option value="">Select Output Font</option>
							<?php 
								foreach ($font_options['ofont'] as $ofont) 
								{
							?>
									<option value="<?php echo $ofont;?>" id="<?php echo $ofont;?>" <?php echo (isset($ochecked) && $ochecked == $ofont ? "selected": "");?>><?php echo ucwords($ofont);?></option>
							<?php	
								}
							?>
								</select>
							</div>
						</div>								
					</div>
				</div>
				<div class="row">
					<div class="container-fluid">
						<div class="panel panel-default">
							<div class="panel-body">
								Control
								<hr/>
								<label class="checkbox-inline">
									<input type="checkbox" name="en_zwsp" id="en_zwsp"> Zero-width Space
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" id="spelling_check" name="spelling_check"> Automatically check for English words
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="text-only" id="text-only" checked="checked"> Text only mode
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="suggested" id="suggested"> Use suggested words
								</label>
								<hr/>
								<p>Suggested Word</p>
								<input type="text" class="form-control" name="exceptions" id="exceptions">
								<br/>
								<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Convert">
							</div>
						</div>			
					</div>
				</div>
			</form>
			<div  class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Convert Text File</h4>
					</div>
					<div class="modal-body">
						<form id="uploadform" class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="POST">
						Upload
						<input type="file" name="inputfile" value="browse" id="inputfile" />
						<br/>
						Select Input Font
						<select class="form-control" name="ifont" id="uifont" onchange="adjustOutputFont(this,document.getElementById('uofont'),'')">
							<?php 
								foreach ($font_options['ifont'] as $ifont) 
								{
							?>
									<option value="<?php echo $ifont;?>" id="<?php echo $ifont;?>" <?php echo (isset($ichecked) && $ichecked == $ifont ? "selected": "");?>><?php echo ucwords($ifont);?></option>
							<?php	
								}
							?>
						</select>
						<br/>
						Select Output Font
						<select class="form-control" name="ofont" id="uofont" onchange="adjustOutputFont(this,'','')">
							<?php 
								foreach ($font_options['ofont'] as $ofont) 
								{
							?>
									<option value="<?php echo $ofont;?>" id="<?php echo $ofont;?>" <?php echo (isset($ochecked) && $ochecked == $ofont ? "selected": "");?>><?php echo ucwords($ofont);?></option>
							<?php	
								}
							?>
						</select>
						<hr/>
						Control<br/>
						<label class="checkbox-inline">
							<input type="checkbox" name="en_zwsp" id="en_zwsp"> Zero-width Space
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="spelling_check" name="spelling_check"> Automatically check for English words
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="text-only" id="text-only" checked="checked"> Text only mode
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="suggested" id="suggested"> Use suggested words
						</label>
						<hr/>
						<p>Suggested Word</p>
						<input type="text" class="form-control" name="exceptions" id="exceptions">
						<br/>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Convert">
						</form>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			<div  class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Help</h4>
					</div>
					<div class="modal-body">
						<h4>ASCII Controls</h4>
						<hr/>
							When converting from ASCII based fonts, you have some options to choose. (3 checkboxs and 1 text input box)
							<p>
							1st checkbox (check English Words automatically) is to check English words and Burmese words when converting mixed content of English and Burmese.
							</p>
							<p>2nd checkbox ( Text only input) is checked by default. It needs to be unchecked if you are converting html/xml contents. But converting time will take longer than text only contents if you unchecked this.</p>
							<p>3rd checkbox (Use user suggested words) is to use user suggested word list dictionary when checking between English and Burmese words. All user suggested words list are come from below text box and saved on server.</p>
							<p>Suggest (Textbox) is to suggest English words. All suggested words are ignored from converting (which means substitution English alphabet with Burmese alphabet will not happen for English words). So all suggested English words are remain unchanged when converting from ASCII fonts. Important! You need to use phrase instead only one word if your word is less than 4 letters.</p>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			<div  class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">About</h4>
					</div>
					<div class="modal-body">
						<h4>Description</h4>
						<hr/>
						This is the fastest and most realiable converter ever for Burmese Fonts encodings.
						<hr/>
						<h4>License</h4>
						<hr/>
						This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
						<hr/>
						<h4>Detail</h4>
						<hr/>
						<ul>
							<li>Name: Myanmar Font Converter</li>
							<li>Web URI: http://converter.myanmapress.com</li>
							<li>Description: Use to convert ASCII and Unicode fonts vice verse.</li>
							<li>Version: 2.0</li>
							<li>Author: Kanaung Development Group</li>
							<li>Author URI: https://github.com/kanaung/converter/</li>
							<li>License: GPLv2 or later</li>
						</ul>
						<hr/>
						<h4>Instructions</h4>
						<hr/>
						For detail instructions, use Help tab section
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			<div class="row" id="time_container">
				<div class="col-md-12">
					<div class="panel panel-default alert-success">
						<div class="panel-body" style="text-align:center;">
							<span id="convert_time"><?php if(isset($time)){ echo $time;} ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container-fluid" style="text-align:center;">
					<hr/>
					Copyright &copy; 2014 | Ayar Myanmar Unicode Group
				</div>
			</div>
		</div>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="template/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/zeroclipboard/ZeroClipboard.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script>
			function adjustOutputFont(iId,oId,iT)
			{
				var afList = <?php echo json_encode($font_list);?>;
				var optionString = "";
				if(iId.value == "")
				{
					return 0;
				}
				if(iT != "")
				{
					iT.style.fontFamily = iId.value;
				}
				if(oId != "")
				{
					for(var key in afList)
					{
						if(afList.hasOwnProperty(key))
						{
							for (var i = 0; i < afList[key].length; i++) 
							{
								if(afList[key][i] == iId.value)
								{
									optionString += "<option name='"+ key +"' id='"+ key +"'>"+ key +"</option>";
								}
							};
						}
					}
					oId.innerHTML = optionString;
				}
			}
		</script>
	</body>
</html>
