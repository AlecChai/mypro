
<div id="nav-content">
	<div class="nav-wrapper clearfix">
		<div class="nav-main">
			<el-tabs v-model="editableTabsValue2" type="border-card"  closable @tab-remove="removeTab" @tab-click="clickTab">
				<el-tab-pane v-for="(item, index) in editableTabs2" :key="item.name" :label="item.title" :name="item.name">
					<iframe id="my-iframe" class="my-iframe" :src="item.src"></iframe>
				</el-tab-pane>
			</el-tabs>
		</div>
	</div>
	
<!--	<div class="nav-footer">-->
<!--		<p> Copyright &copy  CD自动化刊登 </p>-->
<!--	</div>-->

</div>


