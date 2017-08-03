<div class="btn-group">
<a href="#" class="btn btn-info" id="btn-seo">SEO</a>
<?php if (isset($cfg)): ?>
<a href="#" class="btn btn-info" id="btn-configs" title="<?php echo lang('config') ?>"> <i class="fa fa-cogs"></i> </a>
<?php endif ?>
</div>

<?php $seo = $this->mcol->get_one(array('id'=>$_GET['c']));?>

<!-- SEO -->
<div id="seo-modal" class="modal hide fade">
<?php echo form_open('columns/set_seo_ajax/',array("class"=>"form-horizontal","id"=>"frm-seo")); ?>
	<?php echo form_hidden('cid',$_GET['c']) ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
		<h3> <i class="fa fa-info-circle"></i> SEO 优化</h3>
	</div>
	<div class="modal-body seamless">
		<div class="control-group">
			<label class="control-label" for="title">标题</label>
			<div class="controls">
				<input type="text" id="title" name="title" value="<?php echo set_value('title',$seo['title']) ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="title_seo">优化标题</label>
			<div class="controls">
				<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$seo['title_seo']) ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tags">标签</label>
			<div class="controls">
				<input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$seo['tags']) ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="intro">简介</label>
			<div class="controls">
				<textarea id='intro' name="intro" rows='8' class='span4'><?php echo set_value('intro',$seo['intro']) ?></textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger"> 
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
	</div>
</form>
</div> <!-- end modal -->

<?php include_once 'inc_ui_limit.php'; ?>

<?php
// 权限设定子目录添加
if (get_purview('columns/create')): 
	$back_url = urlencode(current_url());
	$col_create_url = site_urlc('columns/create').'&back_url='.$back_url;
?>
<!-- 
<div class="btn-group pull-right">
	<a href="<?php echo $col_create_url?>" class='btn btn-primary'> <i class="icon-plus icon-white"></i> 子栏目 </a>
</div> -->
<?php endif ?>

<p></p>

<?php
// 二级一下的目录路径显示 
if (count($cpath) > 1): 
?>
<ul class="breadcrumb pull-left">
<li><i class="fa fa-list"></i></li>
<?php 
// 输出所属栏目级别路径
foreach ($cpath as $k => $c) {
	if ($c['id'] == $this->cid) {
		echo '<li class="active"> '.$c['title'].'</li>';
	}else{
		if ( $k == 0 ) {
			echo '<li>'.$c['title'].'<span class="divider">/</span></li>';
		}else{
			echo '<li> <a href="'.site_url($c['controller']).'?c='.$c['id'].'">'.$c['title'].'</a> <span class="divider">/</span></li>';
		}
	}
}
?>
</ul>

<div class="pull-right">
<?php 
if (!empty($cchildren)) {
	echo '<div class="btn-group">';
	foreach ($cchildren as $c) {
		echo '<a class="btn" href="'.site_url($c['controller']).'?c='.$c['cid'].'">'.$c['ctitle'].'</a>';
	}
	echo '</div>';
}
?>
</div>
<?php endif ?>

<div class="clearfix"></div>

<!-- JS file -->
<?php echo static_file('adminer/js/inc_modules_path.js');  ?>
