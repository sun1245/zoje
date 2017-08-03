
<div class="btn-group">
	<a href="<?php echo site_url('columns/create'); ?>" class='btn btn-primary' > <i class="fa fa-plus"></i> 栏目 </a>
</div>

<p></p>

<div class="boxed">
	<div class="boxed-inner">
		<h3> <i class="fa fa-list"></i> 栏目列表 </h3>
		<input id='selectbox-all' type="checkbox" class="hide" >
		<ul class="boxed-list select-list sort-list">
		<?php echo tree_cols($list); ?>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>


<p></p>

<script>
'use strict';
require(['adminer/js/ui'],function(ui){
	var columns = {
		url_del: "<?php echo site_url('columns/delete'); ?>"
		,url_sort: "<?php echo site_url('columns/sortid'); ?>"
		,show: "<?php echo site_url('columns/show_ajax'); ?>"
	}

	// ui.fancybox_img();
	ui.btn_delete(columns.url_del);		// 删除
	ui.sortable(columns.url_sort,'.sort-list','asc');
	ui.btn_show(columns.show);		// 显示隐藏
});

</script>
