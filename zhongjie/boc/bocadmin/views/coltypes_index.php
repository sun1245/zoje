<div class="btn-group">
	<a href="<?php echo $this->url_col; ?>" class='btn btn-info' > <i class="fa fa-arrow-left"></i> 返回栏目 </a>

	<a href="<?php echo site_urlc('coltypes/create'); ?>" class='btn btn-primary' > <i class="fa fa-plus"></i> 添加分类 </a>
</div>

<p></p>

<div class="boxed">
	<div class="boxed-inner">
		<h3> <i class="fa fa-list"></i> 分类管理 </h3>
		<input id='selectbox-all' type="checkbox" class="hide" >
		<ul class="boxed-list select-list sort-list">
		<?php echo tree_ctype($list); ?>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>


<script>
'use strict';

require(['adminer/js/ui'],function(ui){
	var form_list = {
		url_del: "<?php echo site_url('coltypes/delete'); ?>"
		,url_sort: "<?php echo site_url('coltypes/sortid'); ?>"
	}

	// ui.fancybox_img();
	ui.btn_delete(form_list.url_del);		// 删除
	ui.sortable(form_list.url_sort,'.sort-list','asc');
});
</script>
