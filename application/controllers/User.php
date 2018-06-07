<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1
 * Time: 15:40
 */

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		
//		$posts = $this->input->post(NULL, true);
		extract($_POST);
		
		$wh = [];
		
		if ($id) $wh['id'] = $id;
		if ($realname) $wh['realname'] = $realname;
		if ($status!='') $wh['status'] = $status;
		
		
		$currentpage = element('currentPage', $_POST, 1);
		$pagesize = element('pageSize', $_POST, 10);
		$page = ($currentpage - 1) * $pagesize;
		
		$fields = "id,username,email,qq,last_time,update_timie";
		
		$rows = $this->db->where($wh)->limit($pagesize, $page)->select("*")->get("t_user")->result_array();
		$ret1 = $this->db->where($wh)->select("count(*) as num")->get("t_user")->row_array();
		
//		echo $this->db->last_query(), "\n";
		
		$count = $ret1['num'];
		
		$data['data'] = $rows;
		$data['total'] = intval($count);
		
		echo json_encode($data);
		
	}
	
	public function edit()
	{
		
		if (!$_POST) return;
		extract($_POST);
		
		$id = intval($id);
		
		if (strlen($password) != 32) {
			$password = pwd($password);
		}
		
		$data = array(
			'username' => $username,
			'password' => $password,
			'realname' => $realname,
			'email' => $email,
			'phone' => $phone,
			'qq' => $qq,
			'status' => $status,
			'update_time' => date('Y-m-d H:i:s',time()),
		);
		
		
		$this->db->where('id', $id)->update("t_user", $data);
		
		re_json([], 0, '更新成功');
		
	}
	
	public function add()
	{
		
		if (!$_POST) return;
		extract($_POST);
		
		$where['or'] = ['username',$username];
		$where['or'] = ['realname',$realname];
		
		$this->db->or_where('username', $username);
		$this->db->or_where('realname', $realname);
		
		$row = $this->db->get('t_user')->row();
		
		if($row) {
			re_json([], 1, '用户名有重复');
			return;
		}
		
		$data = array(
			'username' => $username,
			'password' => pwd($password),
			'realname' => $realname,
			'email' => $email,
			'phone' => $phone,
			'qq' => $qq,
			'status' => $status,
			'update_time' => date('Y-m-d H:i:s',time()),
			'create_man' => $_SESSION['id'],
			'create_time' => date('Y-m-d H:i:s',time()),
		);
		
		$this->db->insert("t_user", $data);
		
		re_json([], 0, '添加成功');
		
	}
	
	public function delete ()
	{
		
		$id = intval($this->input->get('id'));
		$this->db->where('id', $id)->delete("t_user");
		re_json([], 0, '删除成功');
	}
	
	/**
	 * 修改密码
	 */
	public function change_password ()
	{
		
		if ($this->input->method() != 'post') return;
		
		extract($_POST);
		
		
		if ($pass != $checkPass) {
			$this->_echo_json(1, '两次密码输入不一致');
		}
		
		$row = $this->db->limit(1)->where(['id' => $_SESSION['id']])->get('t_user')->row();
		
		if (!$row) {
			$this->_echo_json(1, '用户不存在');
		}
		
		if ($row->password != pwd($password)) {
			$this->_echo_json(1, '旧密码错误');
		}
		
		$data = array('password' => pwd($checkPass));
		
		$bool = $this->db->where('id', $_SESSION['id'])->update("t_user", $data);
		
		$this->_echo_json($bool ? 0 : 1);
		
	}
	
}
