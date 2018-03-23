<?php
	class Form_reader extends CI_Controller{
		public function processInput()
		{
			# code...
			$form_data = $this->input->post();
			print_r($form_data);
			$data = (explode(" ", $form_data["input1"]));
			echo "<br/>";
			print_r($data);
		}
	}

?>