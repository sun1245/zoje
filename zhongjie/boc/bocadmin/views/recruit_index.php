<div class="btn-group">
	<a href="<?php echo site_urlc('recruit/create'); ?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> <?php echo $title; ?> </a>
</div>

<?php include_once 'inc_modules_path.php'; ?>
<?php include_once 'inc_ctype_index.php'; ?>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>排序</th>
					<th>招聘岗位</th>
					<th>发布日期</th>
					<!-- <th>截止日期</th> -->
					<th class="span1"> <?php echo lang('action') ?> </th>
				</tr>
			</thead>
			<tbody  class="sort-list">
				<?php foreach ($list as $v):?>
					<tr  data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a> </td>
						<td> <?php echo $v['title'] ?> </td>
						<td> <?php echo date('Y-m-d',$v['timeline']) ?> </td>
						<!-- <td> <?php echo date('Y-m-d',$v['expiretime']) ?> </td> -->
						<td>
							<div class="btn-group">

								<?php if(ENVIRONMENT=="development"){ ?>
								<a class='btn  btn-small btn-ajax-copy' data-id="<?php echo $v['id'] ?>" href="#"  title="复制"> 复制</a>
								<?php } ?>

								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn btn-small' href=" <?php echo site_urlc( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
								<a class='btn btn-danger btn-small btn-del' data-id="<?php echo $v['id'] ?>" href="#" title="<?php echo lang('del') ?>"> <i class="fa fa-times"></i> <?php // echo lang('del') ?></a>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>

<?php echo $pages; ?>

<script>
	require(['adminer/js/ui'],function(ui){
		var recruit = {
			url_del:"<?php echo site_urlc('recruit/delete'); ?>"
			,url_show: "<?php echo site_urlc('recruit/show_ajax'); ?>"
			,url_audit: "<?php echo site_urlc('recruit/audit'); ?>"
			,url_sort: "<?php echo site_urlc('recruit/sortid'); ?>"
			,url_sort_change: "<?php echo site_urlc('recruit/sort_change'); ?>"
			,url_copy: "<?php echo site_urlc('recruit/copypro'); ?>"
		};

		ui.fancybox_img();
	ui.btn_delete(recruit.url_del);	// 删除
	ui.btn_show(recruit.url_show); 	// 显隐
	ui.btn_audit(recruit.url_audit);// 审核
	ui.sortable(recruit.url_sort);	// 排序
	ui.sort_change(recruit.url_sort_change); // input 排序
	ui.btn_copy(recruit.url_copy);    // 复制
});
</script>
