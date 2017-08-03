
<div class="btn-group"><a href="<?php echo site_url('feedback/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>
<div class="boxed">
	<h3> <i class="fa fa-comments-o"></i> 回复反馈<span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<div class="boxed-inner seamless">

		<div class="control-group">
			<label for="thename" class="control-label">用户名：</label>
			<div class="controls">
				<?php echo $it['username'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="telphone" class="control-label">手机：</label>
			<div class="controls">
				<?php echo $it['telphone'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="title" class="control-label">标题：</label>
			<div class="controls">
				<?php echo $it['title'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="thename" class="control-label">邮箱：</label>
			<div class="controls">
				<?php echo '<a href="mailto:'.$it['email'].'" target="_blank">'.$it['email'].'</a>'?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="fax" class="control-label">传真：</label>
			<div class="controls">
				<?php echo $it['fax'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="thename" class="control-label">内容：</label>
			<div class="controls">
				<?php echo $it['content'] ?>
				<span class="help-inline"></span>
			</div>
		</div>


		<div class="control-group uefull">
			<textarea id="answer" name="answer"> <?php echo set_value('answer', htmlspecialchars_decode($it['answer'])); ?></textarea>
		</div>
	</div>

	<div class="boxed-footer">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primay">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</div>
</form>

<script type="text/javascript">
	require(['adminer/js/ui'],function(ui){
		ui.editor_create('answer');
	});
</script>
