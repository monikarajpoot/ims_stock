<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_moniter	 extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
        $this->load->model('file_moniter_activity','file_moniter');
        authorize();
    }
    public function index()
    {
        $data = array();
        $section_id = getEmployeeSection();
        $section_explode =  explode(',',$section_id);
        $sec_id = $this->input->get('secid');
        $status = $this->input->get('s');
        $empid = $this->input->get('emp');
        if(isset($status))
        { $sec = $status ;} else { $sec = null ; }
        if(isset($empid)){
            $empid1 =  $empid;
        } else { $empid1 =  null; }
        $data['title'] = $this->lang->line('view_file_manue');
        $data['title_tab'] = 'File moniter';
        $data['get_files'] = $this->file_moniter->getFiles($sec_id,$sec,$empid1);
        $data['module_name'] = "activity_report";
        $data['view_file'] = "activity_report/file_moniter";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }

}