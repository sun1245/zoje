<?php include_once 'inc_modules_path.php'; ?>

<h3>  <i class="fa fa-pencil"></i>  <?php echo $title; ?></h3>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<?php echo form_open(site_urlc($this->class.'/edit'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

	<input class="hide" type="text" id="p-title" name="title" value="<?php echo set_value('title',$seo['title']) ?>">
	<input class="hide" type="text" id="p-title_seo" name="title_seo" value="<?php echo set_value('title_seo',$seo['title_seo']) ?>">
	<input class="hide" type="text" id="p-tags" name="tags" value="<?php echo set_value('tags',$seo['tags']) ?>">
	<textarea class="hide" id='p-intro' name="intro" rows='8' class='span4'><?php echo set_value('intro',$seo['intro']) ?></textarea>

	<div class="boxed-inner seamless">


		<div class="control-group">
			<label for="title" class="control-label">标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>



		<div class="control-group">
			<label for="tagtitle" class="control-label">副标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="tagtitle" id="tagtitle" value="<?php echo set_value('tagtitle',$it['tagtitle']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>



		<div class="control-group">
			<label for="entitle" class="control-label">英文标题:</label>
			<div class="controls">
				<input type="text" class='span7' name="entitle" id="entitle" value="<?php echo set_value('entitle',$it['entitle']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label for="url" class="control-label">链接:</label>
			<div class="controls">
				<input type="text" class='span7' name="url" id="url" value="<?php echo set_value('url',$it['url']); ?>">
				<span class="help-inline"></span>
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="tagintro"> 概述 </label>
			<div class="controls">
				<textarea name="tagintro" rows="8" class="input-xxlarge"><?php echo set_value('tagintro',$it['tagintro']) ?></textarea>
			</div>
		</div>



		<div class="control-group uefull">
			<textarea id="content" name="content" > <?php echo set_value('content',$it['content']); ?></textarea>
		</div>


		<div class="control-group">
			<label class="control-label" for="status"> 下载远程图片 </label>
			<div class="controls">
				<input type='radio' name="isremote" value="1" >是
				<input type='radio' name="isremote" value="0" checked='checked'>否
				<span class="help-inline"></span> <span style="color:#F00">内容中的图片可以选择是否要下载到本网站中！</span>
			</div>
		</div>

		<!-- 图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label">图片：</label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>
						<input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="1" value="<?php echo $it['photo'] ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>

		<div class="clear"></div>

	</div>

	<div class="boxed-footer">
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
	require(['jquery','adminer/js/ui','adminer/js/media'],function($,ui,media){
		ui.editor_create('content');
		var page_photos = <?php echo json_encode(list_upload($it['photo'])) ?>;

		media.init();
		media.show(page_photos,'photo');
		media.sort('photo');
		$("#js-photo-show" ).sortable().disableSelection();
	});
</script>

