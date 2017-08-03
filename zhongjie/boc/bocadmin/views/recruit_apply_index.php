
<?php include_once 'inc_ui_limit.php'; ?>

<div class="clearfix"></div>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>招聘类型</th>
					<th>应聘岗位</th>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
					<th>联系电话</th>
					<th>文化程度</th>
					<th>专业</th>
					<th>时间</th>
				</tr>
			</thead>
			<tbody class="sort-list">
				<?php foreach ($list as $v):?>
					<tr data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">
						<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
						<td><?php echo tag_columns($v['recruit_id']); ?></td>
						<td> <?php echo $v['position'] ?> </td>
						<td> <?php echo $v['name'] ?> </td>
						<td> <?php echo $v['gender'] ?> </td>
						<td> <?php echo $v['age'] ?> </td>
						<td> <?php echo $v['tel'] ?> </td>
						<td> <?php echo $v['edu'] ?> </td>
						<td> <?php echo $v['major'] ?> </td>
						<td> <?php echo  date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td style="text-align:right;">
							<div class="btn-group">
								<a class='btn btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> " title="查看"> <i class="fa fa-eye"></i></a>
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

		var article = {
			url_del: "<?php echo site_url('recruit_apply/delete'); ?>"
			,url_sortid: "<?php echo site_url('recruit_apply/sortid'); ?>"
		};

	ui.btn_delete(article.url_del);		// 删除
	ui.sortable(article.url_sortid);	// 排序
});
</script>
