<?php
class M_unit extends CI_Model{

	function get_all_unit(){
		$hsl=$this->db->query("SELECT tbl_unit.*,DATE_FORMAT(unit_tanggal,'%d %M %Y') AS tanggal FROM tbl_unit ORDER BY unit_id DESC");
		return $hsl;
	} 
	
	function simpan_unit($judul,$isi,$user_nama,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_unit (unit_judul,unit_deskripsi,unit_author,unit_image) VALUES ('$judul','$isi','$user_nama','$gambar')");
		return $hsl;
	}

	function get_unit_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_unit WHERE unit_id='$kode'");
		return $hsl;
	}

	function update_unit($unit_id,$judul,$isi,$user_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_unit SET unit_judul='$judul',unit_deskripsi='$isi',unit_author='$user_nama',unit_image='$gambar' WHERE unit_id='$unit_id'");
		return $hsl;
	}

	function update_unit_tanpa_img($unit_id,$judul,$isi,$user_nama){
		$hsl=$this->db->query("UPDATE tbl_unit SET unit_judul='$judul',unit_deskripsi='$isi',unit_author='$user_nama' WHERE unit_id='$unit_id'");
		return $hsl;
	}

	function hapus_unit($kode){
		$hsl=$this->db->query("DELETE FROM tbl_unit WHERE unit_id='$kode'");
		return $hsl;
	}


	//Frontend
	function get_unit(){
		$hsl=$this->db->query("SELECT tbl_unit.*,DATE_FORMAT(unit_tanggal,'%d %M %Y') AS tanggal FROM tbl_unit ORDER BY unit_id DESC");
		return $hsl;
	}

	function get_unit_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_unit.*,DATE_FORMAT(unit_tanggal,'%d %M %Y') AS tanggal FROM tbl_unit ORDER BY unit_id DESC LIMIT $offset,$limit");
		return $hsl;
	}
}