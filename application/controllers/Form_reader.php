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

		
		public function processInput()
		{
			# code...
			$this->load->helper('url');
			$home = base_url();
			$form_data = $this->input->post();
			echo "<p class='display-4'>$form_data[input1]</p><br/>";
			$data = (explode(" ", $form_data["input1"]));
			// echo "<br/>";
			// print_r($data);
			// echo "<br/>";
			// echo sizeof($data);
			echo "<p class='display-4'>< x,σ > ⇓ $data[0] &nbsp;&nbsp;&nbsp;&nbsp; < y,σ > ⇓ $data[2]</p><br/>";
			if($data[1] == '+'){
				$tempResult = $data[0] + $data[2];
				$string1 = "x + y";
				echo "<p class='display-4'> < x + y,σ > ⇓ " .$tempResult."</p>";
			}

			if($data[1] == '*'){
				$tempResult = $data[0] * $data[2];
				$string1 = "x * y";
				echo "<p class='display-4'> < x * y,σ > ⇓ " .$tempResult. "</p>";
			}

			if($data[1] == '-'){
				$tempResult = $data[0] - $data[2];
				$string1 = "x - y";
				echo "<p class='display-4'> < x - y,σ > ⇓ " .$tempResult."</p>";
			}

			if($data[1] == '/'){
				$tempResult = $data[0] / $data[2];
				$string1 = "x / y";
				echo "<p class='display-4'> < x / y,σ > ⇓ " .$tempResult."</p>";
			}


			if($data[3] == '-'){
				echo "<p class='display-4'> < z,σ > ⇓ ". $data[4]."</p>";
				$string2 = "- z";
				$result = $tempResult - $data[4];
			}

			if($data[3] == '+'){
				$string2 = "+ z";
				echo "<br/> <p class='display-4' > < z,σ > ⇓ ". $data[4]."</p>";
				$result = $tempResult + $data[4];
			}

			if($data[3] == '*'){
				$string2 = "* z";
				echo "<p class ='display-4' >< z,σ > ⇓ ". $data[4]."</p>";
				$result = $tempResult * $data[4];
			}
			if($data[3] == '/'){
				$string2 = "/ z";
				echo "<p class='display-4'> < z,σ > ⇓ ". $data[4]."</p>";
				$result = $tempResult / $data[4];
			}else if(empty($data[3])){
				echo "No third argument given.";
				echo $tempResult;
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
