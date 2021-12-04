<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_listAgenda extends MY_user {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_agenda');
		$this->load->model('M_master');
	}
	
	private function formAwal($js=0)
	{
		$this->clogin();
		$nx = false;
		$d=[
			'judul' => " Filter Data ",
			'la' => "selected", //menu
			'js' => $js, //menu
			'isi' => "lapAgenda/formAwal",

		];
		if (isset($_GET['_tgl1']) and isset($_GET['_tgl2'])) {
			$nx = true;
		}
		
		if ($js==6 and !isset($_GET['cbokegiatan'])) {
			$nx = false;
		}
		if (!$nx) {
			$this->load->view('beranda',$d);
			exit();
		}
		
	}

	private function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[0],$pisah[1],$pisah[2]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	public function index()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Surat Keluar ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurKeluar", //funsi cetak
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapKeluar.php",
			'sql' => $this->M_agenda->lapSuratKeluar($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}

	public function listMasuk()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Surat Masuk ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurMasuk", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapMAsuk.php",
			'sql' => $this->M_agenda->lapSuratMasuk($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}

	public function listKeputusan()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];
		// $cbokegiatan=$_GET['cbokegiatan'];

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Surat Keputusan ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurKeputusan", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapKeputusan.php",
			'sql' => $this->M_agenda->lapSuratKeputusan($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}

	public function listSPPD()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Surat Perjalanan Dinas ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurPPD", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapSPPD.php",
			'sql' => $this->M_agenda->lapSuratPPD($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}

	public function listPenugasan()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Surat Penugasan",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurPenugasan", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapPenugasan.php",
			'sql' => $this->M_agenda->lapSuratPenugasan($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}

	public function listNotaDinas()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Nota Dinas",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurNotaDinas", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapNotaDinas.php",
			'sql' => $this->M_agenda->lapSuratNotaDinas($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}
	
	public function listPTA()
	{
		$this->formAwal(6);
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];
		$cbokegiatan=$_GET['cbokegiatan'];
		$keg='';
		$periode='-';
		
		
		if($tgl1<>'' and $tgl2<>'' and $cbokegiatan <> '') {
			//lengkap
			$tgl1a = $this->ubahformatTgl($tgl1);
			$tgl2a = $this->ubahformatTgl($tgl2);
			$periode = $tgl1a.' s/d '.$tgl2a;	
			$getIdKegiatan=$this->M_master->getIdKegiatan($cbokegiatan)->row_array();
		  	$nm_kegiatan = $getIdKegiatan['nm_kegiatan'];
			$keg="Kegiatan : ".$nm_kegiatan;

		}elseif ($tgl1<>'' and $tgl2<>'' and $cbokegiatan=='') {
			$tgl1a = $this->ubahformatTgl($tgl1);
			$tgl2a = $this->ubahformatTgl($tgl2);
			$periode = $tgl1a.' s/d '.$tgl2a;
		}elseif ($tgl1=='' or $tgl2=='' and $cbokegiatan <> '') {
			$getIdKegiatan=$this->M_master->getIdKegiatan($cbokegiatan)->row_array();
		  	$nm_kegiatan = $getIdKegiatan['nm_kegiatan'];
			$keg="Kegiatan : ".$nm_kegiatan;			
		}

		
		$d=[
			'judul' => " Agenda Surat Perintah Tugas ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2&cbokegiatan=$cbokegiatan",
			'periode' => $periode,
			'keg' => $keg,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurPTA", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapPTA.php",
			'sql' => $this->M_agenda->lapSuratPTA($tgl1,$tgl2,$cbokegiatan),

		];

		$this->load->view('beranda',$d);
	}

	public function listPTNA()
	{
		$this->formAwal(6);
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];
		$cbokegiatan=$_GET['cbokegiatan'];
		$keg='';
		$periode='-';
		$js="SPT";
		
		
		if($tgl1<>'' and $tgl2<>'' and $cbokegiatan <> '') {
			//lengkap
			$tgl1a = $this->ubahformatTgl($tgl1);
			$tgl2a = $this->ubahformatTgl($tgl2);
			$periode = $tgl1a.' s/d '.$tgl2a;	
			$getIdKegiatan=$this->M_master->getIdKegiatan($cbokegiatan)->row_array();
		  	$nm_kegiatan = $getIdKegiatan['nm_kegiatan'];
			$keg="Kegiatan : ".$nm_kegiatan;

		}elseif ($tgl1<>'' and $tgl2<>'' and $cbokegiatan=='') {
			$tgl1a = $this->ubahformatTgl($tgl1);
			$tgl2a = $this->ubahformatTgl($tgl2);
			$periode = $tgl1a.' s/d '.$tgl2a;
		}elseif ($tgl1=='' or $tgl2=='' and $cbokegiatan <> '') {
			$getIdKegiatan=$this->M_master->getIdKegiatan($cbokegiatan)->row_array();
		  	$nm_kegiatan = $getIdKegiatan['nm_kegiatan'];
			$keg="Kegiatan : ".$nm_kegiatan;			
		}

		$d=[
			'judul' => " Agenda Surat Perintah Non Tugas ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2&cbokegiatan=$cbokegiatan&js=$js",
			'periode' => $periode,
			'keg' => $keg,
			'la' => "selected", //menu
			'fCetak' => "cetak_lapSurPTA", //menu
			'isi' => "lapAgenda/lapLayout",
			'isiTable' => "cetak/lapPTA.php",
			'sql' => $this->M_agenda->lapSuratPTA($tgl1,$tgl2,$cbokegiatan,$js),

		];

		$this->load->view('beranda',$d);
	}

	///LAPORAN Perjalanan dinas
	public function listLapSPPD()
	{
		$this->formAwal();
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		
		$d=[
			'judul' => " Agenda Laporan Surat Perjalanan Dinas ",
			'urlCetak' => "?_tgl1=$tgl1&_tgl2=$tgl2",
			'periode' => $periode,
			'la' => "selected", //menu
			'isi' => "lapAgenda/lapLayout",
			'fCetak' => "cetak_lapSPPD", //menu
			'isiTable' => "cetak/lapSurPPD.php",
			'sql' => $this->M_agenda->lapSPPD($tgl1,$tgl2),

		];

		$this->load->view('beranda',$d);
	}


	
	

}
