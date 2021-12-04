<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_input extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_input');
		$this->load->library('pagination');
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

	public function formKlasifikasi ($js=0)
	{
		switch ($js) {
			case 0:
				$jd=" Agenda Surat Keluar ";
				break;
			
			default:
				$tm_cari=$this->M_master->getKdJenisSurat($js)->row_array();
                $kd_jenis = $tm_cari['kd_jenis'];
                $nm_bidang = $tm_cari['nm_jenis'];

				$jd=$nm_bidang;
				break;
		}

		$d=[
			'judul' => $jd,
			'js' => $js,
			'in' => "selected", //menu
			'isi' => "input/formKlasifikasi",
			'sql' => $this->M_input->getsKeluar($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}

	public function formInputSurat ($kd_klasifikasi='',$js=0)
	{	
		  $gidpeg=$this->M_master->getKdKlasifikasi($kd_klasifikasi);
	      $tm_cari=$gidpeg->row_array();
	      if (!$tm_cari) {
	      	redirect('C_input');
	      }

		$nm_klasifikasi=$tm_cari['nm_klasifikasi'];
		
		switch ($js) {
			case 0:
				$kd=0;
				$jd=" Agenda Surat Keluar ";
				$isi="input/formInputSurat";
				break;
			
			default:
	   			$tm_cari=$this->M_master->getKdJenisSurat($js)->row_array();
                $kd = $tm_cari['kd_jenis'];
                $jd = $tm_cari['nm_jenis'];
                switch ($js) {
                	case 10:
						$isi="input/formInputSNotaDinas";
                		break;
                	case 9:
						$isi="input/formInputSLapPD";
                		break;
                	case 8:
						$isi="input/formInputSPTNA";
                		break;
                	case 7:
						$isi="input/formInputSPenugasan";
                		break;
                	
                	default:
						$isi="input/formInputSPTA";
                		break;
                }

				break;
		}

		$d=[
			'judul' => $jd,
			'kd' =>	$kd,
			'js' => $js,
			'in' => "selected", //menu
			'isi' => $isi,
			'nm_klasifikasi' => $nm_klasifikasi,
			'kd_klasifikasi' => $kd_klasifikasi,
			'sql' => $this->M_input->getsKeluar($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	//=====================================
	public function listKlasifikasi($js=0)
	{
		  $da=[];
		  $kd_k=$_GET['kd_k'];
		  $js=$_GET['js'];
		  if ($kd_k==null or $kd_k==' 'or $kd_k=='') {
		  	exit();
		  }
		  $sql_row=$this->M_master->getKlasisifikasi($kd_k);
		  $bd='';

          foreach ($sql_row->result_array() as $tampil){
          	$bd.="<tr>
  				  <td> ".$tampil['kd_klasifikasi'] ."</td>
                  <td>".$tampil['nm_klasifikasi']."</td>
                  <td><a href=\"".base_url('C_input/formInputSurat/'.$tampil['kd_klasifikasi'].'/'.$js)."\" class=\"btn btn-primary btn-block\">Pilih</a></td>
                  </tr>
          	";

		  }

		  echo $bd;
	}
	//------------------------------------------------
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
	//------------------------------------------------
	public function index()
	{
		$cari=$this->input->get('strnama');
		$get_all=$this->M_input->getsKeluar($cari);
		$numrows=$get_all->num_rows();
		$per_page = 20;
					
		$dari= $this->uri->segment(3);
		$url = "C_input/index";
		
		$this->confPag($url,$numrows,$per_page);
		$d=[
			'judul' => " Agenda Surat Keluar ",
			'in' => "selected", //menu
			'isi' => "input/sKeluar",
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
			'isi' => "input/sMasuk",
			'sql' => $this->M_input->getsMasuk($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sKeputusan()
	{
		$d=[
			'judul' => " Agenda Surat Keputusan ",
			'in' => "selected", //menu
			'isi' => "input/sKeputusan",
			'sql' => $this->M_input->getsKeputusan($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sPTA()
	{
		$d=[
			'judul' => " Agenda Surat Perintah Tugas Anggaran ",
			'in' => "selected", //menu
			'isi' => "input/sPTA",
			'sql' => $this->M_input->getsPTA($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sPTNA()
	{
		$js='SPT';
		$d=[
			'judul' => " Agenda Surat Perintah Tugas Non Anggaran ",
			'in' => "selected", //menu
			'isi' => "input/sPTNA",
			'sql' => $this->M_input->getsPTA($this->input->get('strnama'),$js),
		];

		$this->load->view('beranda',$d);
	}

	public function sPenugasan()
	{
		$js='SP';
		$ijs=7;
		$d=[
			'judul' => " Agenda Surat Penugasan",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "input/sPenugasan",
			'sql' => $this->M_input->getsPenugasan($this->input->get('strnama')),
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
			'isi' => "input/sLapPD",
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
			'isi' => "input/sNotaDinas",
			'sql' => $this->M_input->getsNotaDinas($this->input->get('strnama')),
		];

		$this->load->view('beranda',$d);
	}
	public function sPerjalananDinas()
	{
		$js='ND';
		$ijs=10;
		$d=[
			'judul' => " Agenda Surat Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "input/sPPD",
			'sql' => $this->M_input->getsPPD($this->input->get('strnama')),
		];

		$this->load->view('beranda',$d);
	}
	//================================
	public function inputSptNIP()
	{
		$js='SPT-KEU';
		$ijs=10;
		$id=isset($_GET['id'])?$_GET['id']:'';
		$d=[
			'judul' => " Agenda Surat Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'isi' => "input/sPPD_nip",
			'sql' => $this->M_input->getSPTAId($id),
		];

		$this->load->view('beranda',$d);
	}

	public function inputPenugsaanNIP()
	{
		$js='ND';
		$ijs=10;
		$id=isset($_GET['id'])?$_GET['id']:'';
		$d=[
			'judul' => " Agenda Surat Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'id' =>	$id,
			'isi' => "input/sPenugsaan_nip",
			'sql' => $this->M_input->getsPenugsaanNipId($id),
		];

		$this->load->view('beranda',$d);
	}
	//[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]
	public function sKeluarEdit($value='')
	{
		$d=[
			'judul' => "Agenda Surat Keluar",
		];
		$this->load->view('input/editSKeluar',$d);
	}
	public function sMasukEdit($value='')
	{
		$d=[
			'judul' => "Agenda Surat Masuk",
		];
		$this->load->view('input/editSMasuk',$d);
	}
	public function sKeputusanEdit($value='')
	{
		$d=[
			'judul' => "Agenda Surat Keputusan",
		];
		$this->load->view('input/editSKeputusan',$d);
	}
	public function sPTAEdit($value='')
	{
		$d=[
			'judul' => "Agenda Surat Perintah Tugas",
		];
		$this->load->view('input/editSPTA',$d);
	}
	public function sPenugasanEdit($value='')
	{
		$d=[
			'judul' => "Agenda Surat Penugasan",
		];
		$this->load->view('input/editSPenugasan',$d);
	}
	public function sLapPdEdit($value='')
	{
		$d=[
			'judul' => "Agenda Laporan Perjalanan Dinas",
		];
		$this->load->view('input/editSLapPd',$d);
	}
	public function sNotaDinasEdit($value='')
	{
		$d=[
			'judul' => "Nota Dinas",
		];
		$this->load->view('input/editSNotaDinas',$d);
	}
	public function PenugasanNipEdit($value='')
	{
		$d=[
			'judul' => "EDIT DATA",
		];
		$this->load->view('input/editPenugasanNIp',$d);
	}

	public function SPPDNipEdit($value='')
	{
		$d=[
			'judul' => "EDIT DATA",
		];
		$this->load->view('input/editSPPDNIp',$d);
	}
	//=============================================
	public function ubahSPPD($value='')
	{

		$js='ND';
		$ijs=10;
		$id=isset($_GET['id'])?$_GET['id']:'';
		$d=[
			'judul' => "Update Surat Perjalanan Dinas",
			'in' => "selected", //menu
			'ijs' => $ijs,
			'no_sppd' => $id,
			'isi' => "input/sPPD_rinci",
			'sql' => $this->M_input->getsPPD_rinci($id),
		];

		$this->load->view('beranda',$d);

	}
	//[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]

	public function suratKeluar_save($value='')
	{
		$c=$this->M_input->saveSuratKeluar();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
			redirect('C_input/formInputSurat/'.$_POST['cboklasifikasi']);
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input');
	}
	public function suratMasuk_save($value='')
	{
		$c=$this->M_input->saveSuratMasuk();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input/sMasuk');
	}
	public function suratKeputusan_save($value='')
	{
		$c=$this->M_input->saveSuratKeputusan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input/sKeputusan');
	}

	public function suratPTA_save($value='')
	{
		 $c=$this->M_input->saveSuratPTA();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}

		//*/
		redirect($this->sPTAba($_POST['cbojenis']));
		// echo($this->sPTAb($_POST['cbojenis']));
	}
	public function suratPenugasan_save($value='')
	{
		$c=$this->M_input->saveSuratPenugasan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAba($_POST['cbojenis']));
	}
	public function suratLapPD_save($value='')
	{
		$c=$this->M_input->saveSuratLapPD();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAba($_POST['cbojenis']));
	}
	public function suratNotaDinas_save($value='')
	{
		$c=$this->M_input->saveSuratNotaDinas();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAba($_POST['cbojenis']));
	}
	public function SPPDNipSave($value='')
	{
		$c=$this->M_input->saveSPPDNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function SPenugasanNipSave($value='')
	{
		$c=$this->M_input->saveSPenugasanNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
		// ECHO $this->sPTAb($_POST['cbojenis']);
	}
	//========================================

	public function sKeluarEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratKeluar();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
			redirect('C_input/formInputSurat/'.$_POST['cboklasifikasi']);
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input');
	}
	public function sMasukEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratMasuk();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input/sMasuk');
	}
	public function sKeputusanEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratKeputusan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input/sKeputusan');
	}
	public function sPTAEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratPTA();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function sPenugasanEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratPenugasan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}

	public function sLapPDEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratLapPD();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function sNotaDinasEdit_save($value='')
	{
		$c=$this->M_input->saveEditSuratNotaDinas();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function ubahSPPDEdit_save($value='')
	{
		$c=$this->M_input->saveEditubahSPPDRinci();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function sPenugasanNipEdit_save($value='')
	{
		$c=$this->M_input->saveEditubahPenugasanNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	public function sPPDNipEdit_save($value='')
	{
		$c=$this->M_input->saveEditubahPPDNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	//========================================
	public function sKeluarDel($value='')
	{
		$c=$this->M_input->saveDelSuratKeluar();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
			redirect('C_input/formInputSurat/'.$_POST['cboklasifikasi']);
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect('C_input');
	}

	public function sMasukDel($value='')
	{
		$c=$this->M_input->saveDelSuratMasuk();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect('C_input/sMasuk');
	}
	public function sKeputusanDel($value='')
	{
		$c=$this->M_input->saveDelSuratKeputusan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect('C_input/sKeputusan');
	}
	public function sPTADel($value='')
	{
		$c=$this->M_input->saveDelSuratPTA();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect($this->sPTAb());
	}
	public function sPenugasanDel($value='')
	{
		$c=$this->M_input->saveDelSuratPenugasan();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect($this->sPTAb());
	}
	public function sLapPDDel($value='')
	{
		$c=$this->M_input->saveDelSuraLapPD();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect($this->sPTAb());
	}
	public function sNotaDinasDel($value='')
	{
		$c=$this->M_input->saveDelSuraNotaDinas();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		}
		redirect($this->sPTAb());
		//echo($this->sPTAb());
	}

	public function sPPDNipDel($value='')
	{
		$c=$this->M_input->saveDelSPPDNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		} //*/
		redirect($this->sPTAb());
	}
	//====================================

	public function sPTAb($js=0)
	{
		if (isset($_SERVER['HTTP_REFERER'])) {
			$li=$_SERVER['HTTP_REFERER'];
		}else{
			$li=base_url();
		}
		return $li;


	}
	public function sPTAba($js=0)
	{
		 switch ($js) {
			case "SPT-KEU":
				$li='C_input/sPTA';
				break;
			case 'SPT':
				$li=base_url('C_input/sPTNA');
				break;
			case 'SP':
				$li=base_url('C_input/sPenugasan');
				break;
			case 'LPD':
				$li=base_url('C_input/lapPerjalananDinas');
				break;
			case 'ND':
				$li=base_url('C_input/notaDinas');
				break;
			
			case 0:
				$li=base_url();
				break;
		} //*/

		return $li;
	}
	

	
	

}
