<?php
class Unit extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_unit');
	}
	function index(){
		$jum=$this->m_unit->get_unit();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=3;
        $config['base_url'] = base_url() . 'unit/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_unit->get_unit_per_page($offset,$limit);
		$this->load->view('v_unit',$x);
	}

}