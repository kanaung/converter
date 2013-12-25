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
		<?php if(isset($error_message) || isset($type_error) || isset($time)){?>
		<script type="text/javascript">
			(function($) { // An anonymous function with one parameter named $
				// Put your plugin code here
				$(document).ready(function(){
				$('#myModal').modal('show');
				});
			}(jQuery));// Invoke the function with the jQuery object as its argument
		</script>
		<?php } ?>
	</body>

</html>
