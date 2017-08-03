<div class="btn-group">
	<a href="<?php echo site_url('onlineservice/create'); ?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> 在线客服  </a>
</div>
<?php
$qq=get_config_site('site','qq');
?>
<div class="btn-group">
	<?php if($qq==1) {?>
	<a href="<?php echo site_url('onlineservice/open_lock'); ?>" class='btn btn-primary' title="点击禁用">开启中</a>
	<?php }else{ ?>
	<a href="<?php echo site_url('onlineservice/open_lock'); ?>" class='btn' title="点击开启">禁用中</a>
	<?php } ?>
</div>
<?php
$mqq=get_config_site('site_x','mqq');
?>

<a href="<?php echo site_url('onlineservice/change_model?value=1'); ?>" class='btn <?php if($mqq==1) {echo "btn-primary";}?>'>模版1</a>
<a href="<?php echo site_url('onlineservice/change_model?value=2'); ?>" class='btn <?php if($mqq==2) {echo "btn-primary";}?>'>模版2</a>
<a href="<?php echo site_url('onlineservice/change_model?value=3'); ?>" class='btn <?php if($mqq==3) {echo "btn-primary";}?>'>模版3</a>
<a href="<?php echo site_url('onlineservice/change_model?value=4'); ?>" class='btn <?php if($mqq==4) {echo "btn-primary";}?>'>模版4</a>

<span style="color:#F00">开启中,点击模版,前台切换展示形式！</span>
<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th> 排序</th>
					<th>图</th>
					<th> 名称 </th>

					<th class="span1"> <?php echo lang('action') ?> </th>
				</tr>
			</thead>
			<tbody  class="sort-list">
				<?php foreach ($list as $v):?>
					<tr  data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a> </td>
						<td>
							<?php if ($v['thumb']): ?>
								<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['title'] ?>">
									<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['title'];?>">
								</a>
							<?php endif ?>
						</td>
						<td> <?php echo $v['title'] ?></td>

						<td>
							<div class="btn-group">
								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
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
</div>

<?php echo $pages; ?>

<script>
	require(['adminer/js/ui'],function(ui){
		var onlineservice = {
			url_del:"<?php echo site_url('onlineservice/delete'); ?>"
			,url_show: "<?php echo site_url('onlineservice/show_ajax'); ?>"
			,url_audit: "<?php echo site_url('onlineservice/audit'); ?>"
			,url_sort: "<?php echo site_url('onlineservice/sortid'); ?>"
			,url_sort_change: "<?php echo site_url('onlineservice/sort_change'); ?>"
		};

		ui.fancybox_img();
	ui.btn_delete(onlineservice.url_del);	// 删除
	ui.btn_show(onlineservice.url_show); 	// 显隐
	ui.btn_audit(onlineservice.url_audit);	// 审核
	ui.sortable(onlineservice.url_sort);	// 排序
	ui.sort_change(onlineservice.url_sort_change); // input 排序
});
</script>
