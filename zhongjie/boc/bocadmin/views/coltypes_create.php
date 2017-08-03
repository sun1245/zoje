
<div class="btn-group">
	<a href="<?php echo site_urlc('coltypes/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-plus"></i> 分类追加 </h3>
	<?php
		echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create"));
	?>
		<!-- form start -->
		<div class="boxed-inner seamless">

			<?php if ($ctype = list_coltypes($this->cid,0,$this->input->get('field'))) {
		    	array_unshift($ctype,array('id'=>0,'fid'=>0,'title'=>"顶级"))
		    ?>
			<div class="control-group">
				<label class="control-label" for="fid"> 所属分类:</label>
				<div class="controls">
					<?php
						echo ui_btn_select('fid',set_value("fid",0),$ctype);
					?>
					<span class="help-inline"></span>
				</div>
			</div>
			<?php }else{
				echo form_hidden('fid', 0);
			} ?>

			<div class="control-group">
				<label class="control-label" for="title">名称</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title') ?>" placeholder="类型名称" required>
				</div>
			</div>

			<div class="control-group">
				<label for="img" class="control-label">封面：</label>
				<div class="controls">
					<div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> 类型封面 <?php echo $size ?> </span>
							<input class="fileupload" type="file" accept="" <?php echo $size ? "data-size='$size'":"" ?> >
						</span>
						<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value('photo') ?>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb') ?>">
					</div>
				</div>
			</div>

			<div id="js-photo-show" class="js-img-list-f">
				<!-- 模板 #tpl-img-list -->
			</div>
			<div class="clear"></div>

			<?php echo form_hidden('name', $_GET['field']); ?>
			<?php echo form_hidden('cid', $_GET['cid']); ?>
		</div> <!-- end boxed body -->

		<div class="boxed-footer">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
require(['adminer/js/media'],function(media){
	var coltypes_photos =  <?php echo json_encode(one_upload(set_value('photo'))) ?>;
	media.init();
	media.show(coltypes_photos,"photo");
});
</script>
