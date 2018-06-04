<?php


	class Back extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function index()
		{
			$this->load->view("home");
		}
		
		public function info()
		{
			
			$user = $this->db->limit(1)->where(['id' => $_SESSION['id']])->get('t_user')->row_array();
			
			$this->load->view("info", $user);
			
		}
		
		public function get_init() {
			
//			print_r($_SESSION);
            
            //站内消息
            
           re_json(array(
                'msgs' => $msgs,
                'msgs_count' => 100,
                'notice' => $notice,
                'loginout_url' => '/login/logout',
                'username' => $this->session->username,
//                'type' => $this->session->type,
            ));
		}
	}
