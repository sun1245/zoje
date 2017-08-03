
<div class="btn-group">
	<a href="<?php echo site_url('modules/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i>  <?php echo $title; ?> 注册 </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

		<div class="boxed-inner seamless">

			<div class="control-group">
				<label class="control-label" for="title">名称:</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title',$it['title']) ?>"  placeholder="栏目名称" required>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="controller">控制器:</label>
				<div class="controls">
					<input type="text" id="controller" name="controller" value="<?php echo set_value('controller',$it['controller']) ?>" placeholder="Module name" required>
					<span class="help-inline"> 模型文件必须存在! </span>
				</div>
			</div>

		</div> <!-- end boxed body -->

		<div class="boxed-footer">
			<input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>

<script type="text/javascript" charset="utf-8">
require(['tools','adminer/js/media'],function(tools,media){
	rules = {
		title: {
			required:true
		},
		controller:{
			required:true
		}
	};
	messages = {
		title: {
			required : "标题必须存在！"
		},
		controller:{
			required: "输入正确的控制器!"
		}
	};
	tools.make_validate('frm-create',rules,messages);
});
</script>
