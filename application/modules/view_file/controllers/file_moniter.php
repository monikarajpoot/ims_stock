<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_moniter	 extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
      //  $this->load->model('view_file_model','view_file');
        $this->load->model('file_search_model','file_search');
        authorize();
    }
    public function index()
    {
		if($this->input->get('u') != ''){
			$empid	= $this->input->get('u');
		} else{
			$empid = null;
		}
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $data = array();
        if(isset($_GET['files_year']) && $_GET['files_year']!=''){$files_year=$_GET['files_year'];}else{ $files_year=date('Y');}
        if(isset($_GET['files_month']) && $_GET['files_month']!=''){$files_month=$_GET['files_month'];}else{ $files_month=date('m');}
        $data['title'] = $this->lang->line('view_file_manue');
        $dt = DateTime::createFromFormat('!m', $files_month);
        $vmonth = $dt->format('F');
        $data['title_tab'] = 'File moniter: <b class="text-red">You are viewing '.$vmonth.'-'.$files_year.' Files </b>';
        $data['module_name'] = "view_file";
        if(isset($_GET['psmrk']) && $_GET['psmrk'] !=''){
           $data['get_files'] = $this->file_search->file_search('psmrk',$_GET['psmrk']);
        }else{
            $data['get_files'] = file_moniter_byuser(null, null, $empid);
        }
        $data['view_file'] = "view_file/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }

}