<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>CD自动化刊登</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/reset.css">
    <link href="/assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/element-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/components.css">
    
    <?php $this->load->view('common/common_css');?>
</head>

<body>
<div id="app">
    <div class="header">
     
        <div class="title">
            <h1>CD自动化刊登</h1>
        </div>
		
        <?php $this->load->view('back_index_user_notice_mod'); ?>
    </div>
	
    <div class="nav">
        <?php $this->load->view('back_index_nav_menu');?>

		<?php $this->load->view('back_index_footer');?>

    </div>
	
	
	
</div>

<?php $this->load->view('common/common_js');?>

<script src="<?php echo base_url('assets/js/mian.js?t='.(rand(1,10000000)));?>"></script>

<script>
    $(".el-submenu__title i").removeClass('el-icon-arrow-down').addClass("fa fa-caret-right");
    
    //点击修改密码按钮，打开左边的菜单栏
    $('#change_pass_btn').click(function(e) {
        e.preventDefault();
        $('#sys_manage').trigger('click');
        $('#change_password').trigger('click');
    });
    
    //查看更多消息
    $('#msg_readmore').click(function(e) {
        e.preventDefault();
        $('#sys_manage').trigger('click');
        $('#tongzhi').trigger('click');
    });
    
</script>

</body>
</html>
