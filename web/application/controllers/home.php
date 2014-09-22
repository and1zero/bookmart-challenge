<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -  
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data['title'] = 'Book-Mart - Home';
        $data['banner'] = array(
            'image' => image_path('banner.png'), 
            'text' => "Grab a copy of Gillian Flynn's global best seller GONE GIRL before its movie adaptation hits the theatres worldwide.",
            'link' => '');
        $this->template->load('main','home', $data);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
