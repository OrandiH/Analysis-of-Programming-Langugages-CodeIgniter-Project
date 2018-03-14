<?php
	class Pages extends CI_Controller{
		public function View($page = 'home')
		{
			# code...
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();// if file doesnt exist show 404 error page
			}

			//Title is a index of a data array
			$data['title'] = ucfirst($page);//Make the title of the page be uppercase
			//Load views from templates and then main pages folder
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}


?>