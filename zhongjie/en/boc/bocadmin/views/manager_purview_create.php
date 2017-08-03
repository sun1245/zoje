
<div class="btn-group">
	<a href="<?php echo site_url($this->router->class.'/index') ?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-plus"></i> <?php echo $title.lang('create'); ?> </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>
		<div class="boxed-inner seamless">

			<div class="control-group">
				<label class="control-label" for="title">权限名称:</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title') ?>">
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="parent_id">使用栏目:</label>
				<div class="controls">
					<?php echo ui_btn_select('cid',set_value("cid",0),$cols_select); ?>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="model">模型:</label>
				<div class="controls">
					<input type="text" id="model" name="model" value="<?php echo set_value('model') ?>">
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="method">方法:</label>
				<div class="controls">
					<input type="text" id="method" name="method" value="<?php echo set_value('method') ?>">
					<span class="help-inline">所属模型的方法</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="status">是否有效:</label>
				<div class="controls">
					<div class='btn-group btn-switch'>
						<a href="#" data-value="1" class="btn <?php echo set_switch('status',1,1,'btn-primary') ?>"> 正常 </a>
						<a href="#" data-value="0" class="btn <?php echo set_switch('status',0,1,'btn-primary') ?>"> 禁用</a>
					</div>
					<input type="hidden" id="status" name="status" value="<?php echo set_value('status',1) ?>">
					<span class="help-inline"></span>
				</div>
			</div>

		</div> <!-- end boxed inner -->

		<div class="boxed-footer">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>

<script type="text/javascript" charset="utf-8">

require(['tools'],function(tools){
	rules = {
		title: {
			required:true
		},
		model:{
			required:true
		},
		method:{
			required:true
		}
	};
	messages = {
		title: {
			required : "标题必须存在！"
		},
		method:{
			required: "输入模型!"
		},
		method:{
			required: "输入正确的控制器!"
		}
	};
	tools.make_validate('frm-create',rules,messages);
});
</script>
