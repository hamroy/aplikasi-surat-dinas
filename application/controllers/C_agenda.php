<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agenda extends MY_user {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_agenda');
		$this->load->model('M_master');
		$this->load->library('pagination');
		$this->load->model('M_input');
	}
	private function confPag($url = "'C_input/index'",$numrows,$per_page)
	{
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $numrows;		
		$config['per_page'] = $per_page; /*Jumlah data yang dipanggil perhalaman*/
		$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
		$config['num_links'] = 10;
		/*Class css pagination yang digunakan*/
		$config['full_tag_open'] = "<ul class='pagination center'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='active'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);
	}

	public function index()
	{
		$this->cloginA();
		$d=[
			'judul' => " Agenda Surat Perintah Tugas ",
			'li' => "selected", //menu
			'isi' => "listAgenda/ASPT",
			'sql' => $this->M_agenda->listSuratSPT($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sPenugasan()
	{
		$this->clogin();
		$d=[
			'judul' => " Agenda Surat Penugasan",
			'li' => "selected", //menu
			'isi' => "listAgenda/ASPenugasan",
			'sql' => $this->M_agenda->listSuratSPenugasan($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	
	public function sKeluar()
	{
		$cari=$this->input->get('strnama');
		$get_all=$this->M_input->getsKeluar($cari);
		$numrows=$get_all->num_rows();
		$per_page = 20;
					
		$dari= $this->uri->segment(3);
		$url = "C_agenda/sKeluar";
		
		$this->confPag($url,$numrows,$per_page);

		$d=[
			'judul' => " Agenda Surat Keluar ",
			'in' => "selected", //menu
			'isi' => "listAgenda/sKeluar",
			'sql' => $this->M_input->getsKeluar($cari,$per_page,$dari),
			'halaman' => $this->pagination->create_links(),
			'numrows' => $numrows,
		];

		$this->load->view('beranda',$d);
	}
	public function sMasuk()
	{
		$d=[
			'judul' => " Agenda Surat Masuk ",
			'in' => "selected", //menu
			'isi' => "listAgenda/sMasuk",
			'sql' => $this->M_input->getsMasuk($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sKeputusan()
	{
		$d=[
			'judul' => " Agenda Surat Keputusan ",
			'in' => "selected", //menu
			'isi' => "listAgenda/sKeputusan",
			'sql' => $this->M_input->getsKeputusan($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	
	public function sPTNA()
	{
		$js='SPT';
		$d=[
			'judul' => " Agenda Surat Perintah Tugas Non Anggaran ",
			'in' => "selected", //menu
			'isi' => "listAgenda/sPTNA",
			'sql' => $this->M_input->getsPTA($this->input->get('strnama'),$js),
		];

		$this->load->view('beranda',$d);
	}

	public function lapPerjalananDinas()
	{
		$js='LPD';
		$ijs=9;
		$d=[
			'judul' => " Agenda Laporan Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "listAgenda/sLapPD",
			'sql' => $this->M_input->getsLapPD($this->input->get('strnama')),
		];

		$this->load->view('beranda',$d);
	}
	public function notaDinas()
	{
		$js='ND';
		$ijs=10;
		$d=[
			'judul' => " Nota Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "listAgenda/sNotaDinas",
			'sql' => $this->M_input->getsNotaDinas($this->input->get('strnama')),
		];

		$this->load->view('beranda',$d);
	}
	
	//================================
	public function sPerjalananDinas()
	{
		$js='ND';
		$ijs=10;
		$d=[
			'judul' => " Agenda Surat Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "listAgenda/sPPD",
			'sql' => $this->M_input->getsPPD($this->input->get('strnama')),
		];

		$this->load->view('beranda',$d);
	}
	

}
