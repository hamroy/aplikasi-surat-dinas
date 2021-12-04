<?php
/**
 * 
 */
class M_set extends CI_model
{	
	public function get_setAksesUSer($js_set=1)
	{
		$this->db->where('js_set',$js_set);
		return $this->db->get('tbl_set');
	}

	public function up_setAksesUSer($value=0)
	{
		$this->db->where('js_set',$value['js_set']);
		$this->db->update('tbl_set',$value);
	}

	public function tglpc($value='')
	{
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y", time()+($ms)); // the "-" can be switched to a plus if that's what your time        zone is.
		$waktu = gmdate ( "H:i:s", time()+($ms));
		$hariini = gmdate('d-m-Y H:i:s', time() + ($ms));
		$tglpc = gmdate('Y-m-d H:i:s', time() + ($ms));		

		return $tglpc;
	}

	public function tglIndo($tgl='')
	{
	  
	  $arr_tgl = explode ("-",$tgl);
	  $bln=$arr_tgl['1'];
	  $pbln=substr($bln, -1);
      if ($bln>=10) {
      $pbln=substr($bln, -2);
      }
        $blnaray=array(
                    '1'=>'Januari',
                    '2'=>'Februari',
                    '3'=>'Maret',
                    '4'=>'April',
                    '5'=>'Mei',
                    '6'=>'Juni',
                    '7'=>'Juli',
                    '8'=>'Agustus',
                    '9'=>'September',
                    '10'=>'Oktober',
                    '11'=>'November',
                    '12'=>'Desember',
        );

         
		return $arr_tgl['2'].' '.$blnaray[$pbln].' '.$arr_tgl['0'];
	}

	public function namaHaritgl($tgl='')
	{
		$daftar_hari = array(
						 'Sunday' => 'Minggu',
						 'Monday' => 'Senin',
						 'Tuesday' => 'Selasa',
						 'Wednesday' => 'Rabu',
						 'Thursday' => 'Kamis',
						 'Friday' => 'Jumat',
						 'Saturday' => 'Sabtu'
						);
	  $tanggal=$tgl;
	  $namahari = date('l', strtotime($tanggal));
		//Function date(String1, strtotime(String2)); adalah fungsi untuk mendapatkan nama hari
	   return $daftar_hari[$namahari];
	}


}