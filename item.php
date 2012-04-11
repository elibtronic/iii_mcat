<!DOCTYPE html> 
<html> 
	<head> 
	<title>Mobile Catalogue Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<?php include('functions.inc.php'); ?>
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<a href="javascript:self.close();" data-icon="delete" class="ui-btn-left">Close</a>
		<h1>Details</h1>
	</div><!-- /header -->

	<div data-role="content">
	<?php
	$url = $_SERVER["QUERY_STRING"];
	draw_item($url);
	?>
	</div><!-- /content -->

<div data-role="footer">
	<div data-role="navbar">
		<ul>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->


<script type="text/javascript">
/*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/
</script>
</div><!-- /page -->

</body>
</html>