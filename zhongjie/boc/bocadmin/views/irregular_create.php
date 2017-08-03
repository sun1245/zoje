
<div class="btn-group">
	<a href="<?php echo site_urlc('infos/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?></a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-plus"></i> <span class="badge badge-success pull-right"><?php echo $title; ?></span> <?php echo lang('add') ?></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

	<div class="boxed-inner seamless">

		<div class="control-group">
			<label class="control-label" for="title"> <?php echo lang('title') ?> </label>
			<div class="controls">
				<input type="text" class='span7' id="title" name="title" value="<?php echo set_value("title") ?>">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="tagtitle"> 副<?php echo lang('title') ?> </label>
			<div class="controls">
				<input type="text" class='span7' id="tagtitle" name="tagtitle" value="<?php echo set_value("tagtitle") ?>">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="entitle"> 英文<?php echo lang('title') ?> </label>
			<div class="controls">
				<input type="text" class='span7' id="entitle" name="entitle" value="<?php echo set_value("entitle") ?>">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="tagintro"> 概述 </label>
			<div class="controls">
				<textarea name="tagintro" rows="8" class="input-xxlarge"><?php echo set_value('tagintro') ?></textarea>
			</div>
		</div>



		<!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类:</label>
			<div class="controls">
				<?php $ctypeid= isset($_GET['ctype']) ? $_GET['ctype'] : 0; ?>
				<?php
				echo ui_btn_select('ctype',set_value("ctype",$ctypeid),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>



		<div class="control-group uefull">
			<textarea id="content" name="content" ><?php echo set_value("content") ?></textarea>
		</div>



		<!-- 图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label">图片：</label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>
						<input class="fileupload" type="file" accept="">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value("photo") ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value("thumb") ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>
		<div class="clear"></div>
		<!-- 图片上传 -->

	</div>

	<div class="boxed-footer">
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
		<?php endif ?>
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
	// timepick
	// $('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
	// ueditor处理
	ui.editor_create('content');
	// media 上传
	media.init();
	var articles_photos = <?php echo json_encode(one_upload(set_value("photo"))) ?>;
	media.show(articles_photos,"photo");
});

</script>
