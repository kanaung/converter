<?php
define('ROOT_DIR', dirname(__FILE__) . '/');
//define('ROOT_DIR', basename(ROOT_PATH)); 
require( ROOT_DIR . 'web-interface/view.php' );

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="web-interface/images/favicon.html">
		<title>Kanaung Font Converter</title>
		<link href="web-interface/template/css/bootstrap.css" rel="stylesheet">
		<link href="web-interface/template/css/bootstrap-theme.css" rel="stylesheet">
		<link href="web-interface/template/css/font.css" rel="stylesheet">
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
					<a class="navbar-brand" href="/">Kanaung Font Converter | ကနောင် စာလုံးပြောင်းစနစ် </a>
				</div>
				<div class="collapse navbar-collapse" id="km-navbar-collapse">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="/"><span class="glyphicon glyphicon-home"> </span> ပင်မစာမျက်နှာ</a></li>
						<li><a href="#" data-toggle="modal" data-target="#uploadModal"><span class="glyphicon glyphicon-cloud-upload"> </span> ဖိုင်တင်ပို့ရန်</a></li>
						<li><a href="#" data-toggle="modal" data-target="#helpModal"><span class="glyphicon glyphicon-question-sign"> </span> အကူအညီ</a></li>
						<li><a href="#" data-toggle="modal" data-target="#aboutModal"><span class="glyphicon glyphicon-info-sign"> </span> သိကောင်းစရာ</a></li>
					</ul>
				</div>
			</div>
			</nav>

			<form id="converter" name="converter" enctype="multipart/form-data" action="" method="POST">
				<div class="row">
					<div class="col-sm-5">
						<div class="panel panel-default">
							<div class="panel-heading">
								ထည့်သွင်းရန်
							</div>
							<div class="panel-body">
								<textarea class="form-control" rows="7" name="input" id="input" style="font-family:<?php echo $ifontfamily;?>"></textarea>
								<br/>
								<select class="form-control" name="ifont" id="ifont" onchange="adjustOutputFont(this,document.getElementById('ofont'),document.getElementById('input'))">
									<option value="">မူရင်း ဖောင့်စာလုံးရွေးရန်</option>
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
					<div class="col-sm-2">
						<div class="btn-block">
							<br><br><br><br><br><br><br>
						<button type="submit" name="submit" id="submit" class="btn btn-primary center-block">ပြောင်းရန် <span class="glyphicon glyphicon-arrow-right"></button>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="panel panel-default">
							<div class="panel-heading">
								ရလဒ်
							</div>
							<div class="panel-body">
								<div class="zero-clipboard">
									<span class="btn-clipboard" data-clipboard-target="output">Copy</span>
								</div>
								<textarea class="form-control" rows="7" name="output" id="output" style="font-family:<?php echo $ofontfamily;?>"></textarea>
								<br/>
								<select class="form-control" name="ofont" id="ofont" onchange="adjustOutputFont(this,'',document.getElementById('output'))">
									<option value="">ပြောင်းလိုသော ဖောင့်စာလုံးရွေးရန် </option>
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
								ASCII Control
								<hr/>
								<label class="checkbox-inline">
									<input type="checkbox" name="en_zwsp" id="en_zwsp"> Zero-Width-Space
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" id="spelling_check" name="spelling_check"> အင်္ဂလိပ် စကားလုံးများအား အော်တိုစစ်ရန်
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="text-only" id="text-only" checked="checked"> ရိုးရိုးစာသား
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="suggested" id="suggested"> အကြံပြုထားဖူးသော စကားလုံးများအား သုံးရန်
								</label>
								<hr/>
								<p>မပြောင်းလိုသော စကားလုံးများအား အကြံပြုပေးရန်</p>
								<input type="text" class="form-control" name="exceptions" id="exceptions">
								<p class="help-block">မပြောင်းလိုသော အင်္ဂလိပ် စကားလုံးများအား ကော်မာခံ၍ ဖြည့်သွင်းပေးပါ။ အက္ခရာ ၄ လုံးအောက် နည်းသော စကားလုံးဖြစ်လျှင် အနည်းဆုံး စကားလုံး ၂ လုံးတွဲ၍ ဖြည့်သွင်းပေးပါ။<br>ဥပမာ။   ။ "I love you." ဆိုသော စာကြောင်းမှ "you" ဆိုသော စကားလုံးအား မပြောင်းလိုလျှင်  "love you." ဟု ဖြည့်သွင်းပေးပါ။ အသေးစိတ် သိလိုလျှင် <a href="#" data-toggle="modal" data-target="#helpModal">အကူအညီ</a>ကို နှိပ်ပါ။</p>
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
						<h4 class="modal-title"><span class="glyphicon glyphicon-cloud-upload"></span> ဖိုင်တင်ပို့ပြီး ပြောင်းရန်</h4>
					</div>
					<div class="modal-body">
						<form id="uploadform" class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="POST">
						<label for"inputfile"><span class="glyphicon glyphicon-folder-open"> </span> ဖိုင်တင်ပို့ရန်</label>
						<input type="file" name="inputfile" value="browse" id="inputfile" />
						<br/>
						<label for"ifont">မူရင်း ဖောင့်စာလုံးရွေးရန်</label>
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
						<label for"ofont">ပြောင်းလိုသော ဖောင့်စာလုံးရွေးရန် </label>
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
						<h5>ASCII Controls</h5>
						<label class="checkbox-inline">
							<input type="checkbox" name="en_zwsp" id="en_zwsp"> Zero-Width-Space
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="spelling_check" name="spelling_check"> အင်္ဂလိပ် စကားလုံးများအား အော်တိုစစ်ရန်
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="text-only" id="text-only" checked="checked">  ရိုးရိုးစာသား
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="suggested" id="suggested"> အကြံပြုထားဖူးသော စကားလုံးများအား သုံးရန်
						</label>
						<hr/>
						<p>မပြောင်းလိုသော စကားလုံးများအား စာရင်းပေးရန်</p>
						<input type="text" class="form-control" name="exceptions" id="exceptions">
						<p class="help-block">မပြောင်းလိုသော အင်္ဂလိပ် စကားလုံးများအား ကော်မာခံ၍ ဖြည့်သွင်းပေးပါ။ အက္ခရာ ၄ လုံးအောက် နည်းသော စကားလုံးဖြစ်လျှင် အနည်းဆုံး စကားလုံး ၂ လုံးတွဲ၍ ဖြည့်သွင်းပေးပါ။<br>ဥပမာ။   ။ "I love you." ဆိုသော စာကြောင်းမှ "you" ဆိုသော စကားလုံးအား မပြောင်းလိုလျှင်  "love you." ဟု ဖြည့်သွင်းပေးပါ။ အသေးစိတ် သိလိုလျှင် <a href="#" data-toggle="modal" data-target="#helpModal">အကူအညီ</a>ကို နှိပ်ပါ။</p>
						<br/>
						<button type="submit" name="submit" id="submit" class="btn btn-primary">ပြောင်းရန် <span class="glyphicon glyphicon-arrow-right"></button>
						</form>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Close</button>
					</div>
					</div>
				</div>
			</div>
			<div  class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					</div>
					<div class="modal-body">
						<h4>ZWSP Control</h4>
						<hr/>
						<p>Zero-Width-Space အမှန်ခြစ်ကွက်သည် စာပိုဒ်များအား ဖောင့်ပြောင်းရာတွင် Zero-Width-Space ထည့်သွင်း၍ စကားလုံး ခွဲခြားခြင်း ပြုလုပ်ပေးရန် ဖြစ်သည်။</p>
						<h4>ASCII Controls</h4>
						<hr/>
							ASCII ဖောင့်များမှ ပြောင်းလိုသောအခါ ရွေးချယ်စရာ အချို့ရှိပါသည်။ ( အမှန်ခြစ်ကွက် ၃ ခုနှင့် စာရိုက်သွင်းရန် အကွက်တစ်ခု)
							<ol>
							<li>
							ပထမ အမှန်ခြစ်ကွက် (အင်္ဂလိပ် စကားလုံးများအား အော်တိုစစ်ရန်) သည် အင်္ဂလိပ်နှင့် မြန်မာစာရောရေးထားသော စာပိုဒ်များအား ပြောင်းသောအခါ အင်္ဂလိပ် စကားလုံးနှင့် မြန်မာ စကားလုံးများအား ခွဲခြား စစ်ဆေးပေးသည်။
							</li>
							<li>
							ဒုတိယ အမှန်ခြစ်ကွက် ( ရိုးရိုးစာသား) သည် မူလကတည်းက အမှန်ခြစ်ထားသည်။ html/xml များပါဝင်သော စာပိုဒ်များအား ပြောင်းလိုသောအခါ အမှန်ခြစ်အား ဖြုတ်ပေးရန် လိုအပ်သည်။ သို့သော် အမှန်ခြစ်အား ဖြုတ်ထားပါက ရိုးရိုးစာသားအား ပြောင်းသော အချိန်ထက် ပိုမို ကြာမြင့်နိုင်ပါသည်။
							</li>
							<li>
							တတိယ အမှန်ခြစ်ကွက် ( အကြံပြုထားဖူးသော စကားလုံးများအား သုံးရန်) သည် အင်္ဂလိပ်နှင့် မြန်မာစာတို့အား ခွဲခြား စစ်ဆေးသည့်အခါ သုံးစွဲသူများမှ အကြံပြုထားဖူးသော စကားလုံးစာရင်း အဘိဓာန်အား အသုံးပြုရန် ဖြစ်သည်။ သုံးစွဲသူများမှ အကြံပြုထားဖူးသော စကားလုံးစာရင်း အဘိဓာန်ဆိုသည်မှာ အောက်ဘက်ရှိ စာရိုက်သွင်းရန် အကွက်တွင် ရိုက်သွင်း အကြံပြုထားဖူးသော စကားလုံးများအား ဆာဗာပေါ်တွင် သိမ်းဆည်းထားခြင်းဖြစ်ပါသည်။
							</li>
							<li>
							မပြောင်းလိုသော စကားလုံးများအား စာရင်းပေးရန် (စာရိုက်သွင်းရန် အကွက်) သည် အင်္ဂလိပ် စကားလုံးများအား အကြံပြု စာရင်းပေးရန် ဖြစ်သည်။ စာရင်းပေးထားသော စကားလုံးများအား ထည့်သွင်း ပြောင်းလဲမှု ပြုလုပ်မည် မဟုတ်ပါ။ ဆိုလိုသည်မှာ အင်္ဂလိပ် အက္ခရာများအား မြန်မာ အက္ခရာတို့ဖြင့် လဲလှယ် အစားထိုးရာတွင် အင်္ဂလိပ် စကားလုံးများအား ဖယ်ထားပေးပါမည်။ ထို့ကြောင့် ASCII ဖောင့်များမှ ပြောင်းသောအခါ အင်္ဂလိပ် စကားလုံးများမှာ မူလအတိုင်း ကျန်ရှိမည်ဖြစ်ပါသည်။
							အရေးကြီး မှတ်သားရန်အချက်တစ်ခုမှာ။  ။ အင်္ဂလိပ်စကားလုံးသည် အက္ခရာ ၄ လုံး အောက် လျှော့နည်းပါက စကားလုံးတစ်လုံးတည်း ထည့်သွင်းမည့်အစား စကားလုံးတွဲ၍ အသုံးပြုရန် လိုအပ်သည်။</li>
							</ol>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Close</button>
					</div>
					</div>
				</div>
			</div>
			<div  class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Close</button>
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

		<script type="text/javascript">
			// CSSTricks suggested code
			if (typeof jQuery == 'undefined') {
			    document.write(unescape("%3Cscript src='web-interface/js/jquery-1.11.0.min.js' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>
		<script type="text/javascript" src="web-interface/template/js/bootstrap.js"></script>
		<script type="text/javascript" src="web-interface/js/zeroclipboard/ZeroClipboard.js"></script>
		<script type="text/javascript" src="web-interface/js/script.js"></script>
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
