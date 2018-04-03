    <?php
    class Axiomatic extends CI_Controller{

        public function __construct()
        {
            parent::__construct();

            //load base url
            $this->load->helper('url');
        }

        public function signCheck($value)
        {
            switch ($value) {
                case '/':
                    return "*";
                    break;
                case '*':
                    return "/";
                    break;
                case '+':
                    return "-";
                    break;
                case '-':
                    return "+";
                    break;
                default:
                    return false;
                    break;
            }
        }

        public function AxiomaticGod()
        {
            if($this->input->post() != NULL)
            {
                //home url
                $home = base_url();
                //post data
                $postData = $this->input->post("AxiomaticSemanticsSelect");

                //we store the original string here
                $data['original_data'] = $postData;        
                //then we remove everything before the equal sign
                $edited_data = explode("=", $postData);
                //then we store everything after the equal sign in the data['edited_data'] index
                $data['edited_data'] = $edited_data;


                /**
                 * Here we simply split the string in two 
                 * where there is a space.
                 */
                $string = implode($data['edited_data']);
                $space = strrpos($string, ' ');
                $last_chunk = substr($string, $space);
                $first_chunk = substr($string, 1, $space);

                /**
                 * Then we use the last chunk of the expression 
                 * so we can remove the curly braces
                 */
                $last_chunk = preg_replace('/[{}]/', '', $last_chunk);

                /**
                 * Then we remove all values before the less than
                 * or greater than sign
                 */
                if(strstr($last_chunk, "<"))
                { $last_chunk = strstr($last_chunk, "<"); }
                else{ $last_chunk = strstr($last_chunk, ">"); }


                /**
                 * Next step is to move each element from the right
                 * to the left taking into consideration the mathematical 
                 * signs and there opposites
                 */
                    $first_chunk_array = str_split($first_chunk);
                    $last_chunk_array = str_split($last_chunk);

                    /**
                     * Here we being popping each value from the first chunk
                     * and pushing onto the last chunk array
                     */
                    $first_chunk_array_size = count($first_chunk_array);
                    

                    //knows last element in array
                    $firstElement = $first_chunk_array[0];

                    //for( $x = first_chunk_array_size; $x <= first_chunk_array_size; $x-- )
                    for($x = 0; $x <= $first_chunk_array_size; $x++)
                    {
                        if($first_chunk_array[$x] != $firstElement)
                        {
                            
                            $first_temp = array_pop($first_chunk_array);

                            /**
                             * Here we pop the last element of the array check
                             * to see if it is a mathematical symbol, if it is
                             * the signCheck method returns the opposite of that
                             * symbol which we then push onto the last chunk array
                             */
                            if($this->signCheck($first_temp) != false)
                            {
                                $first_temp = $this->signCheck($first_temp);
                                array_push($last_chunk_array, $first_temp);
                            }
                            array_push($last_chunk_array, $first_temp);
                        }
                        else{break;}
                    }
                
                
                /**
                 * Here we assign values to the data array to be printed in the
                 * axiomatic semantics page
                 */
                $data['first_half'] = $first_chunk;
                $data['last_half'] = $last_chunk;

                //$data['last_half_push_pop'] = ;
                
                //Load views from templates and then main pages folder
                $this->load->view('templates/header');
                $this->load->view('pages/axSem', $data);
                $this->load->view('templates/footer');
            }
            else{ echo "Sorry no option was selected from dropdown.";}
        }


        public function something()
        {
            /**
                     * Move internal array pointer to the end then move
                     * back one place to second to last character
                     * */ 
                    end($first_chunk_array);
                    $second_to_last = prev($first_chunk_array);

                    if(signCheck($second_to_last) != false)
                    {
                        
                    }
        }

    }
    ?>
