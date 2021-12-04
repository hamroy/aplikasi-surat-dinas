<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

	public function index()
	{
		$this->load->model('M_set');

		$username = $this->input->post('user');
		$password = $this->input->post('pwd');

		$c = $this->db->get_where('tbuser', array('nip' => $username, 'pwd' => $password, 'kd_instansi' => 'BKPSDM'));
		if ($c->num_rows() > 0) {

			$cari_kd = ("SELECT tbpegawai.nama, tbuser.nip,tbuser.lvl_akses,tbpegawai.id,nama_jabatan,id_user,img
					FROM tbuser, tbpegawai
					WHERE tbuser.id_peg = tbpegawai.id and tbuser.nip LIKE '$username' and pwd='$password' ");
			$c = $this->db->query($cari_kd);
			$tm_cari = $c->result_array()[0];

			$id = $tm_cari['id_user'];
			$nm = $tm_cari['nama'];
			$hak_akses = $tm_cari['lvl_akses'];
			$nm_jbt = $tm_cari['nama_jabatan'];
			$img = $tm_cari['img'];

			if ($img == '') {
				$img = "profil/user.png";
			} else {
				$img = "profil/$img";
			}
			$_SESSION['id_user'] = $id;
			$_SESSION['nm_user'] = $nm;
			$_SESSION['instansi'] = "BKPSDM";
			$_SESSION['profil'] = $img;

			$_SESSION['nm_jbt'] = $nm_jbt;
			$_SESSION['lvl_akses'] = $hak_akses;
			$_SESSION['login'] = TRUE;
			$ckakses = $this->M_set->get_setAksesUSer()->row()->status;
			if ($hak_akses == 1) {
				redirect('C_beranda');
			} elseif ($hak_akses == 2 and $ckakses == 1) {
				redirect('C_beranda');
			} elseif ($hak_akses == 3) {
				redirect('C_beranda');
			}
		}
		// echo "string".$hak_akses .''.$ckakses;
		redirect('login/?error=tidakterdaftar&kode=0');
	}

	public function logout($value = '')
	{
		$this->session->sess_destroy();
		$this->session->set_userdata('login', FALSE);
		redirect('login/?error=logout&kode=0');
	}
}
