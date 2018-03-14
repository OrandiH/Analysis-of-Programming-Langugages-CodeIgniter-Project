<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Define routes
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1'; //to get any page from the views
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
