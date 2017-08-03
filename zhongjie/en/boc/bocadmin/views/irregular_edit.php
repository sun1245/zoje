
<div class="btn-group"><a href="<?php echo site_urlc('infos/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i> 编辑消息 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

	<div class="boxed-inner seamless">

		<?php if(!empty($it['title'])) {?>
		<div class="control-group">
			<label for="title" class="control-label">标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

		<?php if(!empty($it['tagtitle'])) {?>
		<div class="control-group">
			<label for="tagtitle" class="control-label">副标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="tagtitle" id="tagtitle" value="<?php echo set_value('tagtitle',$it['tagtitle']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

		<?php if(!empty($it['entitle'])) {?>
		<div class="control-group">
			<label for="entitle" class="control-label">英文标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="entitle" id="entitle" value="<?php echo set_value('entitle',$it['entitle']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

		<?php if(!empty($it['tagintro'])) {?>
		<div class="control-group">
			<label class="control-label" for="tagintro"> 概述 </label>
			<div class="controls">
				<textarea name="tagintro" rows="8" class="input-xxlarge"><?php echo set_value('tagintro',$it['tagintro']) ?></textarea>
			</div>
		</div>
		<?php } ?>


		<!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类:</label>
			<div class="controls">
				<?php
				echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

		<?php if(!empty($it['content'])) {?>
		<div class="control-group uefull">
			<textarea id="content" name="content"> <?php echo set_value('content',$it['content']); ?></textarea>
		</div>
		<?php } ?>

		<!-- 图片上传 -->
		<?php if(!empty($it['photo'])) {?>
		<div class="control-group">
			<label for="img" class="control-label">图片：</label>
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
		<?php } ?>
		<!-- 图片上传 -->

	</div>
	<div class="boxed-footer">
		<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
		<?php endif ?>
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</form>
</div>

<!-- 注意加载顺序 -->
<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
		// $('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
		<?php if(!empty($it['content'])) {?>
		ui.editor_create('content');
		<?php } ?>

		<?php if(!empty($it['photo'])) {?>
		media.init();
		var articles_photos = <?php echo json_encode(one_upload($it['photo'])) ?>;
		media.show(articles_photos,"photo");
		<?php } ?>

	});
</script>
