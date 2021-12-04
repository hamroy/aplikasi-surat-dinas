<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_master extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->clogin();
	}

	private function clogin()
	{
		if ($this->session->userdata('login') == TRUE /*AND $this->session->userdata('lvl_akses')==1*/) {
		} else {
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}
	private function cloginAkses()
	{
		if ($this->session->userdata('login') == TRUE and $this->session->userdata('lvl_akses') == 1) {
		} else {
			redirect('login/?error=tidakmemilikiAkses&kode=0');
		}
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$this->klasifikasi();
	}
	//+++++++++++++++++++++++++++
	public function klasifikasi()
	{
		$d = [
			'judul' => "Klasifikasi",
			'ma' => "selected", //menu
			'isi' => "master/klasifikasi",
			'sql' => $this->M_master->getKlasisifikasi($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}

	public function instansi()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "Instansi",
			'ma' => "selected", //menu
			'isi' => "master/instansi",
			'sql' => $this->M_master->getInstansi($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}

	public function jsurat()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "Jenis Surat",
			'ma' => "selected", //menu
			'isi' => "master/jsurat",
			'sql' => $this->M_master->getJsurat($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}

	public function bidang()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "Bidang/Unit",
			'ma' => "selected", //menu
			'isi' => "master/bidang",
			'sql' => $this->M_master->getBidang($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}
	public function kegiatan()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "Kegiatan",
			'ma' => "selected", //menu
			'isi' => "master/kegiatan",
			'sql' => $this->M_master->getKegiatan($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}
	public function jabatan()
	{
		$d = [
			'judul' => "Jabatan",
			'ma' => "selected", //menu
			'isi' => "master/jabatan",
			'sql' => $this->M_master->getJabatan($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}
	public function pegawai()
	{
		$d = [
			'judul' => "Pegawai",
			'ma' => "selected", //menu
			'isi' => "master/pegawai",
			'sql' => $this->M_master->getPegawai($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}
	public function user()
	{
		$this->cloginAkses();
		$d = [
			'judul' => "User",
			'ma' => "selected", //menu
			'isi' => "master/user",
			'sql' => $this->M_master->getUser($this->input->get('strnama')),

		];

		$this->load->view('beranda', $d);
	}


	//++++++++++++++++++++++++++++++++++++++++++
	public function klasifikasi_save($value = '')
	{
		$this->M_master->saveKlasifikasi();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master');
	}
	public function instansi_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->saveInstansi();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/instansi');
	}
	public function jsurat_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->saveJsurat();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/jsurat');
	}
	public function bidang_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->saveBidang();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/bidang');
	}
	public function kegiatan_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->saveKegiatan();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/kegiatan');
	}
	public function jabatan_save($value = '')
	{
		$this->M_master->saveJabatan();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/jabatan');
	}
	public function pegawai_save($value = '')
	{
		$this->M_master->savePegawai();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/pegawai');
	}
	public function user_save($value = '')
	{
		$this->cloginAkses();
		$cp = $this->M_master->saveUser();
		if ($cp == 1) {
			$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal disimpan');
		}
		redirect('C_master/user');
	}

	//++++++++++++++++++++++++++++++++++++++++++

	public function klasifikasiEdit($value = '')
	{
		$this->load->view('master/editKlasifikasi');
	}

	public function instansiEdit($value = '')
	{
		$this->load->view('master/editInstansi');
	}
	public function jsuratEdit($value = '')
	{
		$this->load->view('master/editJsurat');
	}
	public function bidangEdit($value = '')
	{
		$d = [
			'judul' => "Bidang/Unit",
		];
		$this->load->view('master/editBidang', $d);
	}
	public function kegiatanEdit($value = '')
	{
		$d = [
			'judul' => "Kegiatan",
		];
		$this->load->view('master/editkegiatan', $d);
	}
	public function jabatanEdit($value = '')
	{
		$d = [
			'judul' => "Jabatan",
		];
		$this->load->view('master/editJabatan', $d);
	}
	public function pegawaiEdit($value = '')
	{
		$d = [
			'judul' => "Pegawai",
		];
		$this->load->view('master/editPegawai', $d);
	}
	public function userEdit($value = '')
	{
		$d = [
			'judul' => "User",
		];
		$this->load->view('master/editUser', $d);
	}

	//++++++++++++++++++++++++++++++++++++++++++++

	public function klasifikasiedit_save($value = '')
	{

		$this->M_master->upKlasifikasi();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master');
	}

	public function instansiedit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upInstansi();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/instansi');
	}

	public function jsuratedit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upJsurat();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/jsurat');
	}
	public function bidangedit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upBidang();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/bidang');
	}
	public function kegiatanedit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upKegiatan();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/kegiatan');
	}
	public function jabatanedit_save($value = '')
	{

		$this->M_master->upJabatan();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/jabatan');
	}
	public function pegawaiedit_save($value = '')
	{

		$this->M_master->upPegawai();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/pegawai');
	}
	public function useredit_save($value = '')
	{
		$this->cloginAkses();
		$this->M_master->upUser();
		$this->session->set_flashdata('pesan', 'Data berhasil disimpan');
		redirect('C_master/user');
	}

	//+++++++++++++++++++++++++++++++++++++++
	public function klasifikasidel($value = '')
	{
		$this->M_master->delKlasifikasi();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master');
	}
	public function instansiDel($value = '')
	{
		$this->cloginAkses();
		$this->cloginAkses();
		$this->M_master->delInstansi();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/instansi');
	}

	public function jsuratDel($value = '')
	{
		$this->cloginAkses();
		$this->M_master->delJsurat();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/jsurat');
	}
	public function bidangDel($value = '')
	{
		$this->cloginAkses();
		$this->M_master->delBidang();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/bidang');
	}
	public function kegiatanDel($value = '')
	{
		$this->cloginAkses();
		$this->M_master->delKegiatan();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/kegiatan');
	}
	public function jabatanDel($value = '')
	{
		$this->M_master->deljabatan();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/jabatan');
	}
	public function pegawaiDel($value = '')
	{
		$this->M_master->delPegawai();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/pegawai');
	}
	public function userDel($value = '')
	{
		$this->cloginAkses();
		$this->M_master->delUser();
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		redirect('C_master/user');
	}

	//+++++++++++++++++++++++++++++++++++++



}
