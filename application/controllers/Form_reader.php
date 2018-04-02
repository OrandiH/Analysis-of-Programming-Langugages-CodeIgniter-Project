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
	<p class="text-success display-2">Big Step Operational Semantics</p>
	<?php
	class Form_reader extends CI_Controller{
	# Programmer:Orandi Harris
		
		public function processInput()
		{
			# Controller to handle form input
			$this->load->helper('url');//Needed to access file path of project
			$home = base_url();//Returns the base url of this project(localhost/CIAPLBlog)
			$form_data = $this->input->post();//Get form content
			echo "<p class='display-4'>$form_data[input1]</p><br/>";
			$data = (explode(" ", $form_data["input1"]));

			$index = 0;
			//Parse through array for specific characters
				echo "<p class='display-4'>< x,σ > ⇓ ".$data[$index]." &nbsp;&nbsp;&nbsp;&nbsp; < y,σ > ⇓". $data[$index + 2]."</p><br/>";
				//Look at left hand side of expression at the index of 1 for a specific sign
					if($data[$index + 1] == '+'){
						$tempResult = $data[$index] + $data[$index + 2];
						$string1 = "x + y";
						echo "<p class='display-4'> < x + y,σ > ⇓ " .$tempResult."</p>";
						
					}
					if($data[$index + 1] == '*'){
						$tempResult = $data[$index] * $data[$index + 2];
						$string1 = "x * y";
						echo "<p class='display-4'> < x * y,σ > ⇓ " .$tempResult. "</p>";
						
					}
					if($data[$index + 1] == '-'){
						$tempResult = $data[$index] - $data[$index + 2];
						$string1 = "x - y";
						echo "<p class='display-4'> < x - y,σ > ⇓ " .$tempResult."</p>";
						
					}
					if($data[$index + 1] == '/'){
							$tempResult = $data[$index] / $data[$index + 2];
							$string1 = "x / y";
							echo "<p class='display-4'> < x / y,σ > ⇓ " .$tempResult."</p>";
							
					}
					//Look at the right hand side of expression for a particular sign
					if($data[$index + 3] == '-'){
							echo "<p class='display-4'> < z,σ > ⇓ ". $data[$index + 4]."</p>";
							$string2 = "- z";
							$result = $tempResult - $data[$index + 4];
							
					}

					if($data[$index + 3] == '+'){
						$string2 = "+ z";
						echo "<br/> <p class='display-4' > < z,σ > ⇓ ". $data[$index + 4]."</p>";
						$result = $tempResult + $data[$index + 4];
						
					}

					if($data[$index + 3] == '*'){
						$string2 = "* z";
						echo "<p class ='display-4' >< z,σ > ⇓ ". $data[$index + 4]."</p>";
						$result = $tempResult * $data[$index + 4];
						
					}
					if($data[$index + 3] == '/'){
						$string2 = "/ z";
						echo "<p class='display-4'> < z,σ > ⇓ ". $data[$index + 4]."</p>";
						$result = $tempResult / $data[$index + 4];
						$index = 5;
					//if no third argument was given
					}else if(empty($data[$index + 3])){
						echo "No third argument given.<br/>";
					}
					else {
					//Display final result
						echo "<br/>";
						echo " <p class = 'display-4'> < ".$string1." ".$string2.",σ>"." ⇓ ".$result."</p>";
					}
			echo "<button><a href=$home>Return to home page</a></button>";
		}

	}
?>

</body>
</html>
