
<?php if ($this->session->userdata('gid') == 1): ?>
<div class="btn-group">
	<a href="<?php echo site_url('manager/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>
<?php else: ?>
<div class="btn-group">
	<a href="<?php echo site_url('manager/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回</a>
	<a href="<?php echo site_url('manager/passwd'); ?>" class='btn btn-primary' > 修改密码 </a>
</div>
<?php endif; ?>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i> <?php echo $title; echo lang('edit'); ?> </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>
		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="uname">用户名</label>
				<div class="controls">
					<input type="text" id="uname" name="uname" value="<?php echo set_value('uname',$it['uname']) ?>">
					<span class="help-inline"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="nickname">显示名</label>
				<div class="controls">
					<input type="text" id="nickname" name="nickname" value="<?php echo set_value('nickname',$it['nickname']) ?>">
					<a href="#info" role="button" class="btn btn-info" data-toggle="modal">详细信息</a>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="gid">所属用户组</label>
				<div class="controls">
					<?php if ($this->session->userdata('gid') == 1): ?>
					<select name="gid" id="gid" class='bselect'>
						<?php
						foreach ($groups as $c){
							echo '<option value="'.$c['id'].'"'. set_switch('gid',$it['gid'],$c['id'],'selected="selected" class="option-select"') .'>';
							echo $c['title'];
							echo '</option>';
						}
						?>
					</select>

					<span class="help-inline"></span>

					<?php else: ?>
					<span class='label label-success'>
					<?php
						foreach ($groups as $c) {
							if ($c['id'] == $it['gid']) {
								echo $c['title'];
							}
						}
					?>
					</span>
					<?php endif ?>
				</div>
			</div>

			<?php //TODO:权限禁用  ?>

			<?php if ($this->session->userdata('gid') == 1): ?>
			<div class="control-group">
				<label class="control-label" for="status">用户状态</label>
				<div class="controls">
					<div class='btn-group btn-switch'>
						<a href="#" data-value="1" class="btn <?php echo set_switch('status',1,$it['status'],'btn-primary') ?>"> 正常 </a>
						<a href="#" data-value="0" class="btn <?php echo set_switch('status',0,$it['status'],'btn-primary') ?>"> 禁用</a>
					</div>
					<input type="hidden" id="status" name="status" value="<?php echo set_value('status',$it['status']) ?>">
				</div>
			</div>
			<?php endif ?>

			<div class="control-group">
				<label class="control-label" for="email">邮箱</label>
				<div class="controls">
					<input type="text" id="email" name="email" value="<?php echo set_value('email',$it['email']) ?>">
					<span class="help-inline">可以帮助用户找回密码</span>
				</div>
			</div>

			<div class="control-group">
				<label for="" class="control-label">登录IP:</label>
				<div class="controls">
					<?php echo $it['login_ip'];?>
				</div>
			</div>

			<!-- INFO -->
			<div id="info" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h3><i class="fa fa-info-circle"></i>详细信息</h3>
				</div>
				<div class="modal-body seamless">
					<div class="control-group">
						<label class="control-label" for="tel">电话</label>
						<div class="controls">
							<input type="text" id="tel" name="tel" value="<?php echo set_value('tel',$it['tel']) ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="phone">手机</label>
						<div class="controls">
							<input type="text" id="phone" name="phone" value="<?php echo set_value('phone',$it['phone']) ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="addr">地址</label>
						<div class="controls">
							<input type="text" id="addr" name="addr" value="<?php echo set_value('addr',$it['addr']) ?>">
							<span class="help-inline"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
				</div>
			</div> <!-- end modal -->
		</div> <!-- end boxed body -->

		<div class="boxed-footer">
			<input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>

<script type="text/javascript" charset="utf-8">
require(['tools'],function(tools){

var rules = {
	uname: {
		required:true,
		minlength:3,
		maxlength:100
	},
	tel:{
		number: true
	},
	phone:{
		number: true
	}
};
var messages = {
	uname: {
		required : "你不能不输入 用户名！",
		minlength: jQuery.format("输入字符数不的小于 {0} ！"),
		maxlength: jQuery.format("输入字符数不的大于 {0} ！")
	},
	tel:{
		number: "必须输入正确的手机号码"
	},
	phone:{
		number: "输入正确的电话号码"
	}

};
tools.make_validate('frm-create',rules,messages);
});
</script>
