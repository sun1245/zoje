
<div class="btn-group">
	<a href="<?php echo site_url('modules/create'); ?>" class='btn btn-primary' > <i class="fa fa-plus"></i> 注册模块 </a>
</div>

<p></p>

<div class="boxed span6">
	<div class="boxed-inner seamless">

<table class="table table-striped table-hover select-list">
	<thead>
		<tr>
			<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
			<th> 名称</th>
			<th class="span3"> 控制器</th>
			<th class="span1"> <?php echo lang('action') ?> </th>
		</tr>
	</thead>
	<tbody class="sort-list">
		<?php foreach ($list as $v):?>
		<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
			<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
			<td> <?php echo $v['title'] ?> </td>
			<td> <?php echo $v['controller'] ?></td>
			<td style="text-align:right;">
				<div class="btn-group">
					<a class='btn btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> " title=" <?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i></a>
					<a class='btn btn-danger btn-small btn-del' data-id="<?php echo $v['id']; ?>" title="<?php echo lang('del') ?>"> <i class="fa fa-times"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

	</div>
</div>
<!-- end boxed -->

<div class="clearfix"></div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>

<?php echo $pages; ?>

<div id="lists-modal" class="modal hide fade">
<?php echo form_open('#',array("class"=>"form-horizontal","id"=>"frm-list")); ?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
		<h3> <i class="fa fa-puzzle-piece" title="模块管理"></i> 模型  </h3>

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
				<input type="text" id="content" name="content" value="">
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


<script type="text/javascript" charset="utf-8">
require(['adminer/js/ui','tools'],function(ui,tools){
	var modules = {
		del: "<?php echo site_url('modules/delete'); ?>"
	 	,url_create : "<?php echo site_url('modules/create'); ?>"
	 	,url_edit : "<?php echo site_url('modules/edit'); ?>"
	 	,url_sort: "<?php echo site_url('modules/sortid'); ?>"
	};

	ui.btn_delete(modules.del);		// 删除
	ui.sortable(modules.url_sort);
	rules = {
		title: {
			required:true
		},
		controller:{
			required:true
		}
	};
	messages = {
		title: {
			required : "标题必须存在！"
		},
		controller:{
			required: "输入正确的控制器!"
		}
	};
	tools.make_validate('frm-create',rules,messages);

});
</script>
