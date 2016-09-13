<html>
 <head>
  <title>PHP Exam</title>
 </head>
 <body>
 	<?php 

 	class Animation {

 		/****************** ANIMATION CLASS ******************
 		This class takes is intended to animate and simulate 
 		the movement of "particles" given a speed and a string
 		of said particles. Each particle in the string specifies
 		a direction (L,R,.), "." signifying no particle. This aims
 		to animate thir movement until no particles remain on screen
 		******************************************************/

 		// method declaration
    	public function animate($speed,$init) {
    		echo "<div style ='font:11px/21px Courier,tahoma,sans-serif;'>";	
        	$str_array = str_split($init);												//convert the string into an array
        	for ($i=0; $i<ceil((count($str_array)/($speed))); $i++){					//iterate until all particles will be off screen
        		$next_array = str_split(str_repeat(".",count($str_array)));				//next_array defaults to all empty particles, and will be filled in later
        		$display_string = implode(" ", $str_array);								//convert array back to a string - sub all characters for X's
        		$display_string = str_replace("LR", "X", $display_string);
        		$display_string = str_replace("L", "X", $display_string);
        		$display_string = str_replace("R", "X", $display_string);
        		
        		echo $display_string;
	        	echo "<br />";

        		for($j=0; $j<count($str_array); $j ++){									//iterate through each array element
	        		if($str_array[$j] == 'L' && ($j-$speed>=0)){						//check for left and check if next element is in array scope
	        			if($next_array[$j-$speed] == 'R'){								//check for overlapping particles
	        				$next_array[$j - $speed] ='LR';
	        			}
	        			else{															//otherwise reassign 'L' to next array
	        				$next_array[$j - $speed] = 'L';
	        			}
	        		}
	        		elseif($str_array[$j] == 'R' && (($j+$speed)<count($str_array))){	//check for right and if next element is in scope
	        			if($next_array[$j+$speed] == 'L'){								//check for overlap
	        				$next_array[$j +$speed] ='LR';
	        			}
	        			else{															//assign 'R' to next array
	        				$next_array[$j + $speed] = 'R';
	        			}
	        			
	        		}
	        		elseif($str_array[$j] == 'LR'){										//if overlap particle, move in both directions
	        			$next_array[$j + $speed] = 'R';
	        			$next_array[$j - $speed] = 'L';
	        		}
	        	}
	        	$str_array = $next_array;												//set the str(display) array = to the generated array
        	}
        	echo "</div>";
    	}
 	}
 		$instance = new Animation;
 		$instance->animate(2, "LRLR.LRLR");
	?> 
 </body>
</html>