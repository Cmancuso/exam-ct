<html>
 <head>
  <title>PHP Exam</title>
 </head>
 <body>
 	<?php 
        include_once("animation.php");
 		$instance = new Animation;
 		$return_array = $instance->animate(1, "....L");
 		$instance->display($return_array);
	?> 
 </body>
</html>