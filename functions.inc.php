<?php

$BASE_URL = "http://catalogue.library.brocku.ca/";
$START_T_LABEL = '<div class="bibDisplayContentMain">';
$END_T_LABEL = "<!-- close bibDisplayContent -->";

function draw_initial_results($url_in){
	
	global $BASE_URL;
	$dom = new DOMDocument();
	$data = file_get_contents($BASE_URL.urldecode($url_in));
	
	
	@$dom->loadHTML($data);
	$xpath = new DOMXPath($dom);
	
		//Pager Stuff
	$pages = $xpath->evaluate("/html/body/div[@id='main']/div[@id='enclosed_page_container']//td[@class='browsePager']/a");
	
	for ($i = 1; $i < $pages->length; $i++){
		
		if ($pages->item($i)->nodeValue == "Next")
			$nextPageLink = $pages->item($i)->getAttribute('href');
		
		if($pages->item($i)->nodeValue == "Previous")
			$prevPageLink = $pages->item($i)->getAttribute('href');
		
	}
	
	echo "<div align='center'>";
	
	if (isset($prevPageLink)) 
		echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="arrow-l" href="search.php?link='.urlencode($prevPageLink).'">&nbsp;</a>';	
	echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="search" href="index.php">New Search</a>';
	if (isset($nextPageLink)) 
		echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="arrow-r" data-iconpos="right" href="search.php?link='.urlencode($nextPageLink).'">&nbsp;</a>';	

	echo "</div>";
	echo "<br>";
	echo '<ul data-role="listview"   data-dividertheme="c">';
	
	
	$header_data = $xpath->evaluate("/html/body/div[@id='main']/div[@id='enclosed_page_container']//td[@class='browseHeaderData']");
	if ($header_data->length == 0){
		echo "<div align='center'><br><br><h3>No Results Found!<br><br></div>";
		return;
	}
	$header_text = $header_data->item(0)->nodeValue;
	
	
	if (isset($header_text))
		echo "<li data-role='list-divider'>".$header_text."</li>";
	
	
	
	
	$hrefs = $xpath->evaluate("/html/body/div[@id='main']/div[@id='enclosed_page_container']/div/table//span/a");
	
	for ($i = 1; $i < $hrefs->length; $i++) {
		$href = $hrefs->item($i);
		$url = $href->getAttribute('href');
		if (preg_match('/^\//',$url))
			$urltext = preg_replace('/\//','/<br>',$href->nodeValue,1);
			//echo '<li><a data-rel="dialog" href="item.php?">'.$href->nodeValue.'</a></li>';
			echo '<li><a href="item.php?'.$url.'" target="_review"  data-rel="dialog" data-transition="pop" >'.$urltext.'</a></li>';
			//$url = $href->getAttribute('href');
		//$text = $href->value;
		//echo $text;
		//echo "<li>".$url."</li>";
		
	}
	echo "</ul>";
	echo "<br>";
	
	

	echo "<div align='center'>";
	if (isset($prevPageLink)) 
		echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="arrow-l" href="search.php?link='.urlencode($prevPageLink).'">&nbsp;</a>';	
	
	echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="search" href="index.php">New Search</a>';
	
	if (isset($nextPageLink)) 
		echo '<a data-role="button" data-theme="a" data-inline="true" data-icon="arrow-r" data-iconpos="right" href="search.php?link='.urlencode($nextPageLink).'">&nbsp;</a>';	

	echo "</div>";
	
	
	
	}
	
function get_query_string($searchtype,$searchstring,$sortby){

	global $BASE_URL;
	$q_type = "";
	$query_url = "";
	
	//defaults to keyword
	switch ($searchtype){
		case "Title":
			$q_type = "t:";
			break;
		case "Author":
			$q_type = "a:";
			break;
		case "Subject":
			$q_type = "d:";
			break;
		default:
			$q_type = "";
		}
	//sortby doesn't need any work
	
	$query_url = "search~S0/X?SEARCH=".$q_type."(".urlencode($searchstring).")&SORT=".$sortby;
	return $query_url;
}
	
function draw_item($url_in){

	global $BASE_URL;
	global $MOBILE_BASE_URL;
	global $START_T_LABEL;
	global $END_T_LABEL;
	$data = file_get_contents($BASE_URL.$url_in);
	$wtable = stristr(stristr($data,$START_T_LABEL),$END_T_LABEL,true);
	//Render picture if there is one
	preg_match('/\<img[^\>]*\>/',$wtable,$cov_image);
	if($cov_image != null)
		echo "<div id='cov_image'>".$cov_image[0]."</div>";
	
	//replace absolute will null
	$wtable = preg_replace('/<a href="\/.*">/','',$wtable);
	$wtable = preg_replace('/<\/a>/','',$wtable);
	echo "<div>";
	echo $wtable;

}
		
?>