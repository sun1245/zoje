<div class="btn-group">
	<a href="<?php echo site_url('msgs/create'); ?>" class='btn btn-primary' >发送信息 <i class="fa fa-envelope"></i> </a>
</div>
<p></p>

<?php 
$lv = $this->config->item('msgs_level');
?>

<div class="alert alert-info">
	TODO: 头部显示信息数量 <br>
	提示最近一天内信息。 
</div>

<?php if (!$list): ?>

<div class="alert alert-info">
	没有任何消息。<br>
	你可以自己<a href="<?php echo site_url('msgs/create'); ?>" > 发送信息 </a>给其他用户。
</div>

<?php else: ?>
	
<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
					<th> <?php echo lang('title') ?></th>
					<th> 标记已读  </th>
					<th> 来自 </th> 
					<th style="width:135px;"> 时间 </th> 
					<th class="span2"> <?php echo lang('action') ?> </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v):?>
				<?php if ($v['markread']): ?>
				<tr style="backgroud-color:gray;"></tr>
				<?php else: ?>
				<tr class="text-<?php echo $lv[$v['level']] ?> " >
				<?php endif ?>
					<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
					<td> <?php echo $v['title'] ?> </td>
					<td> <?php echo $v['markread'] ?> to btn </td>
					<td> <?php echo $v['byname'] ?> to btn </td>
					<td> <?php echo  date("Y/m/d H:i:s",$v['timeline']); ?> </td>
					<td>
						<div class="btn-group">
							<a class='btn btn-small btn-markread' data-id="<?php echo $v['id'] ?>" href="#" title="标记已读"> <i class="icon-flag"></i> 已读 </a>
							<a class='btn btn-danger btn-small btn-del' href="#"data-id="<?php echo $v['id'] ?>" title=" <?php echo lang('del') ?>"> <i class="icon-trash icon-white"></i> <?php //echo lang('del') ?></a>
						</div>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<div class="btn-group">
	<a id='select-all' class='btn' href="#"> <i class="icon-check"></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn' href="#"> <i class="fa fa-times-circle"></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-markread" class='btn btn-info' href="#"> <i class="icon-flag icon-white"></i> 标记已读 </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="icon-trash icon-white"></i> <?php echo lang('del') ?> </a>
</div>

<?php echo $pages; ?>

<script>

</script>

<?php endif // end list ?>
