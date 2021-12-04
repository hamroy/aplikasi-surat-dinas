<?php
/**
 * 
 */
class M_semple extends CI_model
{
	
	function __construct()
	{
		$this->load->model('M_input');
		$this->thn = $this->M_input->thnpc;
	}

	public function getNumSurat($tbl='tbsurat_klr',$col='no_urut')
	{
		$cari = "
		SELECT count($col) as num FROM $tbl where thn = '$this->thn'";
		$a=$this->db->query($cari)->row()->num;
		return (int)$a;
	}

	public function getNumSuratPPD($tbl='tbsurat_spt_dtl',$col='no_sppd')
	{
		$cari = "
		SELECT count($col) as num FROM $tbl,tbsurat_spt
		WHERE tbsurat_spt.indeks_surat_spt = tbsurat_spt_dtl.indeks_surat_spt and kd_jenis != 'SPT' and tbsurat_spt.thn = '$this->thn'
		";
		$a=$this->db->query($cari)->row()->num;
		return (int)$a;
	}
	public function getNumSuratT($jn="SPT-KEU",$tbl='tbsurat_spt',$col='no_urut')
	{
		$cari = "
		SELECT count($col) as num FROM $tbl where kd_jenis='$jn' and thn = '$this->thn'";
		$a=$this->db->query($cari)->row()->num;
		return (int)$a;
	}
	public function getLjenisSurat()
	{
		$cari = "
		SELECT * FROM tbjenis_surat";
		$a=$this->db->query($cari);
		return $a;
	}

}