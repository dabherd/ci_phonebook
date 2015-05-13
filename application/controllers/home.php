<?php 

class Home extends CI_Controller {

	var $today;

	function __construct() {
		parent::__construct();
		$this->today = date('d/m/Y');
	}

	public function index() {
		$data['main_content'] = 'home_view';

		$data['today'] = $this->today;

		$this->load->view('includes/template', $data);
	}	
}
 ?>

