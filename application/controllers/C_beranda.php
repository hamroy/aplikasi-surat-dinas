<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_beranda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->clogin();
		
	}

	private function clogin()
	{
		if($this->session->userdata('login')==TRUE /*AND $this->session->userdata('lvl_akses')==1*/){
		}else{
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user=$this->session->userdata('id_user');
	}

	public function index()
	{
		$this->load->model('M_semple');
		$this->load->view('beranda');
	}

	public function profil()
	{
		$this->clogin();
		$this->load->model('M_master');
		
		$d=[
			'judul' => " PROFIL",
			'isi' => "profil/index",
			'sql' => '',
		];

		$this->load->view('beranda',$d);
	}

	public function gantiSandi()
	{
		$this->clogin();
		$d=[
			'judul' => " GANTI PASSWORD",
			'isi' => "profil/gantiSandi",
			'sql' => '',

		];

		$this->load->view('beranda',$d);
	}

	public function prosesGantiSandi()
	{
		$this->clogin();
		$user 	= $_SESSION['id_user'];
		$pwd	= $_POST['pwd'];
		$cari = "UPDATE tbuser SET pwd='$pwd' WHERE id_user='$user'";
		echo $user;
		echo $pwd;
		echo $this->db->query($cari);

		redirect('C_login/logout');
	}

	public function prosesGantiProfil()
	{
		$this->clogin();
		$user 	= $_SESSION['id_user'];
	
		$config['upload_path']          = 'profil/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('poto'))
        {
                $file_name = 'error';

                
        }
        else
        {
                $file_name = $this->upload->data('file_name');
                
        }
        echo $file_name;
        $cari = "UPDATE tbuser SET img='$file_name' WHERE id_user='$user'";
		$this->db->query($cari);

		redirect('C_login/logout');
	}
	
	

}
