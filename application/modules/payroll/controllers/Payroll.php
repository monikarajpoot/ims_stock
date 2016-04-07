<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('template');
       
      
    }

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        } else if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        } else {
            $data['title'] = $this->lang->line('home_title');
            $data['notice'] = $this->admin_notice->fetchnoticebyid();
            $this->load->view('home', $data);
        }
    }

    /**
     * encript the datakey 
     * @return mixed
     */
    function __encrip_password($datakey) {
        return md5($datakey);
    }

    /**
     * check the username and the password with the database
     * @return void
     */
    public function all_cate()
    {
      $this->form_validation->set_rules('complaint_type','complaint_type' , 'trim|required');
        $this->form_validation->set_rules('complaint_subtype','complaint_subtype' , 'trim|required');
        $this->form_validation->set_rules('complaint_subject','complaint_subject' , 'trim|required');
        $this->form_validation->set_rules('complaint_containts','complaint_containts' , 'trim|required');
        
        //$this->form_validation->set_rules('complaint_for_emp','complaint_for_emp' , 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
 
        if ($this->form_validation->run($this) == TRUE)
        {
            $mark_section_id = 7; //direct mark to so establishment
            $file_last_number = $this->est_model->get_file_last_number();
            $section_file_last_number = $this->est_model->get_file_last_number_sectionwise($mark_section_id);
            
            // mark to SO establishment
            $receiver_so = get_section_employee(7,8);
            $receiver_so_emp_id = $receiver_so[0]->emp_id;
            
            //mark user who are currently work on this categoery
            $receiver_emp_id = get_category_allote_emp($this->input->post('complaint_subtype'));
            
            if($receiver_emp_id == false || $receiver_emp_id == ''){
                $receiver_emp_id = $receiver_so_emp_id;
                $multi_user_receiver_id = $receiver_so_emp_id;
            } else {
                $multi_user_receiver_id = $receiver_emp_id.','.$receiver_so_emp_id;
            }
            
            //pr($receiver_emp_id);
            $form_data = array(
                'file_mark_section_id'    => $mark_section_id,
                'file_received_emp_id'    => $receiver_emp_id,
                'file_sender_emp_id'      => $this->session->userdata("emp_id"),
                'file_mark_section_date'  => date('Y-m-d H:i:s'),
                'file_update_date'  => date('Y-m-d H:i:s'),
                'file_level_id'           => '30',   // WORK IN PROGRESS (file_movement_level_master)
                'file_unit_level'         => '57', // 50 is cr unit id
                'createfile_empid'        => $this->input->post('complaint_for_emp') != '' ?  $this->input->post('complaint_for_emp') : $this->session->userdata("emp_id"),
                'multi_user_receiver_id'  => $multi_user_receiver_id,
                'file_status'  => 'p',
            );
           //pr($form_data);          
            
            $form_data_fixed = array(
                'file_number'            => $file_last_number,
                'file_section_serial_no'   => $section_file_last_number,
                'file_type'            => 'app',
                'section_file_type'     => $this->input->post('complaint_subtype'),
                'file_subject'         => $this->input->post('complaint_subject'),
                'file_description'      => $this->input->post('complaint_containts'),
                'file_created_date'    => date('Y-m-d H:i:s'),
                'file_return'            => '0',
            );
            $final_form_data = array_merge($form_data, $form_data_fixed);
            //pr($final_form_data);
            if(isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0){
                $file_upload = uploadalltypeFile('file_upload' , './uploads/documents_file/' );
            } else {
                $file_upload = '';
            }
            $for_emp  = $this->input->post('complaint_for_emp') != '' ? ' के '.getemployeeName($this->input->post('complaint_for_emp'), true)  : ' के ';
            $file_log_data1 = array(
                'section_id'  => $mark_section_id,
                'to_emp_id'   => $receiver_emp_id,
                'from_emp_id' => $this->session->userdata("emp_id"),
                'flog_other_remark' => getemployeeName($this->session->userdata("emp_id"), true).$for_emp.'द्वारा आवेदन किया गया है |' ,
                'flog_remark' => "Subject : ".$this->input->post('complaint_subject'),
                'flog_ip_address' => gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR'])),
                'flog_browser_id' => $_SERVER['HTTP_USER_AGENT'],
                'document_path' => $file_upload,
                'file_status_log'  => 'p',
            );
            // pr($file_log_data1);
            $empdetails = empdetails($this->session->userdata("emp_id"));
            $crno_ofsec_marksec = $mark_section_id;
            $form_data_move1 = array(
                'fmove_current_user_id'  => $receiver_emp_id,
                'fmove_previous_user_id' => $this->session->userdata("emp_id"),
                'fmove_from_unit_id'     => '57',   // Esttablisment section to
                'fmove_to_unit_id'       => '51',   // Section officer
            );
            //  pr($form_data_move1);          
        
            if($update_id){
                /* $res = updateData(FILES, $form_data, array('file_id'=>$id));
                if($res){
                    $this->session->set_flashdata('message', $this->lang->line('file_update_success_msg'));
                } */
            }else{
                if(isset($receiver_emp_id) && $receiver_emp_id != '' && $receiver_emp_id != null)
                {
                    // INSERT IN FILE AND FILE_LOG AND FILE_MOVEMENT TABLE RP
                    $res = insertData_with_lastid($final_form_data, FILES);
                    if($res) {
                        $file_id1 = array('file_id' => $res);
                        $finallog = array_merge($file_log_data1, $file_id1);
                        insertData($finallog, FILES_LOG);                        

                      /*$file_id_oth = array('f_file_id' => $res);
                        $file_other = array_merge($file_other_feilds, $file_id_oth);
                        insertData($file_other, FILES_OTHER_FEILDS);*/

                        $file_id2 = array('fmove_file_id' => $res);
                        $form_data_move = array_merge($form_data_move1, $file_id2);
                        insertData($form_data_move, FILES_MOVEMENT);

                        $this->session->set_flashdata('message', 'फाइल  सफलतापूर्वक दर्ज की गई,  जिसका  <b > &nbsp;क्रमांक :- ' . $section_file_last_number . '</b>&nbsp; हैं |');
                    }
                } else{ $this->session->set_flashdata('message', '<span class="text-bold">Marked user is not found, try after some time</span>');
                }
            }           
            redirect('establishment/complaints');
        }
    
        $data = array();
        $data['title'] = $this->lang->line('add_complaint_title');
        $data['title_tab'] = $this->lang->line('add_complaint_sub_title');      
        $data['input_data'] = $this->input->post();
        $data['module_name'] = "establishment";
        $data['view_file'] = 'complaint_create';
        $this->template->index($data);
    }
    public function uploadfile()
    {
      $this->load->view("uploadfrom");
    }
 function do_upload() {
        print_r($_FILES);//die;
        $config = array(
            'upload_path'   => './uploads/payroll/',
            'allowed_types' => 'xlsx',
            'max_size'      => '100',
            'max_width'     => '1024',
            'max_height'    => '768',
            'encrypt_name'  => true,
        );

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('uploadfrom', $error);
        } else {
            $upload_data = $this->upload->data();
           // print_r($upload_data['file_name']);

            $filename = $upload_data['file_name'];
            $filepsth = $upload_data['file_path'];
            $content = file_get_contents($filepsth.$filename);
            print_r($content);
            die;
            $data_ary = array(
                'title'     => $upload_data['client_name'],
                'file'      => $upload_data['file_name'],
                'width'     => $upload_data['image_width'],
                'height'    => $upload_data['image_height'],
                'type'      => $upload_data['image_type'],
                'size'      => $upload_data['file_size'],
                'date'      => time(),
            );

            //$this->load->database();
           // $this->db->insert('upload', $data_ary);

            //$data = array('upload_data' => $upload_data);
           // $this->load->view('upload_success', $data);
        }
    }
    public function show_404() {
        $this->load->view('404');
    }

    public function faq() {
        $data['title'] = 'FAQ'; //$this->lang->line('title_faq');
        $this->load->view('faq', $data);
    }

    public function privacy_policy() {
        $data['title'] = 'Privacy policy'; //$this->lang->line('title_faq');
        $this->load->view('privacy_policy', $data);
    }

    public function departmental_setup() {
        $data['title'] = 'Departmental setup'; //$this->lang->line('title_faq');
        $this->load->view('departmental_setup', $data);
    }

    /**
     * logout all session and redirect to home page
     * @return void
     */
    public function logout() {
        $this->Users_model->destroy_user_login_log();
        $this->session->sess_destroy();
        no_cache();
        redirect("home");
    }

}
