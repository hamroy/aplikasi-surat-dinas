<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sett extends MY_user {

	function __construct()
	{
		parent::__construct();

		$this->cloginA();
		$this->load->model('M_set');
	}
	

	public function index()
	{
		
		
		$d=[
			'judul' => " SETTING SISTEM",
			'isi' => "set/index",
			'sql' => $this->M_set->get_setAksesUSer(),
		];

		$this->load->view('beranda',$d);
	}

	public function aksesUSer($value='')
	{
		# code...
		$s=$this->input->post('status');
		$value=[
			'js_set'=>1,
			'status'=>$s,
			'tgl'=>$this->M_set->tglpc(),

		];
		
		$this->M_set->up_setAksesUSer($value);
		$this->session->set_flashdata('pesan',"Sukses");
		redirect('C_sett');
	}


}
