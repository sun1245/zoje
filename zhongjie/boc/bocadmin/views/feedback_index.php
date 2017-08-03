<!-- <b><a href='<?php echo site_url('feedback'.'?type_id=1') ?>'>分类1</a></b>&nbsp;&nbsp;
<b><a href='<?php echo site_url('feedback'.'?type_id=2') ?>'>分类2</a></b>&nbsp;&nbsp; -->

<?php include_once 'inc_ui_limit.php'; ?>
<div class="clearfix"></div>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>用户名</th>
					<th>手机</th>
					<th>标题</th>
					<th>邮箱</th>
					<th>操作</th>
					<th>时间</th>
				</tr>
			</thead>
			<tbody class="sort-list">
				<?php foreach ($list as $v):?>
					<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td> <?php echo $v['username'] ?> </td>
						<td> <?php echo $v['telphone'] ?> </td>
						<td> <?php echo $v['title'] ?> </td>
						<td> <?php echo $v['email'] ?> </td>
						<td> <?php if(!empty($v['answer'])) {echo "已回复";}else{echo "未回复";}?> </td>
						<td> <?php echo  date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td style="text-align:right;">
							<div class="btn-group">
								<a class='btn btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-comments-o"></i></a>
								<a class='btn btn-danger btn-small btn-del' href="#" data-id="<?php echo $v['id'] ?>" title=" <?php echo lang('del') ?>"> <i class="fa fa-times"></i></a>
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
		article = {
			url_del: "<?php echo site_url('feedback/delete'); ?>"
			,url_sortid: "<?php echo site_url('feedback/sortid'); ?>"
		};

	ui.btn_delete(article.url_del);		// 删除
	ui.sortable(article.url_sortid);	// 排序
});
</script>
