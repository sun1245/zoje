<?php
$mtype_id=0;
$where=array('mid'=>2);
$this->db->select('id,type_id');
$minfo=$this->db->get_where("webmodels",$where,1)->row_array();
if(!empty($minfo)){
	$mtype_id=$minfo['type_id'];
}
?>
<div class="btn-group">
	<a href="<?php echo site_urlc('recruit/index')?>" class='btn'> <i class="icon-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> <i class="fa fa-pencil"></i> <?php echo lang('edit'); ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span> </h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-recruit")); ?>

		<div class="boxed-inner seamless">

			<div class="control-group">
				<label class="control-label" for="title"> 招聘岗位 </label>
				<div class="controls">
						<input type="text" name="title" value="<?php echo set_value('title',$it['title']) ?>" id="title" x-webkit-speech>
				</div>
			</div><!-- ctype -->
			<?php if ($ctype = list_coltypes($this->cid)) { ?>
			<div class="control-group">
				<label class="control-label" for="status"> 所属分类:</label>
				<div class="controls">
					<?php
					echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctype);
					?>
					<span class="help-inline"></span>
				</div>
			</div>
			<?php } ?>

		<?php if($mtype_id==2) {?>
		<div class="control-group">
			<label class="control-label" for="person"> 联系人 </label>
			<div class="controls">
				<input type="text" name="person" value="<?php echo set_value('person',$it['person']) ?>" id="person">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="email"> 邮箱 </label>
			<div class="controls">
				<input type="text" name="email" value="<?php echo set_value('email',$it['email']) ?>" id="email">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="telphone"> 电话 </label>
			<div class="controls">
				<input type="text" name="telphone" value="<?php echo set_value('telphone',$it['telphone']) ?>" id="telphone">
			</div>
		</div>
		<?php } ?>

			<div class="control-group">
				<label class="control-label" for="timeline"> 发布日期 </label>
				<div class="controls">
					<input type="text" value="<?php echo date('Y-m-d',set_value('timeline',$it['timeline'])); ?>" readonly class="input-datepicker" name='timeline' x-webkit-speech>
					 <!-- 至
					<input type="text" value="<?php echo date('Y-m-d',set_value('expiretime',$it['expiretime'])); ?>" readonly class="input-datepicker" name='expiretime' x-webkit-speech> -->
				</div>
			</div>

			<!-- <?php if($mtype_id==3 || $mtype_id==4) {?>
			<div class="control-group">
				<label class="control-label" for="set_value('amount')"> 招聘人数 </label>
				<div class="controls">
					<input type="text" name="amount" value="<?php echo set_value('amount',$it['amount']) ?>" id="amount">
					<span class='help-inline'> 填0表示不限制 </span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="department"> 招聘部门 </label>
				<div class="controls">
					<input type="text" name="department" value="<?php echo set_value('department',$it['department']) ?>" id="department">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="experience"> 工作经验 </label>
				<div class="controls">
					<input type="text" name="experience" value="<?php echo set_value('experience',$it['experience']) ?>" id="experience">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="place"> 工作地区 </label>
				<div class="controls">
					<input type="text" name="place" value="<?php echo set_value('place',$it['place']) ?>" id="place">
				</div>
			</div>
			<?php } ?>
 -->
			<!-- <div class="control-group">
				<label class="control-label" for="require"> 职称要求 </label>
				<div class="controls">
					<input type="text" name="require" value="<?php echo set_value('require',$it['require']) ?>" id="require">
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label class="control-label" for="major"> 专业要求 </label>
				<div class="controls">
					<input type="text" name="major" value="<?php echo set_value('major',$it['major']) ?>" id="major">
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label for="gender" class="control-label"> 性别要求 </label>
				<div class="controls">
					<select name="gender" id="gender" class='bselect show-tick '>
						<?php
						foreach (lang('recruit_gender')	as $k => $o){
							echo '<option value="'.$k.'"'. set_selected('gender',$k,$it['gender'],' selected="selected" class="option-select" ').'>';
							echo $o;
							echo '</option>';
						}
						?>
					</select>
					<span class="help-inline"></span>
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label class="control-label" for="age"> 年龄要求 </label>
				<div class="controls">
					<input type="text" name="age" value="<?php echo set_value('age',$it['age']) ?>" id="age">
					 至
					<input type="text" name="age_max" value="<?php echo set_value('age_max',$it['age_max']) ?>" id="age_max">
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label class="control-label" for="edu"> 学历要求 </label>
				<div class="controls">
					<input type="text" name="edu" value="<?php echo set_value('edu',$it['edu']) ?>" id="edu">
				</div>
			</div> -->




			<div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">备注</a></li>
                    <!-- <li><a href="#tab2" data-toggle="tab">任职职责</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="control-group uefull">
                            <textarea id="content" name="content"> <?php echo set_value('content',$it['content']); ?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="control-group uefull">
                            <textarea id="requirement" name="requirement"> <?php echo set_value('requirement',$it['requirement']); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>


		</div>

		<div class="boxed-footer">
			<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
			<?php endif ?>
			<input type="hidden" name="cid" value="<?php echo $this->cid; ?>">
			<input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>
<?php include_once 'inc_ui_media.php'; ?>
<?php echo static_file('adminer/js/recruit.js'); ?>
