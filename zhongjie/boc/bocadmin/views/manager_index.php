
<?php // 用户组为 1 显示列表
if ($this->session->userdata('gid') == 1):
?>

<?php include_once 'inc_ui_limit.php'; ?>

<div class="btn-group">
	<a href="<?php echo site_url('manager/create'); ?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> 用户 </a>
</div>

<p></p>

<div class="boxed">
	<div class="boxed-inner seamless">
<table class="table table-striped table-hover select-list">
	<thead>
		<tr>
			<th class="width-small"><input id='selectbox-all' type="checkbox" > </th>
			<th class="span1"> 帐号</th>
			<th> 名称</th>
			<th> 用户组</th>
			<th class="span1" title="今日登录">登录</th>
			<th >最近登录时间</th>
			<?php if ($this->session->userdata('gid') == 1) { ?>
			<th class="span2"> <?php echo lang('action') ?> </th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $v):?>
		<?php if (($this->session->userdata('mid') != 1 and $v['id'] !=1) or $this->session->userdata('mid') == 1 ): ?>
		<tr>
			<td><input class="select-it" type="checkbox" value="<?php echo $v['id']; ?>" ></td>
			<td> <?php echo $v['uname'] ?> </td>
			<td> <?php echo $v['nickname'] ?></td>
			<td> <?php echo $v['groupname'] ?></td>
			<td> <?php echo $v['login_today'] ?></td>
			<td style="text-align:right;"> <?php echo mdate("%Y/%m/%d %h:%i:%s" ,$v['login_time']) ?></td>
			<?php if ($this->session->userdata('gid') == 1) { ?>
			<td style="text-align:right;">
				<div class="btn-group">
					<a class='btn btn-small' href=" <?php echo site_url( $this->router->class.'/edit/'.$v['id']) ?> "  title="<?php echo lang('edit') ?>"  > <i class="fa fa-pencil"></i> <?php // echo lang('edit') ?></a>
					<!-- <a class='btn btn-info btn-small' data-toggle="modal" href="<?php echo site_url( $this->router->class.'/passwd/'.$v['id']) ?>"> <i class="fa fa-times-sign icon-white"></i> 密码修改 </a> -->
					<a class='btn btn-small ajax-passwd' data-toggle="modal" data-rel="<?php echo $v['id'] ?>" href="#passwd" title="密码修改"> <i class="fa fa-key"></i> </a>
					<?php if ($this->session->userdata('mid') != $v['id']): ?>
					<a class='btn btn-danger btn-small btn-del' href="#" data-id="<?php echo $v['id'] ?>" title="<?php echo lang('del') ?>" > <i class="fa fa-times"></i> <?php // echo lang('del') ?></a>
					<?php endif ?>
				</div>
			</td>
			<?php } ?>
		</tr>
		<?php endif ?>
		<?php endforeach;?>
	</tbody>
</table>
	</div>
</div>

<div class="btn-group hide">
	<a id='select-all' class='btn' href="#"> <i class=""></i> <?php echo lang('select_all') ?> </a>
	<a id='unselect-all' class='btn hide' href="#"> <i class=""></i> <?php echo lang('unselect') ?> </a>
	<a id="btn-del" class='btn btn-danger' href="#"> <i class="fa fa-times"></i> <?php echo lang('del') ?> </a>
</div>

<?php echo $pages; ?>

<!-- 密码修改 -->
<div class="modal hide fade modal-ajax" id="passwd">
<?php echo form_open('manager/passwd/',array("class"=>"form-horizontal","id"=>"frm-pwd")); ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
		<h3> <i class="fa fa-key"></i> 修改密码</h3>
	</div>

	<div class="modal-body seamless">

		<div class="control-group">
			<label class="control-label" for="pwdo">原密码</label>
			<div class="controls">
				<input type="password" id="pwdo" name="pwdo" value="<?php echo set_value('pwdo') ?>">
				<span class="help-inline">修改普通用户的密码，不用填入原始密码即可修改。</span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="pwd">密码</label>
			<div class="controls">
				<input type="password" id="pwd" name="pwd" value="<?php echo set_value('pwd') ?>">
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="pwdre">重复密码</label>
			<div class="controls">
				<input type="password" id="pwdre" name="pwdre" value="<?php echo set_value('pwdre') ?>">
				<span class="help-inline"></span>
			</div>
		</div>
		<div id="ajax-msg" class="msg"></div>
	</div>

	<div class="modal-footer">
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
	</div>
</form>
</div>

<?php echo static_file('adminer/js/manager_passwd.js') ?>

<?php // 普通帐号显示信息
else:
?>
	<style type="text/css">
		.dl-horizontal dt{
			width: 100px;
		}
		.dl-horizontal dd {
			margin-left: 100px;
		}
	</style>
	<?php
	$user = $this->mmger->get_one($this->session->userdata('mid'));
	$datestring = "%Y/%m/%d - %H:%i:%s";
	?>
	<div class="boxed span6">
		<div class="boxed-inner">
			<h3>帐号信息</h3>
			<dl class="dl-horizontal">
				<dt> 昵称：</dt>
				<dd> <?php echo $user['nickname']; ?> </dd>
				<dt> 帐号：</dt>
				<dd> <?php echo $user['uname']; ?> </dd>
				<dt> 登录IP： </dt>
				<dd> <?php echo $user['login_ip'];?>  &nbsp;</dd>
				<dt> 用户组：</dt>
				<dd>
					<?php
					foreach ($groups as $c) {
						if ($c['id'] == $this->session->userdata('gid')) {
							echo $c['title'];
						}
					}
					?>
				</dd>

				<dt>Email：</dt>
				<dd> <?php echo $user['email']; ?>  &nbsp;</dd>

				<dt>电话：</dt>
				<dd> <?php echo $user['tel']; ?>  &nbsp;</dd>

				<dt>手机：</dt>
				<dd> <?php echo $user['phone']; ?>  &nbsp;</dd>

				<dt>地址：</dt>
				<dd> <?php echo $user['addr']; ?>  &nbsp;</dd>

				<dt>登录时间：</dt>
				<dd><?php echo mdate($datestring, $user['login_time']) ?>  &nbsp;</dd>
				<dt>最后活动时间：</dt>
				<dd><?php echo mdate($datestring, $this->session->userdata('last_activity')) ?> </dd>
			</dl>

			<div style="padding-left:50px;">
			<p>
				<div class="btn-group">
					<a href="<?php echo site_url('manager/passwd'); ?>" class='btn btn-primary' > <i class="icon-pencil icon-white"></i> 修改密码 </a>
				</div>
				<div class="btn-group">
					<a href="<?php echo site_url('manager/edit').'/'.$this->session->userdata('mid'); ?>" class='btn btn-primary' > <i class="icon-pencil icon-white"></i>  修改帐号 </a>
				</div>
			</p>
			</div>
		</div>
	</div>
<?php endif ?>

<script>
require(['adminer/js/ui'],function(ui){

	manager = {
		del: "<?php echo site_url('manager/delete'); ?>"
	};

	ui.btn_delete(manager.del);		// 删除
});
</script>
