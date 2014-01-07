<?php include_once('./view.php'); ?>
<?php include_once('./header.php'); ?>

<?php
//var_dump($font_options);

?>
<header role="banner">
	<div class="container">

	<h1 class="text-center gray-light">Myanmar Font Converter</h1>

	<nav class="navbar navbar-inverse" role="navigation">
		<ul class="nav navbar-nav nav-pills">
			<li><a href="#home" data-toggle="tab">Home</a></li>
			<li><a href="#uploadsect" data-toggle="tab">Upload</a></li>
			<li><a href="#about" data-toggle="tab">About</a></li>
			<li><a href="#help" data-toggle="tab">Help</a></li>
		</ul>
	</nav>
	</div>
</header>
	<div class="container hide-time">
	<section class="alert alert-info">
	<p id="message">
	<?php if(isset($time)){ echo $time;} ?>
	</p>
	</section>

	</div>

<section id="myTabContent" class="tab-content">
	<section class="tab-pane fade in active" id="home">
		<div class="container">
		<form id="converter" class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="POST">
			<div class="row">
			<fieldset id="input-set" class="col-xs-6">
			<legend>Input</legend>
				<div class="control-group">
				<label for="input" class="control-label">Input Text</label>
				<div class="controls">
					<textarea name="input" id="input" rows="10" class="form-control input-xlarge textareaH" placeholder="" style="font-family:<?php echo $ifontfamily; ?> "></textarea>
				</div>
			  </div>
			  <div class="input-group">
				<label for="ifont" class="control-label">Select Input Font : </label>
				<select name="ifont" id="ifont">
					<?php

					foreach($font_options['ifont'] as $id => $name){
							if(isset($ichecked) && $ichecked == $id){
							echo "<option value='$id' selected='selected'>$name</option>";
							}else{
							echo "<option value='$id'>$name</option>";
							}
					}
					?>
				</select>
			  </div>
			</fieldset>
			<fieldset id="output-set" class="col-xs-6">
			<legend>Output</legend>
			<div class="control-group">
				<label for="output" class="control-label">Output Text</label>
				<div class="controls">
					<textarea rows="10" class="panel-body form-control textareaH" id="output" style="font-family:<?php echo $ofontfamily; ?> " contenteditable><?php if(isset($output_text) && ($output_text != '')){ echo $output_text;}else{ echo "Copy output text from here!";}?></textarea>
				</div>
			  </div>
			  <div class="input-group">
				<label for="ofont" class="control-label">Select Output Font : </label>
				<select name="ofont" id="ofont">
					<?php
					foreach($font_options['ofont'] as $id => $name){
							if(isset($ochecked) && $ochecked == $id){
							echo "<option value='$id' selected='selected'>$name</option>";
							}else{
							echo "<option value='$id'>$name</option>";
							}
					}
					?>
				</select>
			  </div>
			</fieldset>
			</div>
			<div class="clearfix visible-xs"></div>
			<fieldset id="control-set">
			<legend>Controls</legend>
			<div id="ascii-controls">
				<div class="input-groups">
					<label for="spelling_check" class="control-label checkbox-inline">
					<input type="checkbox" name="spelling_check" id="spelling_check">
					 Check English Words automatically</label>
					<label for="text-only" class="control-label checkbox-inline">
					<input type="checkbox" name="text-only" id="text-only" checked="checked">
					 Text only input</label>
					 <label for="suggested" class="control-label checkbox-inline">
					<input type="checkbox" name="suggested" id="suggested">
					Use user suggested words list. <span class="alert alert-danger">Use with care!</span></label>
				</div>
			  <div class="input-group">
				<label for="exceptions">Suggest</label>
				<input type="text" name="exceptions" id="exceptions" class="form-control">
				<p class="help-block">Enter words list seperated by comma to ignore in convertion! If your word is less than 4 letters, please use atleast 2 words combined. <br>For Example: if your want to ignore the word "you" or "I" from the sentence "I love you.", use "I love" or "love you." or the whole sentence "I love you."</p>
			  </div>
			</div>
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Convert</button>
			</fieldset>
		</form>
		</div>
	</section>

	<section class="tab-pane fade" id="uploadsect">
		<div class="container">
		<form id="uploadform" class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="POST">
			<div class="row">
			<fieldset id="input-set" class="col-xs-6">
			<legend>Input</legend>
				<div class="input-group">
				<select name="ifont" id="ifont">
					<?php

					foreach($font_options['ifont'] as $id => $name){
							if(isset($ichecked) && $ichecked == $id){
							echo "<option value='$id' id='$id' selected='selected'>$name</option>";
							}elseif($id == 'ay'){
							echo "<option value='$id' id='$id' selected='selected'>$name</option>";
							}else{
							echo "<option value='$id' id='$id'>$name</option>";
							}
					}
					?>
				</select>
				<label for="ifont" class="control-label">Input Font</label>
				</div>
			</fieldset>
			<fieldset id="output-set" class="col-xs-6">
			<legend>Output</legend>
				<div class="input-group">
				<select name="ofont" id="ofont">
					<?php
					foreach($font_options['ofont'] as $id => $name){
							if(isset($ochecked) && $ochecked == $id){
							echo "<option value='$id' id='$id' selected='selected'>$name</option>";
							}elseif($id == 'uni'){
							echo "<option value='$id' id='$id' selected='selected'>$name</option>";
							}else{
							echo "<option value='$id' id='$id'>$name</option>";
							}
					}
					?>
				</select>
				<label for="ofont" class="control-label">Output Font</label>
				</div>
			</fieldset>
			</div>
			<div class="clearfix visible-xs"></div>
			<fieldset id="upload-set">
			<legend>File Upload</legend>
			<input type="file" name="inputfile" value="browse" class="input-file" id="inputfile">
			</fieldset>
			<fieldset id="control-set">
			<legend>Controls</legend>
			<div id="ascii-controls">
				<div class="input-groups">
					<label for="spelling_check" class="control-label checkbox-inline">
					<input type="checkbox" name="spelling_check" id="spelling_check">
					 Check English Words automatically</label>
					<label for="text-only" class="control-label checkbox-inline">
					<input type="checkbox" name="text-only" id="text-only" checked="checked">
					 Text only input</label>
					 <label for="suggested" class="control-label checkbox-inline">
					<input type="checkbox" name="suggested" id="suggested">
					 Use user suggested words list</label>
				</div>
			  <div class="input-group">
				<label for="exceptions">Exceptions</label>
				<input type="text" name="exceptions" id="exceptions" class="form-control">
				<p class="help-block">Enter words list seperated by comma to ignore in convertion! If your word is less than 4 letters, please use atleast 2 words combined. <br>For Example: if your want to ignore the word "you" or "I" from the sentence "I love you.", use "I love" or "love you." or the whole sentence "I love you."</p>
			  </div>
			</div>
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Convert</button>
			</fieldset>
		</form>
		</div>
	</section>
	<section class="tab-pane fade" id="about">
		<div class="container">
			<h3>About</h3>
			<div class="panel">
			This is the fastest and most realiable converter ever for Burmese Fonts encodings.
			</div>
			<h4>License</h4>
			<div class="panel">This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License
			as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

			This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
			MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

			You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software
			Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.</div>
			<h4>Details</h4>
			<div class="panel">Name:	Myanmar Font Converter<br>
			Web URI: <a href="http://converter.myanmapress.com">http://converter.myanmapress.com</a><br>
			Description: Use to convert ASCII and Unicode fonts vice verse.<br>
			Version: 1.0<br>
			Author: Sithu Thwin<br>
			Author URI: <a href="http://www.thwin.net/">http://www.thwin.net/</a><br>
			License: GPLv2 or later<br>
			</div>
			<h4>Instructions</h4>
			<p>For detail instructions, use Help tab section</p>
		</div>
	</section>
	<section class="tab-pane fade" id="help">
		<div class="container">
			<h4>ASCII controls</h4>
			<div class="panel">
			<p>
			When converting from ASCII based fonts, you have some options to choose. (3 checkboxs and 1 text input box)
			</p>
			<p>
			1st checkbox (check English Words automatically) is to check English words and Burmese words when converting mixed content of English and Burmese.
			</p>
			<p>2nd checkbox ( Text only input) is checked by default. It needs to be unchecked if you are converting html/xml contents. But converting time will take longer than text only contents if you unchecked this.</p>
			<p>3rd checkbox (Use user suggested words) is to use user suggested word list dictionary when checking between English and Burmese words. All user suggested words list are come from below text box and saved on server.</p>
			<p>Suggest (Textbox) is to suggest English words. All suggested words are ignored from converting (which means substitution English alphabet with Burmese alphabet will not happen for English words). So all suggested English words are remain unchanged when converting from ASCII fonts. Important! You need to use phrase instead only one word if your word is less than 4 letters.</p>
			</div>

		</div>
	</section>
</section>

		  <!-- Modal -->
		  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><?php if(isset($error_message) || isset($type_error)){echo 'Error';}else{ echo 'Output Results';} ?></h4>
				</div>
				<div class="modal-body" id="error">

					<?php if(isset($error_message)){echo $error_message;} ?>
					<?php if(isset($type_error)){echo $type_error;} ?>

				</div>
				<!--textarea row="10" class="modal-body form-control" name="ajax_output" id="ajax_output" contenteditable></textarea-->
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
<?php include_once('./footer.php'); ?>
