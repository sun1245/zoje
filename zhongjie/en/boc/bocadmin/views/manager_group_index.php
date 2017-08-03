<div class="btn-group">
	<a href="<?php echo site_url('manager_group/create'); ?>" class='btn btn-primary' > <i class="fa fa-plus"></i> <?php echo $title ?> </a>
</div>

<p></p>

<div class="row-fluid">
	<div class="span6">

		<div class="boxed">
			<div class="boxed-inner seamless">
				<h3 style="padding-left:8px;">
					<input id='selectbox-all' type="checkbox" >
					&nbsp;&nbsp;<i class="fa fa-group"></i> 用户组
				</h3>
				<table class="table table-striped table-hover select-list">
					<tbody>
						<?php foreach ($list as $v):?>
							<?php if ($v['id'] !=1 ): ?>
							<tr>
								<td class='width-small'><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
								<td> <?php echo $v['title'] ?> </td>
								<td style="text-align:right;">
									<div class="btn-group">
										<a class='btn btn-small' title="<?php echo lang('edit') ?>" href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> "> <i class="fa fa-pencil"></i> </a>
										<a class='btn btn-danger btn-small btn-del' title="<?php echo lang('del') ?>" data-id="<?php echo $v['id'] ?>" href="#"> <i class="fa fa-times"></i> </a>
									</div>
								</td>
							</tr>
							<?php endif ?>
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

	</div>
</div>

<?php echo $pages; ?>

<script>
require(['adminer/js/ui'],function(ui){

	var managerg = {
		del: "<?php echo site_url('manager_group/delete'); ?>"
	};

	ui.btn_delete(managerg.del);		// 删除
});
</script>
