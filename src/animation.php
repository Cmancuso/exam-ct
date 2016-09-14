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
    		$return_array = Array();
    		//convert the string into an array
        	$str_array = str_split($init);	
        	//iterate until all particles will be off screen
        	while (1){
        		//next_array defaults to all empty particles, and will be filled in later				
        		$next_array = str_split(str_repeat(".",count($str_array)));				
        		//convert array back to a string - sub all characters for X's
        		$display_string = implode(" ", $str_array);	
        		$display_string = str_replace("LR", "X", $display_string);
        		$display_string = str_replace("L", "X", $display_string);
        		$display_string = str_replace("R", "X", $display_string);
        		//push to our final array
        		array_push($return_array,$display_string);
        		//exit condition
        		if( implode(" ",$next_array) == $display_string){
        			return $return_array;
        		}
        		//iterate through each array element
        		for($j=0; $j<count($str_array); $j ++){
        			//check for left and check if next element is in array scope
	        		if($str_array[$j] == 'L' && ($j-$speed>=0)){
	        			//check for overlapping particles						
	        			if($next_array[$j-$speed] == 'R'){								
	        				$next_array[$j - $speed] ='LR';
	        			}
	        			//otherwise reassign 'L' to next array
	        			else{															
	        				$next_array[$j - $speed] = 'L';
	        			}
	        		}
	        		//check for right and if next element is in scope
	        		elseif($str_array[$j] == 'R' && (($j+$speed)<count($str_array))){	
	        			//check for overlap
	        			if($next_array[$j+$speed] == 'L'){								
	        				$next_array[$j +$speed] ='LR';
	        			}
	        			//assign 'R' to next array
	        			else{															
	        				$next_array[$j + $speed] = 'R';
	        			}
	        			
	        		}
	        		//if overlap particle, move in both directions
	        		elseif($str_array[$j] == 'LR'){										
	        			$next_array[$j + $speed] = 'R';
	        			$next_array[$j - $speed] = 'L';
	        		}
	        	}
	        	//set the str(display) array = to the generated array
	        	$str_array = $next_array;												
        	}
  
    	}
    	/*******SIMPLE DISPLAY FUNCTION***********/
    	function display($array){
    		echo "<div style ='font:11px/21px Courier,tahoma,sans-serif;'>";
    		for($i=0;$i<sizeof($array); $i++){
    			echo $array[$i];
    			echo "<br />";
    		}
	        echo "</div>";   
    	}
 	}
?>