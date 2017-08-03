
<div class="btn-group">
	<a href="<?php echo site_url('manager/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <?php echo $title; ?>追加 </h3>

	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>
		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="uname">用户名</label>
				<div class="controls">
					<input type="text" id="uname" name="uname" value="<?php echo set_value('uname') ?>">
					<span class="help-inline"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="nickname">显示名</label>
				<div class="controls">
					<input type="text" id="nickname" name="nickname" value="<?php echo set_value('nickname') ?>">
					<a href="#info" role="button" class="btn btn-info" data-toggle="modal">详细信息</a>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="gid">所属用户组</label>
				<div class="controls">
					<select name="gid" id="gid" class='bselect'>
						<?php
						foreach ($groups as $c){
							//echo '<option value="'.$c['id'].'"'. check_switch(set_value('gid',2),$c['id'],'selected="selected"') .'>';
							echo '<option value="'.$c['id'].'"'. set_selected('gid',2,$c['id']) .'>';
							echo $c['title'];
							echo '</option>';
						}
						?>
					</select>
					<span class="help-inline"></span>
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

<?php //TODO:权限禁用  ?>

			<div class="control-group">
				<label class="control-label" for="status">用户状态</label>
				<div class="controls">
					<div class='btn-group btn-switch'>
						<a href="#" data-value="1" class="btn <?php echo set_switch('status',1,1,'btn-primary') ?>"> 正常 </a>
						<a href="#" data-value="0" class="btn <?php echo set_switch('status',0,1,'btn-primary') ?>"> 禁用</a>
					</div>
					<input type="hidden" id="status" name="status" value="<?php echo set_value('status',1) ?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="email">邮箱</label>
				<div class="controls">
					<input type="text" id="email" name="email" value="<?php echo set_value('email') ?>">
					<span class="help-inline">可以帮助用户找回密码</span>
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
							<input type="text" id="tel" name="tel" value="<?php echo set_value('tel') ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="phone">手机</label>
						<div class="controls">
							<input type="text" id="phone" name="phone" value="<?php echo set_value('phone') ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="addr">地址</label>
						<div class="controls">
							<input type="text" id="addr" name="addr" value="<?php echo set_value('addr') ?>">
							<span class="help-inline"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
				</div>
			</div> <!-- end modal -->
		</div> <!-- end widget body -->

		<div class="boxed-footer">
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
		pwd: {
			required:true,
			minlength:6,
			maxlength:30
		},
		pwdre: {
			required:true,
			minlength:6,
			maxlength:30,
			equalTo:"#pwd"
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
		pwd: {
			required : "你不能不输入 密码！",
			minlength: jQuery.format("输入字符数不的小于 {0}！"),
			maxlength: jQuery.format("输入字符数不的大于 {0}！")
		},
		pwdre: {
			required : "密码必须验证！",
			minlength: jQuery.format("输入字符数不的小于 {0}！"),
			maxlength: jQuery.format("输入字符数不的大于 {0}！"),
			equalTo: "密码验证要求，必须输入一致的密码"
		},
		tel:{
			number:"输入必须为数字"
		},
		phone:{
			number:"输入必须为数字"
		}
	}
	tools.make_validate('frm-create',rules,messages);
});

</script>
