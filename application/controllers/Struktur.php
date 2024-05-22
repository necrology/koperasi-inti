<?php
class Struktur extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_photo');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['alb']=$this->m_album->get_all_album();
		$x['data']=$this->m_photo->get_all_photo();
		$this->load->view('v_photo',$x);
	}
}
