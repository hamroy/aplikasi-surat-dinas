<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cetak extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_agenda');
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
		$this->cetak_klasifikasi();
	}

	public function cetak_klasifikasi($cetak="html")////
	{
		$d=[
			'judul' => "Klasifikasi",
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_master->getKlasisifikasi($this->input->get('strnama')),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'master/cetakKlasifikasi';
                break;
            default:
                $d['isi'] = 'master/cetakKlasifikasi';
                break;
        }
		$this->load->view('cetak/berandacetak',$d);
	
	}

	///LAPORAN

	private function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[0],$pisah[1],$pisah[2]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}

	public function cetak_lapSurKeluar($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Surat Keluar",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratKeluar($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapKeluar';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapKeluar';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapKeluar';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapKeluar';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}


	public function cetak_lapSurMasuk($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Surat Masuk",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratMasuk($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapMasuk';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapMasuk';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapMasuk';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapMasuk';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function cetak_lapSurKeputusan($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Surat Keputusan",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratKeputusan($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapKeputusan';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapKeputusan';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapKeputusan';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapKeputusan';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function cetak_lapSurPenugasan($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Surat Penugasan",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratPenugasan($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapPenugasan';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapPenugasan';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapPenugasan';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapPenugasan';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function cetak_lapSurNotaDinas($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Nota Dinas",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratNotaDinas($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapNotaDinas';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapNotaDinas';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapNotaDinas';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapNotaDinas';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function cetak_lapSurPPD($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Surat Perjalanan Dinas",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratPPD($tgl1,$tgl2),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapSPPD';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapSPPD';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapSPPD';
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapSPPD';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function cetak_lapSurPTA($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		$cbokegiatan=$_GET['cbokegiatan'];
		$js=empty($_GET['js'])?"SPT-KEU":$_GET['js'];
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
		$jdul="Agenda Surat Perintah Tugas";
		if ($js=='SPT') {
			$jdul="Agenda Surat Perintah Non Tugas";
		}
		$d=[
			'judul' => $jdul,
			'periode' => $periode,
			'keg' => $keg,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSuratPTA($tgl1,$tgl2,$cbokegiatan,$js),

		];

		switch ($cetak) {
            case 'html':
                $d['isi'] = 'lapAgenda/cetak/lapPTA';
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $d['isi'] = 'lapAgenda/cetak/lapPTA';
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
            	$d['isi'] = 'lapAgenda/cetak/lapPTA';
                $file_pdf = $this->load->view('cetak/berandacetak',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true,'A3','landscape');
                break;
            default:
                $d['isi'] = 'lapAgenda/cetak/lapPTA';
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}

	public function sppd_SPT($cetak="html")
	{
		$this->load->model('M_input');
		$nosurat=$this->input->post('txtindeks');
		$d=[
			'judul' => "Agenda Surat Perintah Tugas",
			// 'isi' => "master/cetakKlasifikasi",
			'nosurat' => $nosurat,
			'post' => $this->input->post(),
			'sql' => $this->M_input->getSPTAId($nosurat),

		];

		$this->saveDasar($d['post'],$d['post']['jenisSurat']);

		switch ($cetak) {
           
            case 'pdf':
            	$d['isi'] = 'input/cetak/sppdSPT';
                $file_pdf = $this->load->view('cetak/berandacetakSPPD',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true,'A4');
                break;

            default:
                $d['isi'] = 'input/cetak/sppdSPT';
                $this->load->view('cetak/berandacetakSPPD',$d);
                break;

        }
	}

	public function sppd_SP($cetak="html")
	{
		$this->load->model('M_input');
		$nosurat=$this->input->post('txtindeks');
		$d=[
			'judul' => "Agenda Surat Perintah Tugas",
			// 'isi' => "master/cetakKlasifikasi",
			'nosurat' => $nosurat,
			'post' => $this->input->post(),
			'sql' => $this->M_input->getSPenugasanId($nosurat),

		];

		$this->saveDasar($d['post'],7);

		switch ($cetak) {
           
            case 'pdf':
            	$d['isi'] = 'input/cetak/sppdSP';
                $file_pdf = $this->load->view('cetak/berandacetakSPPD',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true,'A4');
                break;

            default:
                $d['isi'] = 'input/cetak/sppdSP';
                $this->load->view('cetak/berandacetakSPPD',$d);
                break;

        }
	}

	function saveDasar($d,$type=6){
		$dasar=$d['input'];

		$idS=$d['txtindeks'];
		$ttd=$d['cbopegawai1'];
		foreach ($dasar as $key => $value) {
			$d=[
				'val'=>$value,
				'dasar'=>++$key,
				'type'=>$type,
				'idSurat'=>$idS,
			];
			$this->M_input->saveInpuDasar($d);
		}



		$d=[	
				'val'=>'',
				'dasar'=>0,
				'type'=>$type,
				'ttd'=>$ttd,
				'idSurat'=>$idS,
			];
		 $this->M_input->saveInpuDasar($d,0);
			// print_r($d);

	}
	
	public function cetak_lapSPPD($cetak="html",$isi='Keluar')////
	{
		$tgl1=$_GET['_tgl1'];
		$tgl2=$_GET['_tgl2'];

		if($tgl1 == '' or $tgl2=='') {
			redirect('C_listAgenda');
		}

		$tgl1a = $this->ubahformatTgl($tgl1);
		$tgl2a = $this->ubahformatTgl($tgl2);
		$periode = $tgl1a.' s/d '.$tgl2a;
		$d=[
			'judul' => "Agenda Laporan Surat Perjalanan Dinas",
			'periode' => $periode,
			// 'isi' => "master/cetakKlasifikasi",
			'sql' => $this->M_agenda->lapSPPD($tgl1,$tgl2),

		];

                $d['isi'] = 'lapAgenda/cetak/lapSurPPD';
		switch ($cetak) {
            case 'html':
                $this->load->view('cetak/berandacetak',$d);
                break;
            case 'xls':
                $this->load->view('cetak/berandacetakxls',$d);
                break;
            case 'pdf':
                $file_pdf = $this->load->view('cetak/berandacetakpdf',$d,TRUE);; 
                $this->load->library('pdfgenerator');
                $this->pdfgenerator->generate($file_pdf, $d['judul'],true);
                break;
            default:
                $this->load->view('cetak/berandacetak',$d);
                break;
        }
		
	
	}	
	

}
