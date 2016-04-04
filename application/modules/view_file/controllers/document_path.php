<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Document_path extends MX_Controller {

     function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file', 'hindi');
		$this->load->language('advocate', 'hindi');
        $this->load->model('notesheet_model');
         authorize();
    }

    public function index($id = null) {
        $data = array();		
        $data['title'] = 'Documents Path';
        $data['title_tab'] = 'Section Documents';
		if(in_array(checkUserrole(), array(3,4,5,6,7))){
			$file_data = getFiledata($id);
			$section_id = $file_data[0]['file_mark_section_id'];			
		} else {
			$section_id = getEmployeeSection();
		}
        $data['notesheets_menu_list'] = get_list(NOTESHEET_MASTER_MENU, NULL, array('section_id' => $section_id));
        if ($id) {
            $data['file_dat_show'] = getFiledata($id);
        }
        $data['module_name'] = "view_file";
        $data['view_file'] = "view_file/document_path";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }

    
}