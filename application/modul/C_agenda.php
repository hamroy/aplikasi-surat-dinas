<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agenda extends MY_admin {

	public function index()
	{
		$this->clogin();
		$d=[
			'judul' => " Agenda Surat Keputusan ",
			'li' => "selected", //menu
			'isi' => "listAgenda/ASPT",
			'sql' => $this->M_input->getsKeputusan($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	
	

}

