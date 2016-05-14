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
		$emp_role_lvl= get_emp_role_levele(); 
        $data['title'] = $this->lang->line('e_file_title');
        $data['title_tab'] = $this->lang->line('e_file_title_tab');
        /*First Time*/
		if($emp_role_lvl['emprole_level']==13){ //For DA
			//echo $emp_role_lvl['emprole_level'];
			$data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'inbox');
			$get_files_return = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'return');	
			if(count($get_files_return) > 0){
				$data['get_files'] = array_merge($data['get_files'],$get_files_return);
			}
			if(count($data['get_files'])<=0){
				$data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'return');	
			}
		}else{
			
			$data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'inbox');
		}
        $emp_role_lvl= get_emp_role_levele();		
		getEmployeeSection();
		$notesheet_id=null;
		$data['notesheet_id'] = $notesheet_id;
		$data['section_id']=getEmployeeSection();
		$data['title'] = 'अंकित ई-फ़ाइलें';
		$data['title_tab'] = $this->lang->line('title');		
		$data['view_file'] = "view_file/viewfile_fornotesheet";
		$views = show_view_as_lvl();
		$data['view_file'] = "$views";
		$data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
    public function sent()
    {
        $data['title'] = 'भेजी गई ई-फ़ाइलें';
        $data['title_tab'] = $this->lang->line('e_file_title_tab');        
        $data['get_files'] = $this->efile_model->sent_efile();;        
        $views = 'view_file/file_moniter';		
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
		//$data['total_count_files']=json_decode($this->ajax_count_inbox(true),true);		
        $data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'working');
		getEmployeeSection();
		$notesheet_id=null;
		$data['notesheet_id'] = $notesheet_id;
		$data['section_id']=getEmployeeSection();
		$data['title'] = 'कार्यरत ई-फाइलें';
		$data['title_tab'] = $this->lang->line('title');
		$views = show_view_as_lvl();		
		$data['view_file'] = "$views";
		$data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
    }
	public function ajax_count_inbox($is_retur=false){
		$file_working_array=$this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'working');/*working*/		
		$total_working= count($file_working_array);/*working*/		
		
		$total_array= $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'inbox'); /*Inbox*/
		$inbox= count($total_array);/*Inbox*/
		if($inbox==0){
			$total_array= $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'return'); /*return*/
			$inbox= count($total_array);/*Inbox*/
		}
		$sent_file_array = $this->efile_model->sent_efile();/*Sent*/
		$total_sent= count($sent_file_array);/*Sent*/
		
		$ibox=array($total_working,$inbox,$total_sent,);/*working,inbox,sent*/		
		if($is_retur==false){
			echo json_encode($ibox);
		}else{
			return json_encode($ibox);
		}
		//$this->output->set_content_type('application/json')->set_output(json_encode($ibox));
	}
	public function efile_sign(){

		$emp_role_lvl= get_emp_role_levele();
		$data['title'] = 'फाइल पर  हस्ताक्षर';
        $data['title_tab'] ='फाइल पर  हस्ताक्षर'  ;
        //echo modules::run('module/view_file/index',$id=null);
		//$data['total_count_files']=json_decode($this->ajax_count_inbox(true),true);
        $data['get_files'] = $this->efile_model->geteFiles($section_explode=null, $moveup_down=null,$section_id_search=null,'working');
		$notesheet_id=null;
		$data['notesheet_id'] = $notesheet_id;
		$data['section_id']=getEmployeeSection();
		$data['view_file'] = "e_filelist/file_list_sign";
		$data['view_left_sidebar'] = 'admin/left_sidebar';
        $this->template->index($data);
	}
	public function post_multi_signature_old_notuse(){
        //pre($this->input->post());
        $i=0;  $j=0; $k=0;
        $post_data_array=array();
		$checked_row_id  = array_keys($this->input->post('ck_file_id'));

		$content_row_id  = array_keys($this->input->post('signing_content'));
		$ck_file_id = $this->input->post('ck_file_id');

		$ck_file_id = $this->input->post('ck_file_id');

		$section_id = $this->input->post('section_id');

		$up_down = $this->input->post('up_down');

		$empid = $this->input->post('empid');

		$signing_content = $this->input->post('signing_content');

		$file_status = $this->input->post('file_status');

		$draft_log_id = $this->input->post('draft_log_id');

		$file_param1 = $this->input->post('file_param1');
		$file_param2 = $this->input->post('file_param2');
		$file_param3 = $this->input->post('file_param3');
		$file_param4 = $this->input->post('file_param4');
		/*Common*/
		$checkval = array_intersect($checked_row_id,$content_row_id);
		//pre($post_val);
		/*File ID*/
		foreach($checkval as $keyr => $checkval1){
			//FileId
			$post_data_array_b[$keyr]['ck_file_id'] = $ck_file_id[$checkval1];
			/*Section Id*/
			$post_data_array_b[$keyr]['section_id'] = $section_id[$checkval1];
			/*File up_down*/
			$post_data_array_b[$keyr]['up_down'] = $up_down[$checkval1];
			/*empid*/
			$post_data_array_b[$keyr]['empid'] = $empid[$checkval1];
			/*file_status*/
			$post_data_array_b[$keyr]['file_status'] = $file_status[$checkval1];
			/*draft_log_id*/
			$post_data_array_b[$keyr]['draft_log_id'] = $draft_log_id[$checkval1];
			/*Signing Contant*/
			$post_data_array_b[$keyr]['signing_content'] = $signing_content[$checkval1];
			/*file_param1*/
			$post_data_array_b[$keyr]['file_param1'] = $file_param1[$checkval1];
			/*file_param2*/
			$post_data_array_b[$keyr]['file_param2'] = $file_param2[$checkval1];
			/*file_param3*/
			$post_data_array_b[$keyr]['file_param3'] = $file_param3[$checkval1];
			/*file_param4*/
			$post_data_array_b[$keyr]['file_param4'] = $file_param4[$checkval1];

		}
		//pr($post_data_array_b);
		echo json_encode($post_data_array_b);
	}
	
	public function post_multi_signature(){
        //pre($this->input->post());
        $i=0;  $j=0; $k=0;
        $post_data_array=array();
		$checked_row_id  = array_keys($this->input->post('ck_file_id'));

		$content_row_id  = array_keys($this->input->post('signing_content'));
		$ck_file_id = $this->input->post('ck_file_id');

		$ck_file_id = $this->input->post('ck_file_id');

		$section_id = $this->input->post('section_id');

		$up_down = $this->input->post('up_down');

		$empid = $this->input->post('empid');

		$signing_content = $this->input->post('signing_content');

		$file_status = $this->input->post('file_status');

		$draft_log_id = $this->input->post('draft_log_id');

		$file_param1 = $this->input->post('file_param1');
		$file_param2 = $this->input->post('file_param2');
		$file_param3 = $this->input->post('file_param3');
		$file_param4 = $this->input->post('file_param4');
		/*Common*/
		$checkval = array_intersect($checked_row_id,$content_row_id);
		//pre($post_val);
		/*File ID*/
		foreach($checkval as $keyr => $checkval1){
			//FileId
			$post_data_array_b[$keyr]['ck_file_id'] = $ck_file_id[$checkval1];
			/*Section Id*/
			$post_data_array_b[$keyr]['section_id'] = $section_id[$checkval1];
			/*File up_down*/
			$post_data_array_b[$keyr]['up_down'] = $up_down[$checkval1];
			/*empid*/
			$post_data_array_b[$keyr]['empid'] = $empid[$checkval1];
			/*file_status*/
			$post_data_array_b[$keyr]['file_status'] = $file_status[$checkval1];
			/*draft_log_id*/
			$post_data_array_b[$keyr]['draft_log_id'] = $draft_log_id[$checkval1];
			/*Signing Contant*/
			$post_data_array_b[$keyr]['signing_content'] = $signing_content[$checkval1];
			/*file_param1*/
			$post_data_array_b[$keyr]['file_param1'] = $file_param1[$checkval1];
			/*file_param2*/
			$post_data_array_b[$keyr]['file_param2'] = $file_param2[$checkval1];
			/*file_param3*/
			$post_data_array_b[$keyr]['file_param3'] = $file_param3[$checkval1];
			/*file_param4*/
			$post_data_array_b[$keyr]['file_param4'] = $file_param4[$checkval1];

		}
		
		$file_order_id=array_values($this->input->post('file_order_id'));	
		/*Create File Order Id Array*/		
		foreach($file_order_id as $orderids)
		{
			$order_detail = get_draft($orderids,'o');
			$file_order_id_zero=get_draft_log_data($orderids,true,null,null);
			//$order_sign_content= stripslashes(md5($file_order_id_zero[0]->draft_content));
			$order_sign_content=  urlencode(base64_encode($file_order_id_zero[0]->draft_content)); 
			$file_order_id_array[]=array(
										'ck_file_id'=>$order_detail['draft_file_id'],
										'section_id'=>'0',										
										'up_down'=>'order',
										'empid'=>'0',	
										'file_status'=>'0',											
										'signing_content'=>$order_sign_content,
										'file_param1'=>md5($file_order_id_zero[0]->draft_content),	
										'file_param2'=>$file_order_id_zero[0]->draft_log_id,
										'file_param3'=>'0',											
										'file_param4'=>emp_session_id());													
		}		
		if(count($file_order_id_array)>0){
			//pre($file_order_id_array);
			$post_data_array_b = array_merge($post_data_array_b,$file_order_id_array);
		}
		/*Other Deparment notesheet Array*/
		$file_other_dpt_nt_id =array_values($this->input->post('file_other_dpt_nt_id'));
		foreach($file_other_dpt_nt_id as $odnids)
		{
			$other_nt_detail = get_draft($odnids,'odn');
			$other_dept_notesheet_ids=get_draft_log_data($odnids,true,null,null);	
			//$order_sign_content= "<script>encodeURIComponent(escape(".$other_dept_notesheet_ids[0]->draft_content."),'UTF-8')</script>";
			//$odn_sign_content= stripslashes(md5($other_dept_notesheet_ids[0]->draft_content));
			//$odn_sign_content= stripslashes(md5($other_dept_notesheet_ids[0]->draft_content));
			$odn_sign_content = urlencode(base64_encode($other_dept_notesheet_ids[0]->draft_content)); 
			$other_dept_notesheet_ids_array[]=array('ck_file_id'=>$other_nt_detail['draft_file_id'],
										'section_id'=>'0',										
										'up_down'=>'odn',
										'empid'=>'0',	
										'file_status'=>'0',											
										'signing_content'=>$odn_sign_content,
										'file_param1'=>md5($other_dept_notesheet_ids[0]->draft_content),
										'file_param2'=>$other_dept_notesheet_ids[0]->draft_log_id,
										'file_param3'=>'0',											
										'file_param4'=>emp_session_id());
		}		
		if(count($other_dept_notesheet_ids_array)>0){
			//pre($file_order_id_array);
			$post_data_array_b = array_merge($post_data_array_b,$other_dept_notesheet_ids_array);
		}		
		//pr($post_data_array_b);
		echo json_encode($post_data_array_b);
	}
    public function add_multi_signature(){
        //pre($this->input->post());
        $i=0;
        $j=0;
        $k=0;
        $post_data_array=array();
        foreach($this->input->post() as $ky=>$val){
            if($ky=='ck_file_id'){
                $total_post = count($val);
               foreach($val as $value1){
                    $post_data_array[$j][$ky]=$value1;
                    $j++;
               }
            }
            if($ky=='section_id'){
                $total_post;
                for($a=0;$a<$total_post;$a++){
                    $post_data_array[$a]['section_id']=$val[$a];
                }
            }
            if($ky=='up_down'){
                $total_post;
                for($b=0;$b<$total_post;$b++){
                    $post_data_array[$b]['up_down']=$val[$b];
                }
            }
            if($ky=='empid'){
                $total_post;
                for($c=0;$c<$total_post;$c++){
                    $post_data_array[$c]['empid']=$val[$c];
                }
            }
            if($ky=='signing_content'){
                $total_post;
                for($d=0;$d<$total_post;$d++){
                    $post_data_array[$d]['signing_content']=$val[$d];
                }
            }
            if($ky=='file_status'){
                $total_post;
                for($e=0;$e<$total_post;$e++){
                    $post_data_array[$e]['file_status']=$val[$e];
                }
            }

            if($ky=='file_prama1'){
                $total_post;
                for($f=0;$f<$total_post;$f++){
                    $post_data_array[$f]['file_prama1']=$val[$f];
                }
            }
            if($ky=='file_prama2'){
                $total_post;
                for($g=0;$g<$total_post;$g++){
                    $post_data_array[$g]['file_prama2']=$val[$g];
                }
            }
            if($ky=='file_prama3'){
                $total_post;
                for($h=0;$h<$total_post;$h++){
                    $post_data_array[$h]['file_prama3']=$val[$h];
                }
            }
            if($ky=='file_prama4'){
                $total_post;
                for($z=0;$z<$total_post;$z++){
                    $post_data_array[$z]['file_prama4']=$val[$z];
                }
            }
            $i++;
        }
        //manage_file/Sendfile_upperofficer/14137;
		//pr($post_data_array);
        foreach($post_data_array as $ky=>$file_data){
            $user_level = get_emp_role_levele();

            if($file_data['up_down']==1){
                $file_id = $file_data['ck_file_id'];
                $rmk1="";
                $mark_emp_id=$file_data['empid'];
                $section_id=$file_data['section_id'];
                $file_status=$file_data['file_status'];
                modules::run('manage_file/multi_file_send_upper_officer',$file_id,$rmk1,$mark_emp_id,$section_id,$file_status);
            }
            if($file_data['up_down']==0){
                //pre($file_data);
                //echo $file_data['up_down'];
                //$sent_to_uper_officer=array('fileids2','rmk1','emp_id2','file_status');
                $file_id = $file_data['ck_file_id'];
                $rmk1="";
                $mark_emp_id=$file_data['empid'];
                $section_id=$file_data['section_id'];
                $file_status=$file_data['file_status'];
                //view_file/dealing_file/sent_to_da
                if($user_level['emprole_level']=='6'){/*SO or Incharge*/
                    modules::run('view_file/dealing_file/multi_file_sent_to_da',$file_id,$mark_emp_id,$section_id,$file_status);
                }else{
                    modules::run('manage_file/multi_file_send_upper_officer',$file_id,$rmk1,$mark_emp_id,$section_id,$file_status);
                }
            }
        }
        $this->session->set_flashdata('message', 'File Send to Successfully');
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function received_multiple_files(){
		//pre($this->input->post());
		$file_emp_mark_id = $this->input->post('file_emp_mark_id');
		$file_selected_file_ids = $this->input->post('file_selected_file_ids');
		$file_ids_array = explode(',',$file_selected_file_ids);
		//pr($file_ids_array);
		//foreach($file_ids_array as $val){
			if(emp_session_id()==$file_emp_mark_id){
				echo modules::run('manage_file/multiple_file_receive_sectionno',$file_ids_array);
			}else{
				echo modules::run('manage_file/multi_file_receive_sectionno_mark_da',$file_ids_array,$file_emp_mark_id);
			}
		//}
		//modules::run('manage_file/multi_file_receive_sectionno_mark_da',$file_emp_mark_id);
		//receive_file_sectionno($fileid = '')
	}
	public function add_multiple_draft(){
		//pr($this->input->post());
	
	//echo "ghj  ".$draft_content_text = $this->input->post('draft_content_text');die;
	$file_selected_file_ids = $this->input->post('file_selected_file_ids');
	$save_draft = 'save_draft';
	$file_ids_array = explode(',',$file_selected_file_ids);
			//pr($file_ids_array);
		foreach($file_ids_array as $val){
			$file_data = get_draft_from_file($val);
			//pr($file_data);
			$draft_id = $file_data['final_draft_id'];
			$subject = $file_data['file_subject'];
			$file_receive = $file_data['file_hardcopy_status']; 
			
			if($file_receive == 'received')
			{
				$responce = modules::run('draft/draft/auto_add_multiple_draft', $val,$subject ,$draft_id 	,$draft_content_text ,$save_draft);
			}
			
		}
		if($responce){
					echo json_encode("success");
				}
	}
	
}