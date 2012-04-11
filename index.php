<?php
//Cookie
?>

<!DOCTYPE html> 
<html> 
	<head> 
	<title>Mobile Catalogue Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<script type="text/javascript" src=".././jquery/mobile/jquery.mobile.min.js"></script>
	<?php include('./functions.inc.php'); ?>
</head> 
<body> 

<div data-role="page">

	<div data-role="header" data-position="inline" data-backbtn="false">
		<h1>Catalogue Search</h1>
	</div><!-- /header -->

	<div data-role="content">
	<div data-role="fieldcontain" align="center">
	<form title="Search Books" method="GET" action="search.php">
		<label for="searchstring"></label>
		<input name="searchstring" size="30" maxlength="75" type="search" value="">
		<select name="searchtype" title="Select Type">
		<option value="Keyword">Search Type</option>
        <option value="Keyword">Keyword</option>
        <option value="Title">Title</option>
        <option value="Author">Author</option>
        <option value="Subject">Subject</option>
      </select>
      <select name="sort">
		<option value="D">Sort By</option>
        <option value="D">Relevance</option>
        <option value="AX">Title</option>
		<option value="DX">Date</option>
      </select>
      <input value="Search" data-theme="b" type="submit">
	</form>
	</div>
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