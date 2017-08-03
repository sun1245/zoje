
<div class="btn-group">
	<a href="<?php echo site_url('msgs/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> <i class="fa fa-plus"></i> <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

		<div class="boxed-inner seamless">

			<div class="control-group">
				<label class="control-label" for="toer">发送给</label>
				<div class="controls">
					<select name="toer" id="toer" class='bselect'>
						<?php
						foreach ($users as $c){
							echo '<option value="'.$c['id'].'"'. set_selected('toer',$c['id']) .'>';
							echo $c['nickname'];
							echo '</option>';
						}
						?>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="title"> 标题</label>
				<div class="controls">
					<input type="text" name="title" value="<?php echo set_value('title') ?>" id="title" x-webkit-speech>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="msg"> 消息 </label>
				<div class="controls">
					<input type="text" name="msg" value="<?php echo set_value('msg') ?>" id="msg">
				</div>
			</div>

			<div class="control-group">
				<label for="level" class="control-label">级别:</label>
				<div class="controls">
						<select name="level" id="level" class='bselect'>
						<?php
						foreach ($this->config->item('msgs_level') as $k => $v){
							echo '<option value="'.$k.'"'. set_selected('level',$k) .'>';
							echo $v;
							echo '</option>';
						}
						?>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>


		</div>

		<div class="boxed-footer">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>

	</form>
</div>

<script type="text/javascript" charset="utf-8">

require(['tools'],function(tools){
	var rules = {
		title: {
			required:true,
			minlength:3
		},
		msg: {
			required:true,
			minlength:6
		}
	};
	tools.make_validate('frm-create',rules);
});
</script>
