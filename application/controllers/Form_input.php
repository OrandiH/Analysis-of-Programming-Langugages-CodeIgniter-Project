<!DOCTYPE html>
<html>
<head>
	<title>CI APL Blog - Operational Semantics</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron">
		<h1>CI APL Blog - Operational Semantics</h1>
	</div>
	<p class="text-success display-2">Small Step Operational Semantics</p>
	<?php
	# Programmer:Orandi Harris
	class Form_input extends CI_Controller{

		
		public function processData()
		{
			# Controller to handle form input
			$this->load->helper('url'); //Needed to access file path of project
			$home = base_url();//Returns the base url of this project(localhost/CIAPLBlog)
			$form_data = $this->input->post(); //Get form content
			echo "<p class='display-4'>$form_data[input1]</p><br/>";
			$data = (explode(" ", $form_data["input1"])); //The explode function returns an array

			$index = 0;
			$leftHandExp = "";
			$tempResult = 0;
			$result = 0;
			//Parse through array for specific characters
				echo "<p class='display-4'>< x,σ > -> ".$data[$index]." &nbsp;&nbsp;&nbsp;&nbsp; < y,σ > ->". $data[$index + 2]."</p><br/>";
			//Look at left hand side of expression at the index of 1 for a specific sign
					if($data[$index + 1] == '+'){
						$tempResult = $data[$index] + $data[$index + 2];
						$string1 = "x + y";
						$leftHandSide = " ".$data[$index]." + ".$data[$index+2];
						echo "<p class='display-4'> < x + y,σ > -> " .$data[$index]." + ".$data[$index + 2]."</p>";
						echo "<p class='display-4'> < " .$data[$index]." + ".$data[$index + 2]."  > ⇓ ". $tempResult."</p><br/>";
						echo "<p class='display-4'> < ". $string1. " ,σ> -> ".$tempResult."</p>";
						$leftHandExp = $string1;
						
					}
					if($data[$index + 1] == '*'){
						$tempResult = $data[$index] * $data[$index + 2];
						$string1 = "x * y";
						$leftHandSide = " ".$data[$index]." * ".$data[$index+2];
						echo "<p class='display-4'> < x * y,σ > -> " .$data[$index]." * ".$data[$index + 2]."</p>";
						echo "<p class='display-4'> < " .$data[$index]." * ".$data[$index + 2]."  > ⇓ ". $tempResult."</p><br/>";
						echo "<p class='display-4'> < ". $string1. " ,σ> -> ".$tempResult."</p>";
						$leftHandExp = $string1;
						
					}
					if($data[$index + 1] == '-'){
						$tempResult = $data[$index] - $data[$index + 2];
						$string1 = "x - y";
						$leftHandSide = " ".$data[$index]." - ".$data[$index+2];
						echo "<p class='display-4'> < x - y,σ > -> " .$data[$index]." - ".$data[$index + 2]."</p>";
						echo "<p class='display-4'> < " .$data[$index]." - ".$data[$index + 2]."  > ⇓ ". $tempResult."</p><br/>";
						echo "<p class='display-4'> < ". $string1. " ,σ> -> ".$tempResult."</p>";
						$leftHandExp = $string1;
						
					}
						if($data[$index + 1] == '/'){
							$tempResult = $data[$index] / $data[$index + 2];
							$string1 = "x / y";
							$leftHandSide = " ".$data[$index]." / ".$data[$index+2];
							echo "<p class='display-4'> < x + y,σ > -> " .$data[$index]." / ".$data[$index + 2]."</p>";
							echo "<p class='display-4'> < " .$data[$index]." / ".$data[$index + 2]."  > ⇓ ". $tempResult."</p><br/>";
							echo "<p class='display-4'> < ". $string1. " ,σ> -> ".$tempResult."</p>";
							$leftHandExp = $string1;
							
						}
					//Look at the right hand side of expression for a particular sign
						if($data[$index + 3] == '-'){
							echo "<p class='display-4'> < z,σ > -> ". $data[$index + 4]."</p>";
							$string2 = "- z";
							$result = $tempResult - $data[$index + 4];
							echo " <p class='display-4'> < ( ".$leftHandExp. ") ".$string2. " ,σ> -> ".$tempResult." - ".$data[$index + 4]."</p><br/>";
							echo "<p class='display-4'> < (" .$leftHandSide. ") - ".$data[$index + 4]. " ,σ> -> ".$result."</p>";

						}

					if($data[$index + 3] == '+'){
						echo "<p class='display-4'> < z,σ > -> ". $data[$index + 4]."</p>";
							$string2 = "+ z";
							$result = $tempResult + $data[$index + 4];
							echo " <p class='display-4'> < ( ".$leftHandExp. ") ".$string2. " ,σ> -> ".$tempResult." + ".$data[$index + 4]."</p><br/>";
							echo "<p class='display-4'> < (" .$leftHandSide. ") + ".$data[$index + 4]. " ,σ> -> ".$result."</p>";
						
					}

					if($data[$index + 3] == '*'){
						echo "<p class='display-4'> < z,σ > -> ". $data[$index + 4]."</p>";
							$string2 = "* z";
							$result = $tempResult * $data[$index + 4];
							echo " <p class='display-4'> < ( ".$leftHandExp. ") ".$string2. " ,σ> -> ".$tempResult." * ".$data[$index + 4]."</p><br/>";
							echo "<p class='display-4'> < (" .$leftHandSide. ") * ".$data[$index + 4]. " ,σ> -> ".$result."</p>";
						
					}
					if($data[$index + 3] == '/'){
						echo "<p class='display-4'> < z,σ > -> ". $data[$index + 4]."</p>";
							$string2 = "/ z";
							$result = $tempResult / $data[$index + 4];
							echo " <p class='display-4'> < ( ".$leftHandExp. ") ".$string2. " ,σ> -> ".$tempResult." / ".$data[$index + 4]."</p><br/>";
							echo "<p class='display-4'> < (" .$leftHandSide. ") / ".$data[$index + 4]. " ,σ> -> ".$result."</p>";
		
					//if no third argument was given
					}else if(empty($data[$index + 3])){
						echo "No third argument given.<br/>";
					}
					//Display final result
					else {
						echo "<br/>";
						echo " <p class = 'display-4'> < (".$string1.") ".$string2.",σ>"." ⇓ ".$result."</p>";
					}

			echo "<button><a href=$home>Return to home page</a></button>";
		}

	}
?>

</body>
</html>
