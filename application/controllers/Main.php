<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index() {
		$this->loadView(null, null);
	}

	public function setting_page() {
		$class=$this->uri->segment(1);
		$method=$this->uri->segment(2);

		if (@is_file(VIEWPATH."/".$class."/".$method.'.php')) {
			$this->loadView(null, null);
		} else {
			$this->load404();
		}
		
	}

}
