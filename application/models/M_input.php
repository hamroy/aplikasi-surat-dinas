<?php

/**
 * 
 */
class M_input extends CI_model
{

	function __construct()
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$this->tglpc = gmdate('Y-m-d', time() + ($ms));
		$this->thnpc = gmdate('Y', time() + ($ms));
	}

	public function getsNow($tbl = 'tbsurat_klr', $col = 'tgl')
	{
		if ($tbl == "tbsurat_spt_dtl") {
			$cari = "SELECT $col, count($col) as num FROM $tbl where $col = '$this->tglpc'";
		} else {
			$cari = "SELECT $col, count($col) as num FROM $tbl where $col = '$this->tglpc' and thn = '$this->thnpc'";
		}

		$a = $this->db->query($cari)->row()->num;
		return (int)$a;
	}
	public function getsTNow($tbl = 'tbsurat_spt', $col = 'tgl_terbit', $jn = "SPT-KEU")
	{
		$cari = "
		SELECT $col, count($col) as num FROM $tbl where $col = '$this->tglpc' and kd_jenis='$jn' and thn = '$this->thnpc'";
		$a = $this->db->query($cari)->row()->num;
		return (int)$a;
	}
	public function getsKeluar($nama = '', $lim = 0, $set = 0)
	{
		if ($lim == 0) {
			$getAll = "";
		} elseif ($set == 0 or $set == '') {
			$getAll = "limit $lim";
		} else {
			$getAll = "limit $lim offset $set";
		}
		$cari = "
		SELECT no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') 
		AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok, link
		FROM tbsurat_klr Where perihal like '%$nama%' and thn = '$this->thnpc'	
		order by id desc
		$getAll
		";
		return $this->db->query($cari);
	}

	public function getsMasuk($nama = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_msk, DATE_FORMAT(tglterima,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl2, dari, perihal, kd_bidang, keterangan, file_dok, link  
		FROM tbsurat_msk Where perihal like '%$nama%' and kd_instansi='BKPSDM' and thn = '$this->thnpc' order by id desc";
		return $this->db->query($cari);
	}

	public function getsKeputusan($nama = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_keputusan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tentang, kd_bidang, keterangan, file_dok , link
		FROM tbsurat_keputusan Where tentang like '%$nama%' and thn = '$this->thnpc' order by tgl desc, indeks_surat_keputusan desc";
		return $this->db->query($cari);
	}
	public function getsPTA($nama = '', $js = "SPT-KEU")
	{
		$cari = "
		SELECT no_urut, indeks_surat_spt, kd_bidang, keterangan, thn, 
		DATE_FORMAT(tgl_mulai,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai,'%d/%m/%Y') AS tgl2, DATE_FORMAT(tgl_terbit,'%d/%m/%Y') AS tgl3, perihal, tujuan, file_dok, id_kegiatan ,link
		FROM tbsurat_spt Where perihal like '%$nama%' AND kd_jenis = '$js' and thn = '$this->thnpc'
		order by no_urut desc";
		return $this->db->query($cari);
	}
	public function getsPenugasan($nama = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_penugasan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgL_terbit,'%d/%m/%Y') AS tgl2, keterangan, file_dok, j_mulai, j_selesai, tujuan, perihal, ttd ,link
		FROM tbsurat_penugasan Where keterangan like '%$nama%' and thn = '$this->thnpc'
		order by no_urut desc";
		return $this->db->query($cari);
	}
	public function getsLapPD($nama = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok  ,link
		FROM tblperjalanan_dinas Where perihal like '%$nama%' and kd_instansi='BKPSDM' and thn = '$this->thnpc' 
		order by id desc";
		return $this->db->query($cari);
	}
	public function getsNotaDinas($nama = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok ,link
		FROM tbsurat_dinas Where perihal like '%$nama%' and kd_instansi='BKPSDM' and thn = '$this->thnpc' 
		order by id desc";
		return $this->db->query($cari);
	}
	public function getsPPD($nama = '')
	{
		$cari = "
		SELECT kd_jenis,tbsurat_spt.indeks_surat_spt, no_sppd, id_nip,DATE_FORMAT(tgl_mulai_sppd,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai_sppd,'%d/%m/%Y') AS tgl2 , kd_bidang ,perihal,id_kegiatan
		FROM tbsurat_spt, tbsurat_spt_dtl
		WHERE tbsurat_spt.indeks_surat_spt = tbsurat_spt_dtl.indeks_surat_spt and kd_jenis != 'SPT' and tbsurat_spt.perihal like '%$nama%' and thn = '$this->thnpc'
		ORDER BY tbsurat_spt.no_urut DESC ";
		return $this->db->query($cari);
	}
	public function getsPPD_rinci($no_sppd = '')
	{
		$cari = "
		SELECT indeks_surat_spt,id_nip,
				DATE_FORMAT(tgl_mulai_sppd,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai_sppd,'%d/%m/%Y') AS tgl2, 
				buktikw, DATE_FORMAT(tglkw,'%d/%m/%Y') AS tgl3, 
				by1, by2, by3, by4, by5, by6, 
				brk1, brk2, brk3, brk4, brk5, 
				DATE_FORMAT(brk6,'%d/%m/%Y') AS tgl4,
				brk7, brk8, brk9, 
				kbl1, kbl2, kbl3, kbl4, kbl5, 
				DATE_FORMAT(kbl6,'%d/%m/%Y') AS tgl5,
				kbl7, kbl8, kbl9    
				FROM tbsurat_spt_dtl WHERE no_sppd='$no_sppd'";
		return $this->db->query($cari);
	}

	public function getsPPD_ispt($indeks_surat_spt = '')
	{
		$cari = "
		SELECT no_sppd, id_nip, 
		DATE_FORMAT(tgl_mulai_sppd,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai_sppd,'%d/%m/%Y') AS tgl2 
		FROM 
		tbsurat_spt_dtl  
		WHERE 
		indeks_surat_spt='$indeks_surat_spt'";
		return $this->db->query($cari);
	}

	public function getsPenugasanNip($indeks_surat_spt = '')
	{
		$cari = "
		SELECT id_nip, id FROM tbsurat_penugasan_dtl WHERE indeks_surat_penugasan='$indeks_surat_spt' and thn = '$this->thnpc'";
		return $this->db->query($cari);
	}



	//================================================
	public function getSKeluarId($id = '')
	{
		$cari = "SELECT 
				no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok  ,link
				FROM tbsurat_klr 
				WHERE indeks_surat_klr='$id'				
				";
		return $this->db->query($cari);
	}
	public function getSMasukId($id = '')
	{
		$cari = "SELECT 
				no_urut, indeks_surat_msk, DATE_FORMAT(tglterima,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl2, dari, perihal, kd_bidang, keterangan, 
				file_dok   ,link
				FROM tbsurat_msk 
				WHERE indeks_surat_msk='$id'";
		return $this->db->query($cari);
	}
	public function getSKeputusanId($id = '')
	{
		$cari = "SELECT	no_urut, indeks_surat_keputusan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tentang, kd_bidang, keterangan, file_dok ,link
				FROM tbsurat_keputusan 
				WHERE indeks_surat_keputusan='$id'";
		return $this->db->query($cari);
	}
	public function getSPTAId($id = '')
	{
		$cari = "SELECT tgl_mulai, tgl_selesai, no_urut, indeks_surat_spt, kd_bidang, keterangan, thn, kd_jenis, kd_klasifikasi, kd_instansi,
		DATE_FORMAT(tgl_mulai,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai,'%d/%m/%Y') AS tgl2,DATE_FORMAT(tgl_terbit,'%d/%m/%Y') AS tgl3, perihal, tujuan, file_dok, id_kegiatan,tgl_mulai,tgl_selesai,tgl_terbit,link
		FROM tbsurat_spt 
		WHERE indeks_surat_spt='$id'";
		return $this->db->query($cari);
	}

	public function getsPenugsaanNipId($indeks_surat_spt = '')
	{
		$cari = "SELECT no_urut, indeks_surat_penugasan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, 
		 keterangan, j_mulai, j_selesai, tujuan, perihal, ttd FROM tbsurat_penugasan Where indeks_surat_penugasan='$indeks_surat_spt'";
		return $this->db->query($cari);
	}

	public function getSPenugasanId($id = '')
	{
		$cari = "SELECT 
				no_urut, indeks_surat_penugasan, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1,DATE_FORMAT(tgl_terbit,'%d/%m/%Y') AS tgl2, keterangan, file_dok, 
				j_mulai, j_selesai, tujuan, perihal, ttd , tgl, tgl_terbit,link
				FROM tbsurat_penugasan 
				WHERE indeks_surat_penugasan='$id'";
		return $this->db->query($cari);
	}
	public function getSPPDId($no_sppd = '')
	{
		$cari = "SELECT indeks_surat_spt,id_nip,tgl_mulai_sppd,tgl_selesai_sppd,
				DATE_FORMAT(tgl_mulai_sppd,'%d/%m/%Y') AS tgl1, DATE_FORMAT(tgl_selesai_sppd,'%d/%m/%Y') AS tgl2 
				FROM tbsurat_spt_dtl WHERE no_sppd='$no_sppd'";
		return $this->db->query($cari);
	}
	public function getSPenugasanNIpId($id = '')
	{
		$cari = "SELECT indeks_surat_penugasan, id_nip from tbsurat_penugasan_dtl WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getSLapPDId($id = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok ,link
		FROM tblperjalanan_dinas 
		WHERE indeks_surat_klr='$id' order by id desc";
		return $this->db->query($cari);
	}
	public function getSNotaDinasId($id = '')
	{
		$cari = "
		SELECT no_urut, indeks_surat_klr, DATE_FORMAT(tgl,'%d/%m/%Y') AS tgl1, tujuan, perihal, kd_bidang, keterangan, file_dok ,link
		FROM tbsurat_dinas
		WHERE indeks_surat_klr='$id' order by id desc";
		return $this->db->query($cari);
	}
	//=======================================
	function ubahformatTgl($tanggal = '')
	{
		$pisah = explode('/', $tanggal);
		if (isset($pisah[2])) {
			$urutan = array($pisah[2], $pisah[1], $pisah[0]);
		} else {
			$urutan = '';
		}

		$satukan = implode('-', $urutan);
		return $satukan;
	}

	function blnRomawi($tanggal)
	{
		$tgl = $this->ubahformatTgl($tanggal);
		$bln = substr($tgl, 5, 2);
		if ($bln == '01') {
			$bln_r = "I";
		}
		if ($bln == '02') {
			$bln_r = "II";
		}
		if ($bln == '03') {
			$bln_r = "III";
		}
		if ($bln == '04') {
			$bln_r = "IV";
		}
		if ($bln == '05') {
			$bln_r = "V";
		}
		if ($bln == '06') {
			$bln_r = "VI";
		}
		if ($bln == '07') {
			$bln_r = "VII";
		}
		if ($bln == '08') {
			$bln_r = "VIII";
		}
		if ($bln == '09') {
			$bln_r = "IX";
		}
		if ($bln == '10') {
			$bln_r = "X";
		}
		if ($bln == '11') {
			$bln_r = "XI";
		}
		if ($bln == '12') {
			$bln_r = "XII";
		}
		return $bln_r;
	}
	//====================================
	function OtomatisID($tbl = 'tbsurat_klr')
	{
		$tahun_sekarang = date('Y');
		$querycount = "SELECT count(no_urut) as LastID FROM $tbl where thn='$tahun_sekarang' and kd_instansi='BKPSDM' and flg1='0'";
		$result = $this->db->query($querycount);
		$row = $result->row_array();

		return $row['LastID'];
	}

	function OtomatisIDNoFlg($tbl = 'tbsurat_msk')
	{
		$tahun_sekarang = date('Y');
		$querycount = "SELECT count(no_urut) as LastID FROM $tbl where thn='$tahun_sekarang' and kd_instansi='BKPSDM'";
		$result = $this->db->query($querycount);
		$row = $result->row_array();

		return $row['LastID'];
	}

	function OtomatisIDJs($tbl = 'tbsurat_spt', $kd_jenis = 'SPT-KEU')
	{
		$tahun_sekarang = date('Y');
		$querycount = "SELECT count(no_urut) as LastID FROM $tbl where thn='$tahun_sekarang' and kd_instansi='BKPSDM' and flg1='0' and kd_jenis = '$kd_jenis'";
		$result = $this->db->query($querycount);
		$row = $result->row_array();

		return $row['LastID'];
	}
	function OtomatisIDNip($kd_jenis = 'SPT-KEU')
	{
		$tahun_sekarang = date('Y');
		$querycount = "SELECT count(id_nip) as jml FROM tbsurat_spt_dtl,tbsurat_spt 
		where tbsurat_spt.indeks_surat_spt = tbsurat_spt_dtl.indeks_surat_spt and tbsurat_spt_dtl.kd_instansi='BKPSDM' 
		AND kd_jenis = '$kd_jenis' AND tbsurat_spt.thn = $tahun_sekarang";
		$result = $this->db->query($querycount);
		return $result;
	}
	//=================================
	function nourut($num, $kd_jenis = 'SPT')
	{
		$tahun_sekarang = date('Y');
		$num = $num + 1;
		switch (strlen($num)) {
			case 1:
				$NoTrans = "00" . $num;
				break;
			case 2:
				$NoTrans = "0" . $num;
				break;
			default:
				$NoTrans = $num;
		}

		$querycount = "SELECT count(no_urut) as LastID FROM tbsurat_spt where thn='$tahun_sekarang' and kd_instansi='BKPSDM' and kd_jenis = '$kd_jenis' AND no_urut='$NoTrans'";
		$result = $this->db->query($querycount);
		$row = $result->row_array();

		if ($row['LastID'] > 0) {
			$NoTrans += 1;

			switch (strlen($NoTrans)) {
				case 1:
					$NoTrans = "00" . $NoTrans;
					break;
				case 2:
					$NoTrans = "0" . $NoTrans;
					break;
				default:
					$NoTrans = $NoTrans;
			}
		}
		//*/
		return $NoTrans;
	}
	//===============================
	function FormatNoTrans($num)
	{
		$tahun_sekarang = date('Y');
		$num = $num + 1;
		switch (strlen($num)) {
			case 1:
				$NoTrans = "00" . $num;
				break;
			case 2:
				$NoTrans = "0" . $num;
				break;
			default:
				$NoTrans = $num;
		}
		return $NoTrans;
	}
	function FormatNoTrans_($num)
	{
		$tahun_sekarang = date('Y');
		$num = $num + 1;
		switch (strlen($num)) {
			default:
				$NoTrans = $num;
		}
		return $NoTrans;
	}
	//=======================================

	public function saveSuratKeluar($id = '')
	{
		$LastID = $this->FormatNoTrans($this->OtomatisID());
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cboklasifikasi = $_POST['cboklasifikasi'];
		$cboinstansi = $_POST['cboinstansi'];
		$cbobidang = $_POST['cbobidang'];
		$tanggal = $_POST['tanggal'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		$tgl = $this->ubahformatTgl($tanggal);
		$bln_r = $this->blnRomawi($tanggal);



		if ($cboklasifikasi == null) {
			return 0;
		}

		if ($txtno == '') {
			if ($cbobidang == '') {
				$indeks_surat_klr = $cboklasifikasi . "/" . $cboinstansi . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			} else {
				$indeks_surat_klr = $cboklasifikasi . "/" . $cbobidang . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			}
			$flg = "0";
		} else {
			$indeks_surat_klr = $txtno;
			$flg = "1";
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "INSERT INTO tbsurat_klr  
		(no_urut, indeks_surat_klr, tgl, tujuan, perihal, kd_bidang, keterangan, thn, kd_instansi, flg1, file_dok, link) 
		VALUES
		('$LastID', '$indeks_surat_klr', '$tgl', '$txttujuan', '$txtperihal', '$cbobidang', '$txtketerangan', '$tahun_sekarang', '$cboinstansi', '$flg','$foto','$link')";
		$this->db->query($sql);
		return 1;
	}

	public function saveSuratMasuk($id = '')
	{
		$LastID = $this->FormatNoTrans($this->OtomatisIDNoFlg('tbsurat_msk'));
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtindeks = $_POST['txtindeks'];
		$cbobidang = $_POST['cbobidang'];
		$tanggalterima = $_POST['tanggalterima'];
		$tanggal = $_POST['tanggal'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$tglterima = $this->ubahformatTgl($tanggalterima);
		$tgl = $this->ubahformatTgl($tanggal);
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "INSERT INTO tbsurat_msk (no_urut, indeks_surat_msk, tglterima, tgl, dari, perihal, kd_bidang, keterangan, thn, file_dok, kd_instansi,link)
			VALUES 
			('$LastID', '$txtindeks', '$tglterima', '$tgl', '$txttujuan', '$txtperihal', '$cbobidang', '$txtketerangan', 
			'$tahun_sekarang', '$foto', 'BKPSDM','$link')";
		$h = $this->db->query($sql);
		return $h;
	}
	public function saveSuratKeputusan($id = '')
	{
		$LastID = $this->FormatNoTrans_($this->OtomatisID('tbsurat_keputusan'));
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cbobidang = $_POST['cbobidang'];
		$tanggal = $_POST['tanggal'];
		$txttentang = $_POST['txttentang'];
		$txtketerangan = $_POST['txtketerangan'];
		$tgl = $this->ubahformatTgl($tanggal);
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtno == '') {
			$indeks_surat_keputusan = $LastID . "/BKPSDM/" . $tahun_sekarang;
			$flg = 0;
		} else {
			$indeks_surat_keputusan = $txtno;
			$flg = 1;
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				INSERT INTO tbsurat_keputusan  (no_urut, indeks_surat_keputusan, tgl, tentang, kd_bidang, keterangan, thn, 
				file_dok, kd_instansi, flg1,link) 
				VALUES 	('$LastID', '$indeks_surat_keputusan', '$tgl', '$txttentang', '$cbobidang', '$txtketerangan', '$tahun_sekarang', '$foto', 'BKPSDM', '$flg','$link')";
		$h = $this->db->query($sql);
		return $h;
	}
	public function saveSuratPTA($id = '')
	{

		//
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cboklasifikasi = $_POST['cboklasifikasi'];
		$cbojenis = $_POST['cbojenis'];
		$cboinstansi = $_POST['cboinstansi'];
		$cbobidang = $_POST['cbobidang'];
		$txtketerangan = $_POST['txtketerangan'];
		$cbokegiatan = $_POST['cbokegiatan'];
		$tanggal = $_POST['tanggal'];
		$tanggal1 = $_POST['tanggal1'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		//
		$LastID = $this->FormatNoTrans($this->OtomatisIDJs('tbsurat_spt', $cbojenis));
		$nourut = $this->nourut($this->OtomatisIDJs('tbsurat_spt', $cbojenis), $cbojenis);
		//by:ilham
		$tanggal3 = $_POST['tanggalTerbit'];
		$tgl3 = $this->ubahformatTgl($tanggal3);
		$tgl = $this->ubahformatTgl($tanggal);
		$tgl1 = $this->ubahformatTgl($tanggal1);
		$bln_r = $this->blnRomawi($tanggal3);

		if ($txtno == '' or $txtno == null) {
			$indeks_surat_klr = $cboklasifikasi . "/" . $cbojenis . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			$flg1 = 0;
		} else {
			$indeks_surat_klr = $txtno;
			$flg1 = 1;
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				INSERT INTO tbsurat_spt  
				(no_urut, indeks_surat_spt, kd_bidang, keterangan, thn, 
				tgl_mulai, tgl_selesai, perihal, tujuan, 
				kd_klasifikasi, kd_jenis, kd_instansi, file_dok, id_kegiatan, flg1,tgl_terbit,link) 
				VALUES 
				('$nourut', '$indeks_surat_klr', '$cbobidang', '$txtketerangan', '$tahun_sekarang', 
				'$tgl','$tgl1','$txtperihal','$txttujuan',
				'$cboklasifikasi','$cbojenis','$cboinstansi', '$foto','$cbokegiatan','$flg1','$tgl3','$link')";
		$h = $this->db->query($sql);
		return $h;
	}
	public function saveSuratPenugasan($id = '')
	{
		//
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cboklasifikasi = $_POST['cboklasifikasi'];
		$cbojenis = $_POST['cbojenis'];
		$cbobidang = $_POST['cbobidang'];
		$cboinstansi = $_POST['cboinstansi'];
		$tanggal = $_POST['tanggal'];
		$txtketerangan = $_POST['txtketerangan'];

		$jmulai = $_POST['jmulai'];
		$jakhir = $_POST['jakhir'];
		$txttujuan = $_POST['txttujuan'];
		$txtttd = $_POST['cbopegawai1'];
		$txtperihal = $_POST['txtperihal'];
		$tanggalTerbit = $_POST['tanggalTerbit'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		//
		$LastID = $this->FormatNoTrans($this->OtomatisID('tbsurat_penugasan', $cbojenis), $cbojenis);
		//by:ilham
		$tgl = $this->ubahformatTgl($tanggal);
		$tgl1 = $this->ubahformatTgl($tanggalTerbit);
		$bln_r = $this->blnRomawi($tanggal);

		if ($txtno == '' or $txtno == null) {
			$indeks_surat_klr = $cboklasifikasi . "/" . $cbobidang . '-' . $cbojenis . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			$flg1 = 0;
		} else {
			$indeks_surat_klr = $txtno;
			$flg1 = 1;
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				INSERT INTO tbsurat_penugasan  
				(no_urut, indeks_surat_penugasan, tgl, keterangan, thn, file_dok, 
				j_mulai, j_selesai, tujuan, perihal, ttd, kd_instansi, flg1, kd_klasifikasi, tgl_terbit,link) 
				VALUES 
				('$LastID', '$indeks_surat_klr', '$tgl', '$txtketerangan', '$tahun_sekarang', '$foto', 
				'$jmulai', '$jakhir', '$txttujuan', '$txtperihal','$txtttd','BKPSDM', '$flg1', '$cboklasifikasi','$tgl1','$link')";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveSuratLapPD($id = '')
	{
		//
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cboklasifikasi = $_POST['cboklasifikasi'];
		$cboinstansi = $_POST['cboinstansi'];
		$cbobidang = $_POST['cbobidang'];
		$cbojenis = $_POST['cbojenis'];
		$tanggal = $_POST['tanggal'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		//
		$LastID = $this->FormatNoTrans($this->OtomatisID('tblperjalanan_dinas', $cbojenis), $cbojenis);
		//by:ilham
		$tgl = $this->ubahformatTgl($tanggal);
		$bln_r = $this->blnRomawi($tanggal);

		if ($txtno == '' or $txtno == null) {
			$indeks_surat_klr = $cboklasifikasi . "/" . $cbobidang . '-' . $cbojenis . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			$flg1 = 0;
		} else {
			$indeks_surat_klr = $txtno;
			$flg1 = 1;
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				INSERT INTO tblperjalanan_dinas  
				(no_urut, indeks_surat_klr, tgl, tujuan, perihal, kd_bidang, keterangan, thn, file_dok, kd_instansi, flg1,link) 
				VALUES 
				('$LastID', '$indeks_surat_klr', '$tgl', '$txttujuan', '$txtperihal', '$cbobidang', 
				'$txtketerangan', '$tahun_sekarang', '$foto', '$cboinstansi', '$flg1','$link')";
		$h = $this->db->query($sql);
		return $h;
	}
	public function saveSuratNotaDinas($id = '')
	{
		//
		$tahun_sekarang = date('Y');
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cboklasifikasi = $_POST['cboklasifikasi'];
		$cboinstansi = $_POST['cboinstansi'];
		$cbobidang = $_POST['cbobidang'];
		$cbojenis = $_POST['cbojenis'];
		$tanggal = $_POST['tanggal'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		//
		$LastID = $this->FormatNoTrans($this->OtomatisID('tbsurat_dinas', $cbojenis), $cbojenis);
		//by:ilham
		$tgl = $this->ubahformatTgl($tanggal);
		$bln_r = $this->blnRomawi($tanggal);

		if ($txtno == '' or $txtno == null) {
			$indeks_surat_klr = $cboklasifikasi . "/" . $cbobidang . '-' . $cbojenis . "/" . $LastID . "/" . $bln_r . "/" . $tahun_sekarang;
			$flg1 = 0;
		} else {
			$indeks_surat_klr = $txtno;
			$flg1 = 1;
		}

		if ($jenis_gambar == '') {
			$foto = '';
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				INSERT INTO tbsurat_dinas  
				(no_urut, indeks_surat_klr, tgl, tujuan, perihal, kd_bidang, keterangan, thn, file_dok, kd_instansi, flg1, link) 
				VALUES 
				('$LastID', '$indeks_surat_klr', '$tgl', '$txttujuan', '$txtperihal', '$cbobidang', 
				'$txtketerangan', '$tahun_sekarang', '$foto', '$cboinstansi', '$flg1','$link')";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveSPPDNip($id = '')
	{
		//
		$tahun_sekarang = date('Y');
		$txtindeks = $_POST['txtindeks'];
		$kd_jenis = $_POST['kd_jenis'];
		$cbopegawai = $_POST['cbopegawai'];
		//
		$sql = $this->M_input->getSPTAId($txtindeks);
		$tm_cari = $sql->row_array();
		$tgl = $tm_cari['tgl_mulai'];
		$tgl1 = $tm_cari['tgl_selesai'];
		$cboklasifikasi = $tm_cari['kd_klasifikasi'];
		$cbojenis = $tm_cari['kd_jenis'];
		$cboinstansi = $tm_cari['kd_instansi'];
		$kd_bidang = $tm_cari['kd_bidang'];
		//
		$tm_cari = $this->OtomatisIDNip($kd_jenis)->row_array();
		$jml = $tm_cari['jml'];

		/* if ($txtindeks < '10') {
			$LastID = "0" . $jml;
		} else {
			$LastID = $jml;
		} */
		$LastID = $this->FormatNoTrans($jml);
		//
		$cboklasifikasi = '094';
		$no_sppd = $cboklasifikasi . "/SPPD-" . $kd_bidang . "/" . $LastID . "/" . $tahun_sekarang;
		//
		$sql = "
			INSERT INTO `tbsurat_spt_dtl` ( `indeks_surat_spt`, `id_nip`, `tgl_mulai_sppd`, `tgl_selesai_sppd`, `no_sppd`, `buktikw`, `tglkw`, `by1`, `by2`, `by3`, `by4`, `by5`, `by6`, `brk1`, `brk2`, `brk3`, `brk4`, `brk5`, `brk6`, `brk7`, `brk8`, `brk9`, `kbl1`, `kbl2`, `kbl3`, `kbl4`, `kbl5`, `kbl6`, `kbl7`, `kbl8`, `kbl9`, `kd_instansi`) 
			VALUES ('$txtindeks', '$cbopegawai', '$tgl', '$tgl1', '$no_sppd', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', NULL, '', '', '', '', '', NULL, '', '', NULL, 'BKPSDM')";
		$h = $this->db->query($sql);
		return $h;
	}
	public function saveSPenugasanNip($id = '')
	{
		//
		$txtindeks = $_POST['txtindeks'];
		$cbopegawai = $_POST['cbopegawai'];
		//
		$sql = "INSERT INTO `tbsurat_penugasan_dtl` (`indeks_surat_penugasan`, `id_nip`, `j_mulai`, `j_selesai`, `tujuan`, `perihal`, `ttd`, `id`, `kd_instansi`) VALUES ('$txtindeks', '$cbopegawai', '', '', '', '', '', NULL, '')";
		$h = $this->db->query($sql);
		return $h;
	}
	//========================================
	public function saveEditSuratKeluar($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtindeks = $_POST['txtindeks'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$txtdok = $_POST['txtdok'];
		$cbobidang = $_POST['cbobidang'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "UPDATE tbsurat_klr 
				SET tujuan='$txttujuan', perihal='$txtperihal', keterangan='$txtketerangan', file_dok='$foto', 
				kd_bidang='$cbobidang', link= '$link'  
				WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}

	public function saveEditSuratMasuk($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$tanggalterima = $_POST['tanggalterima'];
		$tanggal = $_POST['tanggal'];
		$txtindeks = $_POST['txtindeks'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$cbobidang = $_POST['cbobidang'];
		$txtdok = $_POST['txtdok'];
		$tglterima = $this->ubahformatTgl($tanggalterima);
		$tgl = $this->ubahformatTgl($tanggal);
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "UPDATE tbsurat_msk 
			  SET dari='$txttujuan', perihal='$txtperihal', keterangan='$txtketerangan', file_dok='$foto', tglterima='$tglterima', tgl='$tgl', kd_bidang='$cbobidang', link = '$link'
			  WHERE indeks_surat_msk = '$txtindeks'";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveEditSuratKeputusan($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtindeks = $_POST['txtindeks'];
		$txttentang = $_POST['txttentang'];
		$txtketerangan = $_POST['txtketerangan'];
		$cbobidang = $_POST['cbobidang'];
		$txtdok = $_POST['txtdok'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "UPDATE tbsurat_keputusan 
			  SET tentang='$txttentang', keterangan='$txtketerangan', file_dok='$foto', kd_bidang='$cbobidang', link = '$link'
			  WHERE indeks_surat_keputusan = '$txtindeks'";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveEditSuratPTA($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtno = $_POST['txtno'];
		$cbobidang = $_POST['cbobidang'];
		$txtketerangan = $_POST['txtketerangan'];
		$tanggal = $_POST['tanggal'];
		$tanggal1 = $_POST['tanggal1'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$cbokegiatan = $_POST['cbokegiatan'];
		$tgl = $this->ubahformatTgl($tanggal);
		$tgl1 = $this->ubahformatTgl($tanggal1);
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';
		//by:ilham
		$tanggal3 = $_POST['tanggalTerbit'];
		$tgl3 = $this->ubahformatTgl($tanggal3);
		$txtdok = $_POST['txtdok'];

		if ($txtno == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				UPDATE tbsurat_spt SET kd_bidang='$cbobidang', keterangan='$txtketerangan', tgl_mulai='$tgl', 
				tgl_selesai='$tgl1', perihal='$txtperihal', tujuan='$txttujuan', file_dok='$foto', 
				id_kegiatan='$cbokegiatan', tgl_terbit='$tgl3', link = '$link'
				WHERE indeks_surat_spt='$txtno'";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveEditSuratPenugasan($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';
		$txtdok = $_POST['txtdok'];

		$txtindeks = $_POST['txtindeks'];
		$txtketerangan = $_POST['txtketerangan'];
		$jmulai = $_POST['jmulai'];
		$jakhir = $_POST['jakhir'];
		$txttujuan = $_POST['txttujuan'];
		$txtttd = $_POST['cbopegawai1'];
		$txtperihal = $_POST['txtperihal'];
		$tanggalTerbit = $_POST['tanggalTerbit'];
		$tgl = $this->ubahformatTgl($tanggalTerbit);
		//by:ilham
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "
				UPDATE tbsurat_penugasan 
				SET keterangan='$txtketerangan', file_dok='$foto', 
				j_mulai='$jmulai', j_selesai='$jakhir', 
				tujuan='$txttujuan', perihal='$txtperihal', ttd='$txtttd', tgl_terbit='$tgl', link= '$link'
				WHERE indeks_surat_penugasan = '$txtindeks'";
		$h = $this->db->query($sql);
		return $h;
	}

	public function saveEditSuratLapPD($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtindeks = $_POST['txtindeks'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$txtdok = $_POST['txtdok'];
		$cbobidang = $_POST['cbobidang'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "UPDATE tblperjalanan_dinas 
				SET tujuan='$txttujuan', perihal='$txtperihal', keterangan='$txtketerangan', file_dok='$foto', 
				kd_bidang='$cbobidang', link = '$link'
				WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}

	public function saveEditSuratNotaDinas($id = '')
	{
		$namafolder = "dok/";
		$jenis_gambar = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : '';

		$txtindeks = $_POST['txtindeks'];
		$txttujuan = $_POST['txttujuan'];
		$txtperihal = $_POST['txtperihal'];
		$txtketerangan = $_POST['txtketerangan'];
		$txtdok = $_POST['txtdok'];
		$cbobidang = $_POST['cbobidang'];
		$link = isset($_POST['link_file']) ? $_POST['link_file'] : '';

		if ($txtindeks == null) {
			return 0;
		}

		if ($jenis_gambar == '') {
			$foto = $txtdok;
		} elseif ($jenis_gambar == 'application/pdf') {
			$foto = $namafolder . basename($_FILES['nama_file']['name']);
			if (!move_uploaded_file($_FILES['nama_file']['tmp_name'], $foto)) {
				return 0;
			}
		} else {
			return 0;
		}

		$sql = "UPDATE tbsurat_dinas 
				SET tujuan='$txttujuan', perihal='$txtperihal', keterangan='$txtketerangan', file_dok='$foto', 
				kd_bidang='$cbobidang', link = '$link'  
				WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}

	public function saveEditubahSPPDRinci($id = '')
	{
		print_r($_POST);
		//die();
		$txtno = $_POST['txtno'];

		$txtbuktikw = $_POST['txtbuktikw'];
		$tanggal2 = $_POST['tanggal2'];

		$txt1 = isset($_POST['txt1']) ? $_POST['txt1'] : '';
		$txt2 = isset($_POST['txt2']) ? $_POST['txt2'] : '';
		$txt3 = isset($_POST['txt3']) ? $_POST['txt3'] : '';
		$txt4 = isset($_POST['txt4']) ? $_POST['txt4'] : '';
		$txt5 = isset($_POST['txt5']) ? $_POST['txt5'] : '';
		$txt6 = isset($_POST['txt5']) ? $_POST['txt5'] : '';

		$txt_1a = isset($_POST['txt_1a']) ? $_POST['txt_1a'] : '';
		$txt_2a = isset($_POST['txt_2a']) ? $_POST['txt_2a'] : '';
		$txt_3a = isset($_POST['txt_3a']) ? $_POST['txt_3a'] : '';
		$txt_4a = isset($_POST['txt_4a']) ? $_POST['txt_4a'] : '';
		$txt_5a = isset($_POST['txt_5a']) ? $_POST['txt_5a'] : '';
		$txt_6a = isset($_POST['txt_6a']) ? $_POST['txt_6a'] : '';
		$txt_7a = isset($_POST['txt_7a']) ? $_POST['txt_7a'] : '';
		$txt_8a = isset($_POST['txt_8a']) ? $_POST['txt_8a'] : '';
		$txt_9a = isset($_POST['txt_9a']) ? $_POST['txt_9a'] : '';
		$tanggal3 = $_POST['tanggal3'];

		$txt_1b = isset($_POST['txt_1b']) ? $_POST['txt_1b'] : '';
		$txt_2b = isset($_POST['txt_2b']) ? $_POST['txt_2b'] : '';
		$txt_3b = isset($_POST['txt_3b']) ? $_POST['txt_3b'] : '';
		$txt_4b = isset($_POST['txt_4b']) ? $_POST['txt_4b'] : '';
		$txt_5b = isset($_POST['txt_5b']) ? $_POST['txt_5b'] : '';
		$txt_6b = isset($_POST['txt_6b']) ? $_POST['txt_6b'] : '';
		$txt_7b = isset($_POST['txt_7b']) ? $_POST['txt_7b'] : '';
		$txt_8b = isset($_POST['txt_8b']) ? $_POST['txt_8b'] : '';
		$txt_9b = isset($_POST['txt_9b']) ? $_POST['txt_9b'] : '';
		$tanggal4 = $_POST['tanggal4'];

		$tgl2 = $this->ubahformatTgl($tanggal2);
		$tgl3 = $this->ubahformatTgl($tanggal3);
		$tgl4 = $this->ubahformatTgl($tanggal4);


		if ($txtno == null) {
			return 0;
		}

		$sql = "
				UPDATE 
				tbsurat_spt_dtl 
			    SET 
				buktikw='$txtbuktikw', tglkw='$tgl2', 
				by1='$txt1', by2='$txt2', by3='$txt3', by4='$txt4', by5='$txt5', by6='$txt6', 
				brk1='$txt_1a', brk2='$txt_2a', brk3='$txt_3a', brk4='$txt_4a', brk5='$txt_5a', 
				brk6='$tgl3', brk7='$txt_7a', brk8='$txt_8a', brk9='$txt_9a', 
				kbl1='$txt_1b', kbl2='$txt_2b', kbl3='$txt_3b', kbl4='$txt_4b', kbl5='$txt_5b', 
				kbl6='$tgl4', kbl7='$txt_7b', kbl8='$txt_8b', kbl9='$txt_9b'   
			    WHERE 
				no_sppd='$txtno'";
		$this->db->query($sql);
		return 1;
	}
	public function saveEditubahPenugasanNip($id = '')
	{
		$txtid = $_POST['txtid'];
		$txtindeks = $_POST['txtidpenugasan'];
		$cbopegawai = $_POST['cbopegawai'];
		if ($txtid == null) {
			return 0;
		}

		$sql = "UPDATE tbsurat_penugasan_dtl SET id_nip='$cbopegawai' WHERE id='$txtid'";
		$this->db->query($sql);
		return 1;
	}

	public function saveEditubahPPDNip($id = '')
	{
		$txtno_sppd = $_POST['txtno_sppd'];
		$txtindeks = $_POST['txtindeks'];
		$cbopegawai = $_POST['cbopegawai'];
		if ($txtno_sppd == null) {
			return 0;
		}

		$sql = "UPDATE tbsurat_spt_dtl 
			SET id_nip='$cbopegawai'
			WHERE no_sppd='$txtno_sppd'";
		$this->db->query($sql);
		return 1;
	}

	//===================================

	public function saveDelSuratKeluar($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_klr WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}

	public function saveDelSuratMasuk($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_msk WHERE indeks_surat_msk = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}
	public function saveDelSuratKeputusan($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_keputusan WHERE indeks_surat_keputusan = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}
	public function saveDelSuratPTA($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_spt WHERE indeks_surat_spt = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}
	public function saveDelSuratPenugasan($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_penugasan WHERE indeks_surat_penugasan = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}

	public function saveDelSuraLapPD($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tblperjalanan_dinas WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}
	public function saveDelSuraNotaDinas($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "Delete FROM tbsurat_dinas WHERE indeks_surat_klr = '$txtindeks'";
		$this->db->query($sql);
		return 1;
	}
	public function saveDelSuraPPDNip($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "
		DELETE FROM tbsurat_spt WHERE indeks_surat_spt = '$txtindeks';
		";
		$this->db->query($sql);
		$sql = "
		DELETE FROM tbsurat_spt_dtl WHERE indeks_surat_spt = '$txtindeks';
		";
		$this->db->query($sql);
		return 1;
	}

	public function saveDelSPPDNip($id = '')
	{
		$txtindeks = $_GET['modal_id'];
		$sql = "
		DELETE FROM tbsurat_spt_dtl WHERE no_sppd = '$txtindeks';
		";
		$this->db->query($sql);
		return 1;
	}
	//=====================================

	public function getAkses($id = '')
	{
		$cari = "SELECT * from tbakses";
		return $this->db->query($cari);
	}

	public function cekUser($nama = '', $pwd = '')
	{
		$cari = "SELECT id_user,id_peg,pwd,nip FROM tbuser where nip LIKE '$nama' or pwd LIKE '$pwd'";
		$c = $this->db->query($cari);
		if ($r = $c->row_array()) {
			return 1;
		} else {
			return 0;
		}
	}

	///
	public function inpuDasar($nama = 'SPT', $das = 1, $id = '')
	{
		$da = 'and dasar != 0';
		if ($das == 0) {
			$da = "and dasar = '$das'";
		}
		$cari = "SELECT * FROM tbl_inputdasar where type = '$nama' $da and idSurat = '$id' ";
		$c = $this->db->query($cari);
		return $c;
	}

	public function saveInpuDasar($d, $t = 1)
	{

		$dasar = $d['dasar'];
		$val = $d['val'];
		$type = $d['type'];
		$idS = $d['idSurat'];

		if ($t == 0) {
			$ttd = $d['ttd'];
			$t = ", ttd = '$ttd'";
		} else {
			$t = '';
			$ttd = '';
		}

		$cari = "SELECT * FROM tbl_inputdasar where type = '$type'and idSurat = '$idS' and  dasar='$dasar'";
		$c = $this->db->query($cari);

		if ($c->num_rows() > 0) {
			$sql = "UPDATE tbl_inputdasar SET val='$val' $t WHERE type = '$type' and dasar='$dasar' and idSurat = '$idS'";
		} else {
			$sql = "INSERT INTO tbl_inputdasar  
				(val, ttd, dasar, idSurat, type) 
				VALUES
				('$val', '$ttd', '$dasar', '$idS', '$type')";
		}
		$this->db->query($sql);
		return $sql;
	}
}
