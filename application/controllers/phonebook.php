<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phonebook extends CI_Controller {

	public function index() {

		$this->load->view('includes/header');

		// $this->load->model('Info');
		
		// $this->Info->i_name = 'Paul';
		// $this->Info->i_phone = '09229499214';
		// $this->Info->i_email = 'panicbass2526@gmail.com';
		// $this->Info->i_address = 'Lahug, Cebu City';

		// $this->Info->save();
		// echo '<tt><pre>'. var_export($this->Info, TRUE) .'</pre></tt>';
		

		$data = array();

		$this->load->model('Info');
		$info = new Info();
		$info->load(22);
		$data['info'] = $info;

		$this->load->view('phonebooks', $data);

		// $this->load->model('Contact');
		$this->load->view('includes/footer');
	}

	public function add() {
		 // Populate infos
		$this->load->model('Info');
		$infos = $this->Info->get();
		$info_form_options = array();
		foreach($infos as $id => $info) {
			$info_form_options[$id] = $info->i_name;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules(array(
			array(
				'field' => 'c_number',
				'label' => 'Contact Number',
				'rules' => 'required',	
				)
			));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		if (!$this->form_validation->run()) {
			$this->load->view('phonebook_form', array(
				'info_form_options' => $info_form_options
				));
		} else {
			$this->load->model('Contact');
			$contact = new Contact();
			$contact->c_info = $this->input->post('i_id');
			$contact->c_number = $this->input->post('c_number');
			$contact->save();
			$this->load->view('phonebook_form_success', array(
				'contact' => $contact
				));
		}
		
	}
}