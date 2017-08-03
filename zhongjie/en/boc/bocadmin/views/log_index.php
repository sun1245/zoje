
<p></p>

<?php include_once 'inc_ui_limit.php';?>

<h3>日志记录</h3>

<p class="clearfix"></p>

<div class="boxed">
<div class="boxed-inner seamless">
	<form action="<?php echo site_url('log/search'); ?>" method="GET" class="form-horizontal">


	<div class="control-group">
		<label for="title" class="control-label">模型:</label>
		<div class="controls">
			<?php
				$mo = $this->model->get_all(false,"controller as value,title",false,'modules');
				array_unshift($mo,array('value'=>0,'title'=>"所有"));
				$mo = array_merge($mo,array(
					array('value'=>"columns",'title'=>"栏目操作"),
					array('value'=>"ctypes",'title'=>"类型操作"),
				));
				echo ui_btn_select('co',set_value("co"),$mo);
			?>
			<span class="help-inline"></span>
		</div>
	</div>
	<?php if ($this->session->userdata('gid') == 1) { ?>
	<div class="control-group">
		<label class="control-label" for="status"> 用户:</label>
		<div class="controls">
			<?php
				$users = $this->mmger->get_all(false,"id,nickname as title");
				array_unshift($users,array('id'=>0,'title'=>"所有"));
				echo ui_btn_select('mid',set_value("mid"),$users);
			?>
			<span class="help-inline"></span>
		</div>
	</div>
	<?php } ?>

	<div class="control-group">
		<label for="title" class="control-label">时间区间:</label>
		<div class="controls">
			<div class="input-append date timepicker" id="datetimepicker1">
				<input type="text" value="<?php echo date("Y-m-d H:i:s",set_value('timeline',now()-259200)); ?>" id="ts" name="ts" data-date-format="yyyy-mm-dd hh:ii:ss">
				<span class="add-on"><i class="icon-th"></i></span>
			</div>

			<div class="input-append date timepicker" id="datetimepicker2">
				<input type="text" value="<?php echo date("Y-m-d H:i:s",set_value('timeline',now())); ?>" id="te" name="te" data-date-format="yyyy-mm-dd hh:ii:ss">
				<span class="add-on"><i class="icon-th"></i></span>
			</div>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
		<input class="btn" type="submit" value="检索">
		</div>
	</div>
	</form>
</div>
</div>

<br>

<div class="boxed">
	<div class="boxed-inner seamless">
		<table class="table table-striped table-hover select-list">
			<thead>
				<tr>
					<th> URL </th>
					<th> 类别 </th>
					<th> 消息 </th>
					<th> 用户 </th>
					<th> IP </th>
					<th style="width:11em;"> 时间 </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v):?>
					<tr class="js-get-one" data-id="<?php echo $v['id'] ?>">
						<td> <?php msubstr($v['url'],0,38); ?></td>
						<td> <?php echo $v['category'] ?></td>
						<td title="<?php echo $v['message']; ?>"> <?php echo msubstr($v['message'],0,28); ?></td>
						<td> <?php
						if (!$v['name']) {
							echo $v['mid'];
						}else{
							echo $v['name'] ;
						}
						?> </td>
						<td> <?php echo $v['ip'] ?> </td>
						<td> <?php echo  date("Y/m/d H:i:s",$v['timeline']); ?> </td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<?php echo $pages; ?>

<script id="tpl-loginfo" type="text/html">
<dl class="dl-horizontal">
	<dt> 类型 		</dt><dd> {% =it.category %} </dd>
	<dt> 控制器 		</dt><dd> {% =it.controller %} </dd>
	<dt> 消息 		</dt><dd> {% =it.message %} </dd>
	<dt> 用户ID 		</dt><dd> {% =it.mid %} </dd>
	<dt> URL 		</dt><dd> {% =it.url %} </dd>
	<dt> 时间 		</dt><dd> {% =it.timeline %} </dd>
</dl>
</script>

<script>
require(['jquery','template','bootstrap-datetimepicker.zh'],function($,template){

	$('#datetimepicker1').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true,todayBtn:true});
	$('#datetimepicker2').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true,todayBtn:true});

	$('.js-get-one').on('click',function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: ADMINER_URL + 'log/get_ajax',
			type: 'get',
			dataType: 'json',
			data: {id:id}
		})
		.done(function(data) {
			var tpl = template.render('tpl-loginfo', data);
			bootbox.dialog({
				title:'<i class="fa fa-info-circle"></i> '+data.it.id+' 详情'
				,message:tpl
			});
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});
});
</script>
