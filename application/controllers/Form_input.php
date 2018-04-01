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
	class Form_input extends CI_Controller{

		
		public function processData()
		{
			# code...
			$this->load->helper('url');
			$home = base_url();
			$form_data = $this->input->post();
			echo "<p class='display-4'>$form_data[input1]</p><br/>";
			$data = (explode(" ", $form_data["input1"]));

			$index = 0;
				echo "<p class='display-4'>< x,σ > -> ".$data[$index]." &nbsp;&nbsp;&nbsp;&nbsp; < y,σ > ->". $data[$index + 2]."</p><br/>";

					if($data[$index + 1] == '+'){
						$tempResult = $data[$index] + $data[$index + 2];
						$string1 = "x + y";
						echo "<p class='display-4'> < x + y,σ > -> " .$data[$index]." + ".$data[$index + 2]."</p>";
						echo "< " .$data[$index]." + ".$data[$index + 2]."  > ⇓ ". $tempResult;
						
					}
					if($data[$index + 1] == '*'){
						$tempResult = $data[$index] * $data[$index + 2];
						$string1 = "x * y";
						echo "<p class='display-4'> < x * y,σ > -> " .$data[$index]." * ".$data[$index + 2]."</p>";
						echo "< " .$data[$index]." * ".$data[$index + 2]."  > ⇓ ". $tempResult;
						
					}
					if($data[$index + 1] == '-'){
						$tempResult = $data[$index] - $data[$index + 2];
						$string1 = "x - y";
						echo "<p class='display-4'> < x - y,σ > -> " .$data[$index]." - ".$data[$index + 2]."</p>";
						echo "< " .$data[$index]." - ".$data[$index + 2]."  > ⇓ ". $tempResult;
						
					}
						if($data[$index + 1] == '/'){
							$tempResult = $data[$index] / $data[$index + 2];
							$string1 = "x / y";
							echo "<p class='display-4'> < x / y,σ > -> " .$data[$index]." / ".$data[$index + 2]."</p>";
						echo "< " .$data[$index]." / ".$data[$index + 2]."  > ⇓ ". $tempResult;
							
						}
						if($data[$index + 3] == '-'){
							echo "<p class='display-4'> < z,σ > -> ". $data[$index + 4]."</p>";
							$string2 = "- z";
							$result = $tempResult - $data[$index + 4];
							
							
						}

					if($data[$index + 3] == '+'){
						$string2 = "+ z";
						echo "<br/> <p class='display-4' > < z,σ > -> ". $data[$index + 4]."</p>";
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
					}else if(empty($data[$index + 3])){
						echo "No third argument given.<br/>";
					}
					else {
						# code...
						echo "<br/>";
						echo " <p class = 'display-4'> < ".$string1." ".$string2.",σ>"." ⇓ ".$result."</p>";
					}

					
					
			echo "<button><a href=$home>Return to home page</a></button>";
		}

	}
?>

</body>
</html>
