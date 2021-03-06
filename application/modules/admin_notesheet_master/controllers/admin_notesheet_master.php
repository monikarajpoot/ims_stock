<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_notesheet_master extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('admin_notesheet_master_model', 'notesheet_master_model');
        $this->load->language('admin_notesheet_master', 'hindi');
    }

    public function index() {
        $data = array();
        $data['title'] = $this->lang->line('notesheet_title_label');
        $data['title_tab'] = $this->lang->line('notesheet_title_tab');
        $data['notesheet_list'] = get_list(NOTESHEET_MASTER, 'notesheet_id', null);
        //pre($data['get_section']);
        $data['module_name'] = "admin_notesheet_master";
        $data['view_file'] = "admin_notesheet_master/index";
        $this->template->index($data);
    }

    public function manage_notesheet($id = null) {
        $this->load->helper(array('form', 'url'));
        $data = array();
        $data['title'] = $this->lang->line('notesheet_title_label');
        $data['title_tab'] = $this->lang->line('notesheet_manage_title_tab');
        $data['is_page_edit'] = 0;
        
        if (isset($id) && $id != '') {
            $data['page_title'] = $this->lang->line('manage_label_edit');
            $notesheet_master_detail = get_list(NOTESHEET_MASTER, null, array('notesheet_id' => $id));
            $data['notesheet_master'] = $notesheet_master_detail[0];
            //pre($data['otherwork_master_detail']);
            $data['id'] = $id;
        } else {

            $data['page_title'] = $this->lang->line('add_notesheet_label');
        }
        $this->form_validation->set_rules('section_id', $this->lang->line('notesheet_master_section_label'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('notesheet_type', $this->lang->line('notesheet_master_type_label'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('head_id', $this->lang->line('notesheet_master_head_label'), 'trim|xss_clean');
        $this->form_validation->set_rules('notesheet_title', $this->lang->line('list_label_notesheet_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('file_name', $this->lang->line('notesheet_master_label_file'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('notesheet_href_url', $this->lang->line('notesheet_master_label_file_link'), 'trim|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        // if($this->input->post()){
        //     pre($this->input->post());
        // }
        $section_tbl_data = array($this->input->post());
        if ($this->form_validation->run($this) === TRUE) {
            $file_path = NOTESHEET_ABS_PATH.getSection($this->input->post('section_id'), true).'/';
            $file_name = $this->input->post('file_name').'.php';
            if(!file_exists($file_path.$file_name)){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>Please add first `'.$file_name.'` file on `'.$file_path.'` location</div>');
                redirect('admin/notesheets');
            }
            if ($id) {
                $res = updateData(NOTESHEET_MASTER, $section_tbl_data[0], array('notesheet_id' => $id));
                if ($res) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('update_success_message') . '</div>');
                }
            } else {
                $res = insertData_with_lastid($section_tbl_data[0], NOTESHEET_MASTER);
                if ($res) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable hideauto"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-check"></i>' . $this->lang->line('success_message') . '</div>');
                }
            }
            redirect('admin/notesheets');
        }
        $data['new_notesheet_no'] = $this->notesheet_master_model->get_notesheet_new_no();
        $data['view_file'] = "admin_notesheet_master";
        $data['module_name'] = "admin_notesheet_master";
        $this->template->index($data);
    }

    function alpha_dash_space($str) {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('alpha_dash_space', $this->lang->line('text_allow_with_space_error'));
            return false;
        }
    }

    function get_notification_master_menu() {
        $section_id = $this->input->post('section_id');
        $data = get_list(NOTESHEET_MASTER_MENU, 'notesheet_menu_title_hi', array('section_id' => $section_id));
        echo json_encode($data);
        exit();
    }

    function get_file_notesheet($notesheet_name = null, $section_id = null, $task = null) {
        $this->load->view($notesheet_name);
    }

    function view_file_notesheet($notesheet_id = null, $section_id = null, $file_id = null, $file_sts = null) {
       //die("asdasd");
	   if($notesheet_id != null){
		    $data['title'] = 'E-file';
            $data['file_details']  = getFiledata($file_id);
            $data['notesheet_details']  = $this->notesheet_master_model->get_notesheet_details($notesheet_id);
            $data['is_genrate'] = false;
            $data['file_sts'] = $file_sts != null ? $file_sts : '';
			$data['view_file'] = "common_structure";
			$data['module_name'] = "admin_notesheet_master";
			$this->template->index($data);
           // $this->load->view('common_structure', $data);
        } else {
            $this->show_404();
        }
    }
    
    function create_folder(){
        $sections = get_list(SECTIONS,'','');
        $file_path = NOTESHEET_ABS_PATH;
        foreach($sections as $row){
            $section_name=  $row['section_short_name'];
            $path = $file_path.$section_name;
            if(!is_dir($path)) //create the folder if it's not already exists
            {
                mkdir($path, 0755, TRUE);
            } 
        }
    }
    
    public function show_404() {
        $this->load->view('404');
    }

}
