
<div class="btn-group">
	<a href="<?php echo site_urlc('links/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> 添加 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

	<div class="boxed-inner seamless">
		<div class="control-group">
			<label class="control-label" for="title"> 标题</label>
			<div class="controls">
				<input type="text" name="title" value="<?php echo set_value('title') ?>" id="title" x-webkit-speech>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="link"> 链接</label>
			<div class="controls">
				<input type="text" name="link" value="<?php echo set_value('link') ?>" id="link">
			</div>
		</div>


		<!-- <div class="control-group">
			<label class="control-label" for="content">简介</label>
			<div class="controls">
				<textarea name="content" rows="8" class="input-xxlarge"><?php echo set_value('content') ?></textarea>
			</div>
		</div> -->
			<!-- <div class="control-group">
				<label class="control-label" for="show"><?php echo lang('show') ?>:</label>
				<div class="controls">
					<?php
					$show = array(
						array(
							'title' => "隐藏"
							,'value' => '0'
						)
						,array(
							'title' => "显示"
							,'value' => '1'
						)
					);
					echo ui_btn_switch('show',set_value('show',1),$show);
					?>
					<span class="help-inline"></span>
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label for="img" class="control-label">图片：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>
							<input class="fileupload" type="file" accept="">
						</span>
						<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value('photo') ?>>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb') ?>">
						<span class="help-inline">上传会替换原文件！</span>
					</div>
				</div>
			</div>

			<div id="js-photo-show" class="js-img-list-f"> -->
				<!-- 模板 #tpl-img-list -->
			<!-- </div>
			<div class="clear"></div> -->

		</div>

		<div class="boxed-footer">
			<?php if ($this->ccid): ?>
				<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
			<?php endif ?>
			<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>

	</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript" charset="utf-8">
	require(['tools','adminer/js/media','jquery'],function(tools,media,$){
		var rules = {
			title: {
				required:true,
			},
			link:{
				required:true,
				url:true,
				minlength:6
			}
		};

		var message = {
			title:{
				required: "请输入标题！",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
			},
			link:{
				required: "请输入链接！",
				url:"请输入正确的网站！",
			}
		};
		tools.make_validate('frm-create',rules,message);

		media.init();
		var links_photos = <?php echo json_encode(one_upload(set_value('photo'))) ?>;
		media.show(links_photos,'photo');

	});
</script>
