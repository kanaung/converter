$(function () {


			$("body").removeClass('no-js');
			$(document).ready(function() {
				var ifont = $("select#ifont").val();
				$("#input").css("font-family",ifont);
				switch(ifont) {
					case 'win innwa':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'm-myanmar':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'kannaka':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'nld1':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;						
					default:
						$("#input").css("font-family","Myanmar3, Tharlon, Padauk");
					break;
				}
				var ofont = $("select#ofont").val();
				$("#output").css("font-family",ofont);
			});
			$("select#ifont").change(function() {
				var ifont = $("select#ifont").val();
				$("#input").css("font-family",ifont);
				switch(ifont) {
					case 'win innwa':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'm-myanmar':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'kannaka':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					case 'nld1':
						$("div#ascii-controls").removeClass('hide-ascii-controls');
					break;
					default:
						$("#input").css("font-family","Myanmar3, Tharlon, Padauk");
					break;
				}
			});

			$("select#ofont").change(function() {
				var ofont = $("select#ofont").val();
				$("#output").css("font-family",ofont);

			});

			$("form#converter").submit(function(){
				$("#output").empty();
				$("#loading_animation").bind({
				ajaxStart: function() { $(this).show(); },
				ajaxStop: function() { $(this).hide(); }
				});
				var ofont = $("select#ofont").val();
				$("#output").css("font-family",ofont);
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
