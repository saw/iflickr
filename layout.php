<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title><?php echo $title; ?></title>
   <!-- Combo-handled YUI CSS files: -->
   <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css&2.8.0r4/build/base/base-min.css">

</head>
<body>
<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>Header</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">
	
	<?php echo($content); ?>
	
	</div>

	</div>
   <div id="ft" role="contentinfo"><p>Footer</p></div>
</div>
</body>
</html>