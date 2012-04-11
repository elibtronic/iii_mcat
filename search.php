
<!DOCTYPE html> 
<html> 
	<head> 
	<title>Mobile Catalogue Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href=".././images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<?php include('./functions.inc.php'); ?>
</head> 
<body>
<div data-role="page">

	<div data-role="header">
	
		<h1>Catalogue Search</h1>
	</div><!-- /header -->
	<div data-role="content">

	
    <?php
	
		if (!isset($_GET["searchtype"]) && !isset($_GET["link"]))
			header('Location: index.php');
	
		if (isset($_GET["searchtype"]))
			$searchtype = $_GET["searchtype"];
		if (isset($_GET["searchstring"]))
			$searchstring = $_GET["searchstring"];
		if (isset($_GET["sort"]))
			$sortby = $_GET["sort"]; 
	?>
	<?php
			//first time through there will be no link
			if(isset($_GET["link"])){
				draw_initial_results(urlencode($_GET["link"]));
			}
			else
				draw_initial_results(get_query_string($searchtype,urlencode($searchstring),$sortby),$searchtype,$searchstring,$sortby);

		?>	  
	</div>
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
<?php echo $data; ?>

  </body>
</html>