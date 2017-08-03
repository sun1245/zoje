<?php
$username=$this->input->get('username');
$email=$this->input->get('email');
?>
<div class="btn-group">
	<a href="<?php echo site_url('users/create')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> 会员中心 </a>
</div>

<div class="btn-group">
	<a href="<?php echo site_url('import')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> 会员导入 </a>
</div>

<div class="btn-group">
	<a href="<?php echo site_url('insert/exl')?>" class='btn btn-primary'> <i class="fa fa-plus"></i> 会员导出 </a>
</div>
<div class="clearfix"><p></p></div>
<div class="form-inline">
	<form action="<?php echo site_url('users/search'); ?>" method="GET">
		<input type="text" name='username' value="<?php echo $username ?>" placeholder="用户名" >
		<input type="text" name='email' value="<?php echo $email ?>" placeholder="邮箱" >
		<input class="btn" type="submit" value="查 询">
	</form>
</div>
<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">

		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th>头像</th>
					<th>排序</th>
					<th>用户名</th>
					<th>邮箱</th>
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
								<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['username'] ?>">
									<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['username'];?>">
								</a>
							<?php endif ?>
						</td>
						<td> <a title='越大越前'><input type="text" class="sortid" value="<?php echo $v['sort_id']?>" data-id="<?php echo $v['id'] ?>"></a> </td>
						<td><?php echo msubstr($v['username'],0,20); ?></td>
						<td><?php echo msubstr($v['email'],0,20); ?></td>
						<td> <?php echo date("Y/m/d H:i:s",$v['timeline']); ?> </td>
						<td>
							<div class="btn-group">

								<?php include 'inc_ui_audit.php'; ?>
								<a class='btn  btn-danger btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> " title="<?php echo lang('edit') ?>"> <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
								<a class='btn btn-small btn-del' data-id="<?php echo $v['id'] ?>" href="#"  title="<?php echo lang('del') ?>"> <i class="fa fa-times"></i></a>
								<a class='btn btn-small' target="_blank" href=" <?php echo site_url( $this->router->class.'/excel/'.$v['id']) ?> " title="导出XLS"> 导出XLS</a>
								<a class='btn btn-small' target="_blank" href=" <?php echo site_url( $this->router->class.'/word/'.$v['id']) ?> " title="导出word"> 导出word</a>
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
		var users = {
			url_del: "<?php echo site_url('users/delete'); ?>"
			,url_audit: "<?php echo site_url('users/audit'); ?>"
			,url_flag: "<?php echo site_url('users/flag'); ?>"
			,url_sortid: "<?php echo site_url('users/sortid'); ?>"
			,url_sort_change: "<?php echo site_url('users/sort_change'); ?>"
		};
		ui.fancybox_img();
	ui.btn_delete(users.url_del);		// 删除
	ui.btn_audit(users.url_audit);	// 审核
	ui.btn_flag(users.url_flag);		// 推荐
	ui.sortable(users.url_sortid);	// 排序  拖动排序和序号排序在firefox中有bug
	ui.sort_change(users.url_sort_change); // input 排序
});
</script>
