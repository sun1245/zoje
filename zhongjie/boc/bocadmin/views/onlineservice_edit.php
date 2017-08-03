
<div class="btn-group">
	<a href="<?php echo site_url('onlineservice/index')?>" class='btn'> <i class="icon-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> <i class="fa fa-pencil"></i> <?php echo lang('edit'); ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span> </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-edit")); ?>

	<div class="boxed-inner seamless">

		<div class="control-group">
			<label class="control-label" for="title"> 名称 </label>
			<div class="controls">
				<input type="text" name="title" value="<?php echo set_value('title',$it['title']) ?>" id="title" x-webkit-speech>
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="link"> 链接 </label>
			<div class="controls">
				<textarea name="link" rows="8" class="input-xxlarge"><?php echo set_value('link',$it['link']) ?></textarea>
			</div>
		</div>

		<!-- 图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label"><?php echo lang('photo') ?>：</label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>
						<input class="fileupload" type="file" accept="">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value('photo',$it['photo']) ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb',$it['thumb']) ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>
		<div class="clear"></div>
		<!-- 图片上传 -->


	</div>

	<div class="boxed-footer">
		<input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript" charset="utf-8">
	require(['tools','adminer/js/media'],function(tools,media){
		var rules = {
			title: {
				required:true,
			}
		};

		var message = {
			title:{
				required: "请输入标题！",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
			}
		};
		tools.make_validate('frm-edit',rules,message);

		media.init();
		var links_photos = <?php echo json_encode(one_upload(set_value('photo',$it['photo']))) ?>;
		media.show(links_photos,'photo');
	});
</script>
