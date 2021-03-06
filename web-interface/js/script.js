$(document).ready(function()
{
	$('#time_container').hide();
	ZeroClipboard.config({swfPath: "./web-interface/js/zeroclipboard/ZeroClipboard.swf"});
	var client = new ZeroClipboard($(".btn-clipboard"));
	client.on( 'ready', function(event) 
	{
        client.on( 'aftercopy', function(event) 
        {
        	$('#output').select();
        	alert('ေကာ္ပီကူးၿပီးပါၿပီ။');
        });
    });
	$('form#converter').submit(function(e)
	{
		var formData = $(this).serialize();
		e.preventDefault();
		if($('#ifont').val()=="")
		{
			alert('Please select input font!');
			return 0;
		}
		if($('#input').val()=="")
		{
			return 0;
		}
		$.ajax({
			type: 'post',
			url: 'web-interface/ajax.php',
			data: $('form#converter').serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) 
			{
				output_text = data.output_text;
				if(data.output_text)
				{
					$('#output').text(data.output_text);
					$('#ajax_output').text(data.output_text);
				}
				$('#convert_time').text(data.time);
				$("#output").css("font-family",data.ofont_family);
				$("#ajax_output").css("font-family",data.ofont_family);
				$("textarea#input").css("font-family",data.ifont_family);
				var ofont_selector = "#ofont #"+data.ochecked;
				var ifont_selector = "#ifont #"+data.ochecked;
				$(ofont_selector).attr('selected');
				$(ifont_selector).attr('selected');
				$('#time_container').show();
				$('#output').focus();
	        }
	    });
	    $('#input').focus(function(e)
    	{
    		$(this).select();
    	});
	    $('#output').focus(function(e)
    	{
    		$(this).select();
    	});
	});
	
});
