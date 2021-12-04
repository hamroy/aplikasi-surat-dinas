<?php
/**
 * 
 */
class M_agenda extends CI_model
{	
	function __construct()
	{
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
        $hm = $h * 60;
        $ms = $hm * 60;
        $this->tglpc = gmdate('Y-m-d', time() + ($ms));
        $this->thnpc = gmdate('Y', time() + ($ms));
	}

	public function listSuratSPT($nama='')
	{
		$cari = "
				SELECT tbsurat_spt.no_urut, kd_jenis, tbsurat_spt.indeks_surat_spt,tbsurat_spt.kd_bidang,	tbsurat_spt.keterangan, tbsurat_spt.thn, tbsurat_spt_dtl.id_nip, DATE_FORMAT(tbsurat_spt.tgl_mulai,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tbsurat_spt.tgl_selesai,'%d/%m/%Y') AS tgl2, tbsurat_spt.perihal, tbsurat_spt.tujuan, tbsurat_spt.id_kegiatan 
				FROM 
				tbsurat_spt, tbsurat_spt_dtl  
				WHERE 
				tbsurat_spt.indeks_surat_spt=tbsurat_spt_dtl.indeks_surat_spt 
				
				and tbsurat_spt.perihal like '%$nama%'
				and tbsurat_spt.kd_jenis = 'SPT-KEU'
				and thn = '$this->thnpc'
				";
		return $this->db->query($cari);
	}

	public function listSuratSPenugasan($nama='')
	{
		$cari = "
				SELECT tbsurat_penugasan.no_urut, tbsurat_penugasan.indeks_surat_penugasan, 
				DATE_FORMAT(tbsurat_penugasan.tgl,'%d/%m/%Y') AS tgl1, 
				tbsurat_penugasan.keterangan,
				tbsurat_penugasan_dtl.id_nip,
				tbsurat_penugasan.j_mulai, tbsurat_penugasan.j_selesai,
				tbsurat_penugasan.tujuan, tbsurat_penugasan.perihal, tbsurat_penugasan.ttd 
				FROM tbsurat_penugasan,tbsurat_penugasan_dtl 
				WHERE tbsurat_penugasan.indeks_surat_penugasan=tbsurat_penugasan_dtl.indeks_surat_penugasan and 
				tbsurat_penugasan.perihal like '%$nama%'
				and thn = '$this->thnpc'";
		return $this->db->query($cari);
	}

	///////////////LAPORAN
	public function lapSuratKeluar($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT 
				no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, 
				tujuan, perihal, kd_bidang, keterangan 
				FROM tbsurat_klr where (tgl >= '$tgl1' and tgl <= '$tgl2') order by tgl
				";
		return $this->db->query($cari);
	}
	public function lapSuratMasuk($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT no_urut, indeks_surat_msk, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, dari, perihal, kd_bidang, keterangan 
				FROM tbsurat_msk 	
				where (tgl >= '$tgl1' and tgl <= '$tgl2') order by tgl
				";
		return $this->db->query($cari);
	}
	public function lapSuratKeputusan($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT no_urut, indeks_surat_keputusan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tentang, kd_bidang, keterangan 
		FROM tbsurat_keputusan where (tgl >= '$tgl1' and tgl <= '$tgl2') order by tgl
				";
		return $this->db->query($cari);
	}
	public function lapSuratPenugasan($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT tbsurat_penugasan.no_urut, tbsurat_penugasan.indeks_surat_penugasan, 
		DATE_FORMAT(tbsurat_penugasan.tgl,'%d/%m/%Y') AS tgl1, 
		tbsurat_penugasan.keterangan,
		tbsurat_penugasan_dtl.id_nip,
		tbsurat_penugasan.j_mulai, tbsurat_penugasan.j_selesai,
		tbsurat_penugasan.tujuan, tbsurat_penugasan.perihal, tbsurat_penugasan.ttd 
		FROM tbsurat_penugasan,tbsurat_penugasan_dtl 
		WHERE tbsurat_penugasan.indeks_surat_penugasan=tbsurat_penugasan_dtl.indeks_surat_penugasan 
		and (tbsurat_penugasan.tgl >= '$tgl1' and tbsurat_penugasan.tgl <= '$tgl2') 
		order by tbsurat_penugasan.tgl
				";
		return $this->db->query($cari);
	}
	public function lapSuratNotaDinas($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT 
				no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, 
				tujuan, perihal, kd_bidang, keterangan 
				FROM tbsurat_dinas where (tgl >= '$tgl1' and tgl <= '$tgl2') order by tgl";
		return $this->db->query($cari);
	}
	public function lapSuratPPD($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT tbsurat_spt.indeks_surat_spt, no_sppd, id_nip, 
				DATE_FORMAT(tgl_mulai_sppd,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai_sppd,'%d/%m/%Y') AS tgl2 , kd_bidang ,perihal,id_kegiatan
				FROM tbsurat_spt, tbsurat_spt_dtl
				where tbsurat_spt.indeks_surat_spt = tbsurat_spt_dtl.indeks_surat_spt 
				and(tgl_mulai_sppd >= '$tgl1' and tgl_mulai_sppd <= '$tgl2')  and kd_jenis != 'SPT' order by tgl_mulai_sppd";
		return $this->db->query($cari);
	}

	public function lapSuratPTA($tgl1='',$tgl2='',$cbokegiatan='',$jn='SPT-KEU')
	{
		$per='';
		$ket='';
		if($tgl1<>'' and $tgl2<>'' and $cbokegiatan <> '') {
			$per="and (tbsurat_spt.tgl_mulai between '$tgl1' and '$tgl2')";
			$ket="and tbsurat_spt.id_kegiatan='$cbokegiatan'";
		}elseif ($tgl1<>'' and $tgl2<>'' and $cbokegiatan=='') {
			$per="and (tbsurat_spt.tgl_mulai between '$tgl1' and '$tgl2')";
		}elseif ($tgl1=='' or $tgl2=='' and $cbokegiatan <> '') {
			$ket="and tbsurat_spt.id_kegiatan='$cbokegiatan'";
		}

		$cari = "
				SELECT tbsurat_spt.no_urut,kd_jenis, tbsurat_spt.indeks_surat_spt, tbsurat_spt_dtl.id_nip, 
				DATE_FORMAT(tbsurat_spt.tgl_mulai,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tbsurat_spt.tgl_selesai,'%d/%m/%Y') AS tgl2, 
				tbsurat_spt.perihal, tbsurat_spt.tujuan, tbsurat_spt.kd_bidang, tbsurat_spt.keterangan, tbsurat_spt.id_kegiatan FROM 
				tbsurat_spt, tbsurat_spt_dtl 
				WHERE tbsurat_spt.indeks_surat_spt=tbsurat_spt_dtl.indeks_surat_spt 
				{$per}{$ket}
				and tbsurat_spt.kd_jenis = '$jn'
				";
		return $this->db->query($cari);
	}

	public function lapSPPD($tgl1='',$tgl2='')
	{
		$cari = "
				SELECT no_urut,indeks_surat_klr, tujuan, perihal, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl , kd_bidang ,perihal,keterangan,thn
				FROM tblperjalanan_dinas
				Where (tgl >= '$tgl1' and tgl <= '$tgl2')  order by tgl";
		return $this->db->query($cari);
	}


}