<div class="btn-group">
	<a href="<?php echo site_url('adminmodels/create?mid='.$mid)?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> 招聘模块  </a>
</div>

<div class="clearfix"><p></p></div>

<div class="boxed">
	<div class="boxed-inner seamless">
		<?php echo form_open(site_url('jobmodels/post_data'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>
		<input type="hidden" name="mid" value="2">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th> 图片 </th>
					<th> 标题 </th>
					<th> 模版标识 </th>
				</tr>
			</thead>
			<tbody  class="sort-list">
				<?php foreach ($list as $v):?>
					<tr  data-id="<?php echo $v['id'] ?>" data-sort="<?php echo $v['sort_id'] ?>">

						<td>
							<input type="radio" name="type_id" value="<?php echo $v['type_id'] ?>" <?php if(!empty($inforow)) { if($inforow['type_id']==$v['type_id']){echo "checked='checked'";} }?>>
							<?php if ($v['thumb']): ?>
								<a class="fancybox-img" href="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" title="<?php echo $v['title'] ?>">
									<img src="<?php echo UPLOAD_URL.$v['thumb'] ?>" alt="<?php echo $v['title'];?>">
								</a>
							<?php endif ?>
						</td>
						<td> <?php echo $v['title'] ?></td>
						<td> <?php echo $v['type_id'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<div class="clearfix"><p></p></div>
		<div class="clearfix" align='center'><p><input type="submit" name="" value="确定" class="btn btn-danger"></p></div>

	</form>
</div>
</div>
<script>
	require(['adminer/js/ui'],function(ui){
		ui.fancybox_img();
	});
</script>




