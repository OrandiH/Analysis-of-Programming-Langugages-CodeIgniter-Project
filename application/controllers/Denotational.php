<?php
/*
	Standard Functions
	
	+ preg_replace_callback — Perform a regular expression search and replace using a callback
	+ str_replace — Replace all occurrences of the search string with the replacement string
	+ preg_replace — Perform a regular expression search and replace
	+ strpos — Find the position of the first occurrence of a substring in a string
	+ create_function — Create an anonymous (lambda-style) function
	+ preg_match — Perform a regular expression match

*/
class Denotational extends CI_Controller
{

    const PATTERN = '/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/';
    const PARENTHESIS_DEPTH_CAP = 10;

    public function __construct()
    {
        parent::__construct();

        //load base url
        $this->load->helper('url');
    }

    public function calculate_denotational_semantic()
	{
        if($this->input->post() == NULL)
            return;

        $input = $this->input->post("DenoteInput");
        
        if(strpos($input,	 '+') != null || strpos($input, '-') != null || strpos($input, '/') != null || strpos($input, '*') != null) 
		{
            //Remove white spaces and invalid characters
            $input = str_replace(',', '.', $input);
			$input = preg_replace('[^0-9\.\+\-\*\/\(\)]', '', $input);
			
			echo 'Original Expression: '. $input . '<br>';
			//  Calculate each parenthesis expression
            $index = 0;
            while(strpos($input, '(') || strpos($input, ')'))
			{
                echo 'Evaluate Expression_1: '. $input . '<br>';
				$input = preg_replace_callback('/\(([^\(\)]+)\)/', 'self::callback', $input);
				$index++;
                if($index > self::PARENTHESIS_DEPTH_CAP)
				{
                    break;
                }
            }
            //  Evaluate expression
            if(preg_match(self::PATTERN, $input, $match))
			{
                //echo 'CAL Result' . '<br>';
				//print_r($match);
				//echo '<br>';
				//echo 'Input: ' . $input . '<br>';
				//echo 'Match: ' . $match[0] .'}<br>';
				return $this->compute($match[0]);
            }
            return 0;
        }
        //return $input;
         //Load views from templates and then main pages folder
         $this->load->view('templates/header');
         $this->load->view('pages/denoSem', $input);
         $this->load->view('templates/footer');
    }
    private function compute($input)
	{
		$compute = create_function('', 'return '.$input.';');
		echo 'Expression Result: ' . $compute() . '<br>';
        return 0 + $compute();
    }
    private function callback($input)
	{
		if(is_numeric($input[1]))
		{
			//echo 'Evaluated Expression_callback: '. $input[1] . '<br>';
            return $input[1];
        }
        elseif(preg_match(self::PATTERN, $input[1], $match))
		{
			echo 'Evaluate parenthesis expression: '. $match[0] . '<br>';
            return $this->compute($match[0]);
        }
        return 0;
    }
}

//USE CASE TEST
/*$Cal = new Denotational_semantics();

echo 'TEST CASE' . '<br>'. '<br>';
$result = $Cal->calculate_denotational_semantic('10/5*2+(100/5)*(8-4)');
echo '<br>'. '<br>' . 'TEST CASE'. '<br>';
$result = $Cal->calculate_denotational_semantic('(5+9)*5');
echo '<br>'. '<br>'. 'TEST CASE' . '<br>';
$result = $Cal->calculate_denotational_semantic('(10.2+0.5*(2-0.4))*2+(2.1*4)');
echo '<br>'. '<br>'. 'TEST CASE' . '<br>';
$result = $Cal->calculate_denotational_semantic('(28*5/40+10-3)');*/

?>