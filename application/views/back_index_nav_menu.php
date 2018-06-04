<div class="nav-list" :class="{'layout-hide-text': spanLeft < 5}">
    <div class="layout-header">
        <i class="fa fa-navicon" @click.prevent="toggleClick" :class="{'icon-rotate': spanLeft < 5}"></i>
    </div>
    <el-menu :default-active="isrc.replace('/assets/components/', '').replace('/sck-shiyong/fbaTest/','').replace('/sck-shiyong/', '').replace(/\?auto=([0-9]+)/, '')"
             :default-openeds="opened"
             class="el-menu-vertical-demo"
             theme="dark"
             :unique-opened="true">
        <el-tooltip class="item home" effect="dark" content="首页" placement="right-start" :disabled="isDisabled">
            <el-menu-item index="back/info" @click="changeUrl">
                <i class="fa fa-home"></i>
                <span class="layout-text-block">首页</span>
            </el-menu-item>
        </el-tooltip>
		
        <el-tooltip class="item" effect="dark" content="基础管理" placement="right-start" :disabled="isDisabled">
            <el-submenu index="1">
                <template slot="title"><span class="layout-text">基础管理</span></template>

			
				<el-tooltip class="item" effect="light" content="用户管理" placement="right"
							:disabled="isDisabled">
					<el-menu-item index="v/users.html" @click="changeUrl">
						<i class="fa fa-pencil"></i>
						<span class="layout-text-block">用户管理</span>
					</el-menu-item>
				</el-tooltip>
				
                <el-tooltip class="item" effect="light" content="店铺管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="collect/collect-m.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">店铺管理</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="分类管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="zhiping/seller/zhiping-m.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">分类管理</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="产品管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="qa/qa-m.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">产品管理</span>
                    </el-menu-item>
                </el-tooltip>
              
      
            </el-submenu>
        </el-tooltip>
    
     
        <el-tooltip class="item" effect="dark" content="系统设置" placement="right-start" :disabled="isDisabled">
            <el-submenu index="4">
                <template slot="title"><span class="layout-text" id="sys_manage">系统设置</span></template>

                <el-tooltip class="item" effect="light" content="用户管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="bumen/source/index.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">部门管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="用户管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="users/seller_users.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">用户管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" id="change_password" effect="light" content="修改密码" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="v/password.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">修改密码</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="角色管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="role/seller_role.html" @click="changeUrl">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">角色管理</span>
                    </el-menu-item>
                </el-tooltip>

               
            </el-submenu>
        </el-tooltip>
    </el-menu>
</div>
