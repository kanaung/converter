<?php /*footer file*/ ?>
	</div><!-- end wrap -->
    <footer id="footer">
      <div class="container">
        <p class="text-muted credit">Developed by <a href="http://www.thwin.net">Sithu Thwin</a> and Powered by <a href="http://www.myanmapress.com/">MyanmaPress</a>.</p>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script-->
		<script type="text/javascript">
			// CSSTricks suggested code
			if (typeof jQuery == 'undefined') {
			    document.write(unescape("%3Cscript src='js/jquery-1.10.2.min.js' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>

		<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Our main JS file -->
		<script src="js/script.js"></script>
		<?php if(isset($error_message) || isset($type_error) ){?>
		<script type="text/javascript">
			(function($) { // An anonymous function with one parameter named $
				// Put your plugin code here
				$(document).ready(function(){
				$('#myModal').modal('show');
				});
			}(jQuery));// Invoke the function with the jQuery object as its argument
		</script>
		<?php } elseif(isset($time)){ ?>
		<script type="text/javascript">
			(function($) { // An anonymous function with one parameter named $
				// Put your plugin code here
				$(document).ready(function(){
				//$(".alert").alert("close");
				$('div').removeClass('hide-time');

				});

			}(jQuery));// Invoke the function with the jQuery object as its argument
		</script>
		<style>
			.hide-time{
			 display:block;
				}
		</style>
		<?php }else { ?>
			<style>
			.hide-time{
			 display:none;
				}
			</style>

		<?php } ?>
		<script type="text/javascript">
			(function($) { // An anonymous function with one parameter named $
				// Put your plugin code here
				var result = [];
				
				function loop_object(d,e,f)
					{
						for(var key in d)
						{
							if(d.hasOwnProperty(key))
							{
								if(typeof d[key] == "object")
								{
									loop_object(d[key],e,key);
								}
								else
								{
									if(d[key]==e) //found is set for not overwriting first occurence
									{
										result.push(f); //push key into array
									}
								}
							}
						}
					}
				$("select#ifont").change(function() {
				var ifont = $("select#ifont").val();
				var font_list =<?php echo json_encode($font_list); ?>;
				loop_object(font_list,ifont,'');
				console.log(result.join());
				result = []; //resetting array for next time usage without reloading page
				//alert(result);
				});
			}(jQuery));// Invoke the function with the jQuery object as its argument
		</script>
	</body>

</html>
