
<div class="btn-group">
	<a href="<?php echo site_urlc('dealer/create')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> <?php echo $title; ?> </a>
</div>

<?php include_once 'inc_modules_path.php'; ?>

<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>排序</th><!-- 
					<th>省份</th>
					<th>市区</th> -->
					<th>名称</th>
					<th>固定电话</th>
					<!-- <th>移动电话</th> -->
					<th>时间</th>
					<th class="span1">操作</th>
				</tr>
			</thead>
			<tbody class="sort-list">
				<?php foreach ($list as $v):?>
					<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a></td><!-- 
						<td> <?php echo get_region_title($v['provinceid']) ?></td>
						<td> <?php echo get_city_title($v['cityid']) ?></td> -->
						<td> <?php echo strcut($v['title'],15) ?></td>
						<td> <?php echo $v['telphone'] ?></td>
						<!-- <td> <?php echo $v['mobile'] ?></td> -->
						<td> <?php echo mdate("%Y/%m/%d %H:%i:%s" ,$v['timeline']); ?> </td>
						<td>
							<div class="btn-group">
								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn btn-small' href=" <?php echo site_urlc( $this->router->class.'/edit/'.$v['id']).'&p='.$page ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
								<a class='btn btn-danger btn-small btn-del' data-id="<?php echo $v['id'] ?>" href="#"  title="<?php echo lang('del') ?>"> <i class="fa fa-times"></i> <?php // echo lang('del') ?></a>
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
	<a id="btn-audit" class='btn' href="#" data-audit='1'><?php echo lang('audit') ?></a>
	<a id="btn-audit" class='btn' href="#"  data-audit='0'>取消审核</a>
</div>
<?php echo $pages; ?>
<script>
	require(['adminer/js/ui'],function(ui){
		var dealer = {
			url_del: "<?php echo site_urlc('dealer/delete'); ?>"
			,url_audit: "<?php echo site_urlc('dealer/audit'); ?>"
			,url_flag: "<?php echo site_urlc('dealer/flag'); ?>"
			,url_sortid: "<?php echo site_urlc('dealer/sortid'); ?>"
			,url_sort_change: "<?php echo site_urlc('dealer/sort_change'); ?>"
			,url_copy: "<?php echo site_urlc('dealer/copypro'); ?>"
		};
		ui.fancybox_img();
	ui.btn_delete(dealer.url_del);		// 删除
	ui.btn_audit(dealer.url_audit);	// 审核
	ui.btn_flag(dealer.url_flag);		// 推荐
	ui.sortable(dealer.url_sortid);	// 排序  拖动排序和序号排序在firefox中有bug
	ui.sort_change(dealer.url_sort_change); // input 排序
	ui.btn_copy(dealer.url_copy);    // 复制
});
</script>