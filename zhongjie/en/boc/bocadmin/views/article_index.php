<div class="btn-group">
	<a href="<?php echo site_urlc('article/create')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> <?php echo $title; ?> </a>
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
					<th>标题</th><!-- 
					<?php if (!$this->ccid): ?>
						<th> 伪子栏目 </th>
					<?php endif ?> -->
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
						<td > <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a> </td>
						<td> <?php echo $v['title'] ?> </td><!-- 
						<?php if (!$this->ccid): ?>
							<td>
								<a href="<?php echo site_url('article/index?c=5&cc='.$v['id']) ?>"> 伪子栏目文章 </a>
								| <a href="<?php echo site_url('links/index?c=5&cc='.$v['id']) ?>"> 伪子栏目链接 </a>
								| <a href="<?php echo site_url('lists/index?c=5&cc='.$v['id']) ?>"> 伪子栏目清单 </a>
								| <a href="<?php echo site_url('gallery/index?c=5&cc='.$v['id']) ?>"> 伪子栏目画廊 </a>
							</td>
						<?php endif ?> -->

						<td> <?php echo date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td>
							<div class="btn-group">
								<?php include 'inc_ui_flag.php'; ?>
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
		var article = {
			url_del: "<?php echo site_urlc('article/delete'); ?>"
			,url_audit: "<?php echo site_urlc('article/audit'); ?>"
			,url_flag: "<?php echo site_urlc('article/flag'); ?>"
			,url_sortid: "<?php echo site_urlc('article/sortid'); ?>"
			,url_sort_change: "<?php echo site_urlc('article/sort_change'); ?>"
			,url_copy: "<?php echo site_urlc('article/copypro'); ?>"
		};
		ui.fancybox_img();
	ui.btn_delete(article.url_del);		// 删除
	ui.btn_audit(article.url_audit);	// 审核
	ui.btn_flag(article.url_flag);		// 推荐
	ui.sortable(article.url_sortid);	// 排序  拖动排序和序号排序在firefox中有bug
	ui.sort_change(article.url_sort_change); // input 排序
	ui.btn_copy(article.url_copy);    // 复制
});
</script>
