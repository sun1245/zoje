
<div class="btn-group"><a href="<?php echo site_url('recruit_apply/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>
<div class="boxed">
	<h3> <i class="fa fa-eye"></i> 在线应聘<span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<div class="boxed-inner seamless">

		<div class="control-group">
			<label for="name" class="control-label">招聘类型：</label>
			<div class="controls">
				<?php echo tag_columns($it['recruit_id']); ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="name" class="control-label">姓名：</label>
			<div class="controls">
				<?php echo $it['name'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="gender" class="control-label">性别：</label>
			<div class="controls">
				<?php echo $it['gender'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="marriage" class="control-label">婚姻状况：</label>
			<div class="controls">
				<?php echo $it['marriage'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="email" class="control-label">E-mail：</label>
			<div class="controls">
				<?php echo $it['email'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="nation" class="control-label">民族：</label>
			<div class="controls">
				<?php echo $it['nation'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="age" class="control-label">年龄：</label>
			<div class="controls">
				<?php echo $it['age'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="politic" class="control-label">政治面貌：</label>
			<div class="controls">
				<?php echo $it['politic'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="birthplace" class="control-label">籍贯：</label>
			<div class="controls">
				<?php echo $it['birthplace'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="edu" class="control-label">文化程度：</label>
			<div class="controls">
				<?php echo $it['edu'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="school" class="control-label">毕业学校：</label>
			<div class="controls">
				<?php echo $it['school'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="major" class="control-label">专业：</label>
			<div class="controls">
				<?php echo $it['major'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="graduation" class="control-label">毕业时间：</label>
			<div class="controls">
				<?php echo $it['graduation'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="language" class="control-label">外语水平：</label>
			<div class="controls">
				<?php echo $it['language'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="position" class="control-label">应聘职位：</label>
			<div class="controls">
				<?php echo $it['position'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="tel" class="control-label">联系电话：</label>
			<div class="controls">
				<?php echo $it['tel'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="content" class="control-label">个人简历：</label>
			<div class="controls">
				<?php echo $it['content'] ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="birthplace" class="control-label">简历下载：</label>
			<div class="controls">
				<?php if(empty($it['files'])){?>
				(没有上传简历)
				<?php } else { ?>
				<a href="<?php echo UPLOAD_URL.tag_photo($it['files']); ?>" target="_blank">点击下载</a>
				<?php } ?>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="thename" class="control-label">提交时间：</label>
			<div class="controls">
				<?php echo mdate("%Y/%m/%d %h:%i:%s" ,$it['timeline']); ?>
				<span class="help-inline"></span>
			</div>
		</div>

			<!-- <div class="control-group">
				<label for="thename" class="control-label">回复时间：</label>
				<div class="controls">
					<input type="text" name="timeline_answer" value="<?php echo mdate('%Y/%m/%d %h:%i:%s' ,time()); ?>">
					<span class="help-inline"></span>
				</div>
			</div> -->

			<!-- <div class="control-group uefull">
				<label for="thename" class="control-label">回复</label>
				<div class="controls">
				<textarea id="editor_id" name="answer"> <?php echo set_value('answer', htmlspecialchars_decode($it['answer'])); ?></textarea>
					<span class="help-inline"></span>
				</div>
			</div> -->
		</div>

		<!-- <div class="boxed-footer">
			<input type="hidden" name="id" value="<?php echo $it['id']?>">
			<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primay">
			<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
		</div> -->
	</div>
</form>

<?php //include_once 'inc_ui_ueditor.php'; ?>
<script type="text/javascript">
	require(['adminer/js/ui'],function(ui){
		ui.editor_create('editor_id');
	});
</script>
