
<div class="btn-group">
	<a href="<?php echo site_url($this->router->class.'/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<p></p>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-plus"></i> <?php echo lang('create').$title; ?>  </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>
		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="title">组名称</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title') ?>">
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group"  style="background:#fff;padding: 5px 20px;">
				<div class="seamless">
					<h3> <input type="checkbox" class="checkall" />  管理权限 </h3>
					<ul class="boxed-list">
						<?php 
						foreach ($pur as $k => $v) {
							$str = "<li>";
							$str .= '<input type="checkbox" class="checkline" /> <span  class="depth0">';
							// $str .= $k;
							$str .= '</span>';
							$str .= '<div class="btn-group pull-right form-inline">';
							foreach ($v as $m) {
								$checked = false;
								$str.=' <label class="checkbox"> '.form_checkbox('purview[]', $m['uri']).$m['title'].'</label>';
							}
							$str .= '</div>';
							$str .= '</li>';
							echo $str;
						}
						?>
					</ul>
					<h3> <input type="checkbox" class="checkall" /> 栏目权限 </h3>
					<ul class="boxed-list">
						<?php echo list_cols($cols);?>
					</ul>
				</div>
			</div>

		</div> <!-- end widget body -->

		<div class="boxed-footer">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger"> 
		</div>
	</form>
</div>

<style>
.form-inline {
	background: #fff;
	padding:3px 0 0;
}
.form-inline .checkbox{
	margin-right:5px;
	line-height: 15px;
}
label.checkbox{
	display: inline-block;
	min-width: 98px;
}
</style>

<?php echo static_file('adminer/js/manager_group.js'); ?>
