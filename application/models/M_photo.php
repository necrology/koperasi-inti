<?php
class M_photo extends CI_Model{

	function get_all_photo(){
		$hsl=$this->db->query("SELECT tbl_photo.*,DATE_FORMAT(photo_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_photo join tbl_album on photo_album_id=album_id ORDER BY photo_id DESC");
		return $hsl;
	}
	function simpan_photo($judul,$album,$user_id,$user_nama,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into tbl_photo(photo_judul,photo_album_id,photo_pengguna_id,photo_author,photo_gambar) values ('$judul','$album','$user_id','$user_nama','$gambar')");
            $this->db->query("update tbl_album set album_count=album_count+1 where album_id='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_photo($photo_id,$judul,$album,$user_id,$user_nama,$gambar){
		$hsl=$this->db->query("update tbl_photo set photo_judul='$judul',photo_album_id='$album',photo_pengguna_id='$user_id',photo_author='$user_nama',photo_gambar='$gambar' where photo_id='$photo_id'");
		return $hsl;
	}
	function update_photo_tanpa_img($photo_id,$judul,$album,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_photo set photo_judul='$judul',photo_album_id='$album',photo_pengguna_id='$user_id',photo_author='$user_nama' where photo_id='$photo_id'");
		return $hsl;
	}
	function hapus_photo($kode,$album){
		$this->db->trans_start();
            $this->db->query("delete from tbl_photo where photo_id='$kode'");
            $this->db->query("update tbl_album set album_count=album_count-1 where album_id='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_photo_home(){
		$hsl=$this->db->query("SELECT tbl_photo.*,DATE_FORMAT(photo_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_photo join tbl_album on photo_album_id=album_id ORDER BY photo_id DESC limit 4");
		return $hsl;
	}

	function get_photo_by_album_id($idalbum){
		$hsl=$this->db->query("SELECT tbl_photo.*,DATE_FORMAT(photo_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_photo join tbl_album on photo_album_id=album_id where photo_album_id='$idalbum' ORDER BY photo_id DESC");
		return $hsl;
	}
	

}