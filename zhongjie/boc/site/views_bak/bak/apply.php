<?php !isset($reg[0]) and show_404(); ?>
<?php
$header = array(
	'title' => "在线应聘"
	,'tags'=> get_config_siteg('site','tags')
	,'intro' => get_config_siteg('site','intro')
);

$status = -1;
$id = intval($this->uri->segment(2,0));
$CI->load->model('recruit_model','mrecruit');
$rs = $CI->mrecruit->get_one($id);
!$rs and show_404();
// echo $this->db->last_query();
?>
<?php include_once VIEWS.'inc_header.php'; ?>
<?php include_once VIEWS.'inc/banner.hr.php'; ?>
<div class="inner-wrap">
	<div class="inner-main clearfix">
		<?php include_once VIEWS.'inc/side.hr.php'; ?>
		<div class="inner-right">
			<div class="path">
				<h2>在线应聘</h2>
				<h3>您的位置 : <a href="<?php echo site_url(); ?>">首页</a><i>|</i><a href="<?php echo site_url('hr/talent'); ?>">人才招聘</a><i>|</i><span>在线应聘</span></h3>
			</div>
			<div class="content">
				<?php echo form_open(site_url('apply'),array("enctype"=>"multipart/form-data","class"=>"form-horizontal","id"=>"frm-apply","name"=>"frm-apply")); ?>
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="joinus_tb">
				    <tr>
				        <td width="">姓 名：</td>
				        <td width=""><input type="text" id="name" name="name" class="feedback_input" style="width:110px;"><span id="spred">*</span></td>
				        <td width="" >性 别：</td>
				        <td width=""><select name="gender" class="feedback_input" style="width:122px; height:32px;">
								<option value="男">男</option>
								<option value="女">女</option>
							</select><span id="spred">*</span></td>
				        <td width="">婚 姻：</td>
				        <td width="" height="27" align="left" class="joinus_tb_td tdleft"><select name="marriage" class="feedback_input" style="width:122px; height:32px;">
								<option value="未婚">未婚</option>
								<option value="已婚">已婚</option>
								<option value="离异">离异</option>
							</select><span id="spred">*</span></td>
				    </tr>
				    <tr>
				        <td>E-mail:</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="email"><span id="spred">*</span></td>
				        <td>民 族：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="nation"><span id="spred">*</span></td>
				        <td>年 龄：</td>
				        <td height="27" align="left" class="joinus_tb_td tdleft"><input type="text" class="feedback_input" style="width:110px;" value="" name="age"><span id="spred">*</span></td>
				    </tr>
				    <tr>
				        <td>政治面貌：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="politic"><span id="spred">*</span></td>
				        <td>籍 贯：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="birthplace"><span id="spred">*</span></td>
				        <td>文化程度：</td>
				        <td height="27" align="left" class="joinus_tb_td tdleft">
				            <select name="edu" class="feedback_input" style="width:122px; height:32px;">
								<option value="本科">本科</option>
								<option value="硕士">硕士</option>
								<option value="博士">博士</option>
								<option value="博士后">博士后</option>
								<option value="专科">专科</option>
								<option value="高中">高中</option>
								<option value="初中或以下">初中或以下</option>
							</select><span id="spred">*</span></td>
				    </tr>
				    <tr>
				        <td>毕业学校：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="school"><span id="spred">*</span></td>
				        <td>专 业：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="major"><span id="spred">*</span></td>
				        <td>毕业时间：</td>
				        <td height="27" align="left" class="joinus_tb_td tdleft"><input type="text" class="feedback_input" style="width:110px;" value="" name="graduation"><span id="spred">*</span></td>
				    </tr>
				    <tr>
				        <td>外语水平：</td>
				        <td><input type="text" class="feedback_input" style="width:110px;" value="" name="language"></td>
				        <td>应聘职位：</td>
				        <td><input type="text" readonly="1" class="feedback_input" style="width:110px;" value="<?php echo $rs['title']; ?>" name="position"><input type="hidden" readonly="1" class="feedback_input" style="width:110px;" value="<?php echo $rs['cid']; ?>" name="recruit_id"><input type="hidden" readonly="1" class="feedback_input" style="width:110px;" value="<?php echo $rs['id']; ?>" name="rid"></td>
				        <td>联系电话：</td>
				        <td height="27" align="left" class="joinus_tb_td tdleft"><input type="text" class="feedback_input" style="width:110px;" value="" name="tel"><span id="spred">*</span></td>
				    </tr>
				    <tr>
				        <td>简历上传：</td>
				        <td colspan="5"><label for="userfile"><input type="file" size="35" name="userfile"></label></td>
				        </tr>
				    <tr>
				        <td>个人简历：</td>
				        <td colspan="5"><label for="content"><textarea class="feedback_input" style="width:590px; height:150px;" id="content" name="content"></textarea><span id="spred">*</span></label></td>
				    </tr>
				    <tr>
				        <td>验证码：</td>
				        <td colspan="5"><input type="text" maxlength="4" class="feedback_input" style="width:60px;" name="captchas"><img src="" alt="" title="点击刷新" class="captchas"><span id="spred">*</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($status==1){ ?><script language='javascript'>alert("+<?php echo $msg; ?>+")</script><?php } elseif($status==0){ ?><script language='javascript'>alert("+<?php echo $msg; ?>+")</script><?php } ?></td>
				    </tr>
				    <tr>
				        <td colspan="6" style="padding:10px 0;text-align:center">
				            <input type="image" src="<?php echo static_file('img/buttom1_03.png'); ?>" />
				        </td>
				    </tr>
				</table>
				<?php include_once VIEWS.'form_errors.php'; ?>
				<?php echo static_file('site/apply.js'); ?>
	            <?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

<?php include_once VIEWS.'inc_footer.php'; ?>
