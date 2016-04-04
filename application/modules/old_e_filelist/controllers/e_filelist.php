<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class E_filelist extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('template');
        $this->load->language('view_file','hindi');
        $this->load->model('view_file/view_file_model','view_file');
        $this->load->model('efile_list_model','efile_model');        
        //$this->load->model('notesheet_model');        
        authorize();
    }
    public function index()
    {
        $data['title'] = $this->lang->line('e_file_title');
        $data['title_tab'] = $this->lang->line('e_file_title_tab');
        $data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'inbox');
        $emp_role_lvl= get_emp_role_levele();
		
			getEmployeeSection();
			$notesheet_id=null;
			$data['notesheet_id'] = $notesheet_id;
			$data['section_id']=getEmployeeSection();
			$data['title'] = $this->lang->line('Add_document');
			$data['title_tab'] = $this->lang->line('title');
			$data['view_file'] = "view_file/viewfile_fornotesheet";
			$views = show_view_as_lvl();
			$data['view_file'] = "$views";
		//$data['view_file'] = "view_file/view_file_list";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
    public function sent()
    {
        $data['title'] = $this->lang->line('e_file_title');
        $data['title_tab'] = $this->lang->line('e_file_title_tab');
        //echo modules::run('module/view_file/index',$id=null);
        $data['get_files'] = $this->efile_model->sent_efile();;
        $views = show_view_as_lvl();
		$data['view_file'] = "$views";
		$data['notesheet_id'] = "";
		$data['section_id'] = "";
        $data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);        
    }
    public function working()
    {   
		$emp_role_lvl= get_emp_role_levele();
		$data['title'] = $this->lang->line('e_file_title');
        $data['title_tab'] = $this->lang->line('e_file_title_tab');
        //echo modules::run('module/view_file/index',$id=null);
        $data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'working');
       
			getEmployeeSection();
			$notesheet_id=null;
			$data['notesheet_id'] = $notesheet_id;
			$data['section_id']=getEmployeeSection();
			$data['title'] = $this->lang->line('Add_document');
			$data['title_tab'] = $this->lang->line('title');
			$views = show_view_as_lvl();
			$data['view_file'] = "$views";
		
        
		$data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);        
    }
	public function ajax_count_inbox(){
		$file_working_array=$this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'working');/*working*/		
		$total_working= count($file_working_array);/*working*/		
		
		$total_array= $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'inbox'); /*Inbox*/
		$inbox= count($total_array);/*Inbox*/
		$sent_file_array = $this->efile_model->sent_efile();/*Sent*/
		$total_sent= count($sent_file_array);/*Sent*/
		
		$ibox=array($total_working,$inbox,$total_sent,);/*working,inbox,sent*/		
		echo json_encode($ibox);
		//$this->output->set_content_type('application/json')->set_output(json_encode($ibox));
	}
}