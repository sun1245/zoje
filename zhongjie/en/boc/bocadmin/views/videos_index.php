<?php
$cid=$this->cid;
?>
<div class="btn-group">
	<a href="<?php echo site_urlc('videos/create')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> <?php echo $title; ?> </a>
</div>

<?php include_once 'inc_modules_path.php'; ?>
<?php include_once 'inc_ctype_index.php'; ?>

<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">

		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>图</th>
					<th>排序</th>
					<th>标题</th>
					<th>时间</th>
					<th class="span1">操作</th>
				</tr>
			</thead>
			<tbody class="sort-list">
				<?php foreach ($list as $v):?>
					<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td>
							<?php if ($v['thumb']): ?>
								<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['title'] ?>">
									<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['title'];?>">
								</a>
							<?php endif ?>
						</td>
						<td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a></td>
						<td>  <?php echo $v['title'] ?></td>
						<td> <?php echo date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td>
							<div class="btn-group">
								<?php //include 'inc_ui_flag.php'; ?>
								<?php if(ENVIRONMENT=="development"){ ?>
								<a class='btn  btn-small btn-ajax-copy' data-id="<?php echo $v['id'] ?>" href="#"  title="复制"> 复制</a>
								<?php } ?>
								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn btn-small' href=" <?php echo site_urlc( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
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
		var videos = {
			url_del: "<?php echo site_urlc('videos/delete'); ?>"
			,url_audit: "<?php echo site_urlc('videos/audit'); ?>"
			,url_flag: "<?php echo site_urlc('videos/flag'); ?>"
			,url_sortid: "<?php echo site_urlc('videos/sortid'); ?>"
			,url_sort_change: "<?php echo site_urlc('videos/sort_change'); ?>"
			,url_copy: "<?php echo site_urlc('videos/copypro'); ?>"
		};
		ui.fancybox_img();
	ui.btn_delete(videos.url_del);		// 删除
	ui.btn_audit(videos.url_audit);	// 审核
	ui.btn_flag(videos.url_flag);		// 推荐
	ui.sortable(videos.url_sortid);	// 排序  拖动排序和序号排序在firefox中有bug
	ui.sort_change(videos.url_sort_change); // input 排序
	ui.btn_copy(videos.url_copy);    // 热门审核
});
</script>
