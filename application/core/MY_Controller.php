<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1
 * Time: 10:10
 */

class MY_Controller extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		
		if(isset($_GET['bend'])) $this->output->enable_profiler(true);
		
		if(!$_SESSION['id']) {
			
			redirect("/login/index");
			exit("");
			
		}
			
//			if(in_array($this->uri->uri_string, ['back/index'])) {
//				redirect("/login/index");
//				exit("");
//			}
//
//			re_json([], 1, '未登录');
//			exit("");
//		}
		
	
	}
	
	function setWhere($getwhere){
		if(is_array($getwhere)){
			foreach($getwhere as $key=>$where){
				if($key=='findinset'){
					
					$this->db->where("1","1 AND FIND_IN_SET($where)",FALSE);
					continue;
				}
				if(is_array($where)){
					if($key == 'or'){
						$this->db->or_where($where[0],$where[1]);
					} elseif($key == 'like') {
						foreach($where as $k => $v) {
							$this->db->like($k, $v, 'both');
						}
					} elseif($key == 'not in') {
						$this->db->where_not_in($where[0], $where[1]);
					} else {
						$this->db->where_in($key, $where);
					}
				}elseif($key == 'str'){
					$this->db->where($where);
				}else{
					$this->db->where($key,$where);
				}
			}
		} else {
			$this->db->where($getwhere);
		}
	}
	
	protected function _echo_json ($error = 0, $error_msg = '', $data = array())
	{
		echo json_encode(array('error' => (int)$error, 'msg' => (string)$error_msg, 'data' => (array)$data));
        exit;
	}
	
}
