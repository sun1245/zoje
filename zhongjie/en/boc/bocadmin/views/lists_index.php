<div class="btn-group">
	<a href="#" id="btn-create" class='btn btn-primary' >  <i class="fa fa-plus"></i> 清单 </a>
</div>

<?php include_once 'inc_modules_path.php'; ?>

<div class="boxed">
	<div class="boxed-inner">
	<h3> <?php echo $title ?> </h3>
	<p style='display:none;'><input type="checkbox" id="selectbox-all"></p>
	<ul class="boxed-list select-list sort-list">
	<?php foreach ($list as $v):?>
		<li data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
		 <span> <input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" > </span>
		 <span> <?php echo $v['title'].' - ' ?> </span>
		 <span> <?php echo $v['content'] ?> </span>
		 <div class="btn-group pull-right">
		 	<?php include 'inc_ui_audit.php'; ?>
		 	<a class="btn btn-small btn-edit" href="#" title="<?php echo lang('edit') ?>" data-id="<?php echo $v['id']; ?>"> <i class="fa fa-pencil"></i></a>
		 	<a class="btn btn-danger btn-small btn-del" href="#" title="<?php echo lang('del') ?>" data-id="<?php echo $v['id'] ?>"> <i class="fa fa-times"></i> </a>
		 </div>
		 </li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>

<?php echo $pages; ?>

<div id="lists-modal" class="modal hide fade">
<?php echo form_open('#',array("class"=>"form-horizontal","id"=>"frm-list")); ?>

	<?php echo form_hidden('cid',$_GET['c']) ?>
	<?php if ($this->ccid): ?>
	<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
	<?php endif ?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
		<h3> <i class="fa fa-list"></i> 清单 </h3>
	</div>

	<div class="modal-body seamless">

		<div class="control-group">
			<label class="control-label" for="title">标题</label>
			<div class="controls">
				<input type="text" id="title" name="title" value="">
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="content">内容</label>
			<div class="controls">
				<textarea name="content" id="content" rows='8' class='span4'> </textarea>
				<span class="help-inline"></span>
			</div>
		</div>

	</div>

	<div class="modal-footer">
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
	</div>
</form>
</div>

<script>

require(['adminer/js/ui','adminer/js/lists'],function(ui,lists){

	var form_list = {
		cid : "<?php echo $this->cid ?>"
		,id:0
		,action : "create"
		,url_create : "<?php echo site_urlc('lists/create'); ?>"
		,url_edit : "<?php echo site_urlc('lists/edit'); ?>"
		,url_del: "<?php echo site_urlc('lists/delete'); ?>"
		,url_audit: "<?php echo site_urlc('lists/audit'); ?>"
		// TODO: update view template aflter create/edit done
		,url_sort: "<?php echo site_urlc('lists/sortid'); ?>"
	}
	lists(form_list);

	ui.fancybox_img();
	ui.btn_delete(form_list.url_del);		// 删除
	ui.btn_audit(form_list.url_audit);	// 审核
	ui.sortable(form_list.url_sort);
});
</script>
