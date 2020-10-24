<!DOCTYPE html>
<html>
<head>
	<title>Osky Interactive</title>
	  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script>
$(document).ready(function(){
  $(".news").each(function(i) {
    $(this).delay(300 * i).fadeIn(500);
   
}); 
});
</script>
	<style>
		body {
			margin:0;
			font-family: Helvetica;
			}
		#wrapper {
			background-color: #f2f2f2;
			padding: 0px;
			}
		#container {
			background-color: #fff;
			max-width:1000px;
			margin: auto;
			border-left: 1px #000 solid;
			border-right: 1px #000 solid;
			padding: 0 30px 0 30px;
			}
		.news {
			border-bottom: 1px #000 solid;
			padding: 10px 0 30px 0;
			display: none;
			}
		.more {
			float: right;
			text-decoration: none;
			}
		.more:hover {
			text-decoration: underline;
			}
		img {
			padding-right: 15px;
			}
		.date {
			font-style: italic;
			text-transform: uppercase;
			font-size: 0.8em;
			color: #727272;
			margin-top: -15px;
			}
	</style>
</head>
<body>
<div id="wrapper">
	<div id="container">
<?php
$url = file_get_contents("http://exam.oskyweb.com/101/oskyinteractive.xml");
$xml =  simplexml_load_string($url);
$articles = array();

foreach ($xml as $item) {
          $articles[] = $item;
                };

     usort($articles, function ($a, $b) {
           return strcmp($a->title, $b->title);
                });

foreach($articles as $item) {
  
  echo "<div class=\"news\"><h2>". $item->title . "</h2>";
  $date = date_create($item->pubDate);
  echo "<p class=\"date\">". date_format($date,"l\, jS \of\ F Y h:i a") . " | Category: " . $item->category . "</p> ";
  echo "<p>" . $item->description . "</p>" ;
  echo "<a href=".$item->link." class=\"more\">Read More</a><br /></div>";
} 


?>
</div>
</div>

</body>
</html>

