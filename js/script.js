$(function () {


			$("body").removeClass('no-js');
			$(document).ready(function() {
				var ifont = $("select#ifont").val();
				switch(ifont) {
					case 'ay':
						$("#input").css("font-family","Ayar");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'zg':
						$("#input").css("font-family","Zawgyi-One");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'uni':
						$("#input").css("font-family","Padauk, MyanmarText, Tharlon, Myanmar3");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'win':
						$("#input").css("font-family","Win Innwa");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'mym':
						$("#input").css("font-family","m-myanmar, M-Myanmar1");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'knk':
						$("#input").css("font-family","Kannaka");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'nld':
						$("#input").css("font-family","NLD1");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					default:
						$("#input").css("font-family","Ayar");
					break;
				}
			});
			$("select#ifont").change(function() {
				var ifont = $("select#ifont").val();
				switch(ifont) {
					case 'ay':
						$("#input").css("font-family","Ayar");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'zg':
						$("#input").css("font-family","Zawgyi-One");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'uni':
						$("#input").css("font-family","Padauk, MyanmarText, Tharlon, Myanmar3");
						$("div#ascii-controls").addClass('hide-ascii-controls');
					break;
					case 'win':
						$("#input").css("font-family","Win Innwa");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'mym':
						$("#input").css("font-family","m-myanmar1");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'knk':
						$("#input").css("font-family","Kannaka");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'nld':
						$("#input").css("font-family","NLD1");
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					default:
						$("#input").css("font-family","Ayar");
					break;
				}
			});

			$("select#ofont").change(function() {
				var ofont = $("select#ofont").val();
				//alert(ofont);
				switch(ofont) {
					case 'ay':
						$("#output").css("font-family","Ayar");
					break;
					case 'zg':
						$("#output").css("font-family","Zawgyi-One");
					break;
					case 'uni':
						$("#output").css("font-family","Padauk, MyanmarText, Tharlon, Myanmar3");
					break;
					case 'mym':
						$("#output").css("font-family","m-myanmar1");
					break;
					case 'knk':
						$("#output").css("font-family","Kannaka");
					break;
					case 'nld':
						$("#output").css("font-family","NLD1");
					break;
					default:
						$("#output").css("font-family","Ayar");
					break;
				}
			});

			$("form#converter").submit(function(){
				$("#output").empty();
				$("#loading_animation").bind({
				ajaxStart: function() { $(this).show(); },
				ajaxStop: function() { $(this).hide(); }
				});
			});

			//$("input#inputfile").remove();

/*
			    $('#inputfile').fileupload({
			    	url: 'ajax.php',
			        dataType: 'json',
			        add: function (e, data) {
			            data.context = $("#submit")
			                .click(function () {
			                    data.context = $('#progress').text('Uploading...');
			                    data.submit();
			                });
			        },
			        progressall: function (e, data) {
				        var progress = parseInt(data.loaded / data.total * 100, 10);
				        $('#progress .bar').css(
				            'width',
				            progress + '%'
				        );
				    },
			        done: function (e, data) {
			            $('#progress').text('Upload finished.');
			        }
			    });
			    */
			$('form#converter').submit(function(e) {
					$.ajax({
					type: 'post',
					url: 'ajax.php',
					data: $('form#converter').serialize(),
					dataType: 'json',
					cache: false,
					success: function (data) {
						//{"ofont_family":"Padauk, MyanmarText, Tharlon, Myanmar3","ochecked":"uni","ifont_family":"Ayar","ichecked":"ay","output_text":"asdf"}
						output_text = data.output_text;
						if(data.output_text){
						$('#output').text(data.output_text);
						$('#ajax_output').text(data.output_text);
						}
						$("#output").css("font-family",data.ofont_family);
						$("#ajax_output").css("font-family",data.ofont_family);
						$("textarea#input").css("font-family",data.ifont_family);
						var ofont_selector = "#ofont #"+data.ochecked;
						var ifont_selector = "#ifont #"+data.ochecked;
						$(ofont_selector).attr('selected');
						$(ifont_selector).attr('selected');
/*
                        if(data.ochecked == 'uni'){
                        	$("#ofont #uni").attr('selected');
                        }
                        if(data.ochecked == 'ay'){
                        	$("#ofont #ay").attr('selected');
                        }
                        if(data.ochecked == 'zg'){
                        	$("#ofont #zg").attr('selected');
                        }
                        if(data.ichecked == 'uni'){
                        	$("#ifont #uni").attr('selected');
                        }
                        if(data.ichecked == 'ay'){
                        	$("#ifont #ay").attr('selected');
                        }
                        if(data.ichecked == 'zg'){
                        	$("#ifont #zg").attr('selected');
                        }
                        if(data.ichecked == 'auto'){
                        	$("#ifont #auto").attr('selected');
                        }
*/
                        if(data.error_message || data.type_error){
							$('#error').text(data.error_message);
							$('#error').html('<br>');
							$('#error').text(data.type_error);
							$('#myModal').modal('show');
						}
						if(data.time){
							$('#message').text(data.time);
							$('div').removeClass('hide-time');
						}
						//alert(output);
                    }
                });

                e.preventDefault();
            });
				$('#myTabContent a[href="#home"]').tab('show');
				$('#myTabContent a[href="#uploadsect"]').tab('show');
				$('#myTabContent a[href="#about"]').tab('show');
				$('#myTabContent a[href="#help"]').tab('show');
/*
				$('#ajax_output').focus(function() {
					textarea['ajax_output'].document.execCommand('copy', false, null);
				});
*/
				var inputHeight = $('textarea#input').css('height');
				$('#output').css('height',inputHeight);
				$('#ajax_output').css('height',inputHeight);
 });
