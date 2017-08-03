<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
    <style>
        td input.error{
            border: 1px solid #D70128;
        }
        td textarea.error{
            border: 1px solid #D70128;
        }
    </style>


    <?php echo static_file('web/css/sidebar.min.css'); ?>
    <?php echo static_file('web/css/font-awesome.min.css'); ?>
    <script type="text/javascript" charset="utf-8">
      <?php
      if ($this->config->item('index_page')) {
        ?>
        var ADMINER_URL = "<?php echo GLOBAL_URL.$this->config->item('index_page') ?>/" ;
        var UPLOADDO_URL = "<?php echo GLOBAL_URL.$this->config->item('index_page').'/upload/'?>";
        <?php
    }else{
        ?>
        var ADMINER_URL = "<?php echo GLOBAL_URL ?>" ;
        var UPLOADDO_URL = "<?php echo GLOBAL_URL.'/upload/'?>";
        <?php
    };
    ?>
</script>

</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
	<div class="page6 a0 main join-main main">
        <div class="banner">
            <div class="img"><img src="<?php echo static_file('web/img/culture/icon3_02.png')?>"></div>
            <div class="font">
                <div class="join-wrap">
                    <div class="label1">
                        <p>人力资源</p>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-nav">
            <div class="join-wrap">
                <a href="<?php echo site_url('join')?>"><div class="label1"><div class="label2">用人理念</div></div></a>
                <a href="<?php echo site_url('join/recruit_social')?>" <?php if($rs['cid']==24){echo 'class="on"';}?>><div class="label1"><div class="label2">社会招聘</div></div></a>
                <a href="<?php echo site_url('join/recruit_campus')?>" <?php if($rs['cid']==25){echo 'class="on"';}?>><div class="label1"><div class="label2">校园招聘</div></div></a>
            </div>
        </div>
		<div >
			<div>
                <?php echo form_open(site_url('applyonline/sendpost'),array("class"=>"form-horizontal","id"=>"frm-applyonline")); ?>
                 <!-- <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" >
                    <tr>
                        <td width="">姓 名：</td>
                        <td width=""><input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>">
                        </td>
                        <td width="" >性 别：</td>
                        <td width="">
                            <select name="gender" id="gender">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                        <td width="">婚 姻：</td>
                        <td  height="27" align="left">
                            <select name="marriage" id="marriage">
                                <option value="未婚">未婚</option>
                                <option value="已婚">已婚</option>
                                <option value="离异">离异</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" value="<?php echo set_value('email'); ?>" name="email" id="email">
                        </td>
                        <td>民 族：</td>
                        <td><input type="text" value="<?php echo set_value('nation'); ?>" name="nation" id="nation">
                        </td>
                        <td>年 龄：</td>
                        <td height="27" align="left"><input type="text" value="<?php echo set_value('age'); ?>" name="age" id="age">
                        </td>
                    </tr>
                    <tr>
                        <td>政治面貌：</td>
                        <td><input type="text"  value="<?php echo set_value('politic'); ?>" name="politic" id='politic'>
                        </td>
                        <td>籍 贯：</td>
                        <td><input type="text"  value="<?php echo set_value('birthplace'); ?>" name="birthplace" id="birthplace">
                        </td>
                        <td>文化程度：</td>
                        <td height="27" align="left">
                            <select name="edu" id="edu">
                                <option value="本科">本科</option>
                                <option value="硕士">硕士</option>
                                <option value="博士">博士</option>
                                <option value="博士后">博士后</option>
                                <option value="专科">专科</option>
                                <option value="高中">高中</option>
                                <option value="初中或以下">初中或以下</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>毕业学校：</td>
                        <td><input type="text"  value="<?php echo set_value('school'); ?>" name="school" id="school">
                        </td>
                        <td>专 业：</td>
                        <td><input type="text" value="<?php echo set_value('major'); ?>" name="major" id="major">
                        </td>
                        <td>毕业时间：</td>
                        <td height="27" align="left"><input type="text" value="<?php echo set_value('graduation'); ?>" id="graduation" name="graduation">
                        </td>
                    </tr>
                    <tr>
                        <td>外语水平：</td>
                        <td><input type="text"  value="<?php echo set_value('language'); ?>" name="language" id="language"></td>
                        <td>应聘职位：</td>
                        <td><input type="text" readonly   value="<?php echo $rs['title']; ?>" name="position" id="position">
                            <input type="hidden" readonly  value="<?php echo $rs['cid']; ?>" name="recruit_id">
                            <input type="hidden" readonly  value="<?php echo $rs['id']; ?>" name="rid"></td>
                            <td>联系电话：</td>
                            <td height="27" align="left" >
                                <input type="text"  value="<?php echo set_value('tel'); ?>" name="tel" id="tel">
                            </td>
                    </tr>
                    <tr>
                            <td>简历上传：</td>
                            <td colspan="5" align="left">
                                <div class="control-group">
                                  <div class="controls">
                                    <div class="btn-group">
                                      <span class="btn btn-success">
                                        <i class="fa fa-upload"></i>
                                        <span class="upload-btn fl foreign"></span>
                                        <input class="file fileupload file-inp poi vm" type="file" accept="*" >
                                        </span>
                                        <input type="hidden" name="files" id="files" class="form-upload" data-more="0" value="<?php echo set_value("files") ?>">
                                    </div>
                                </div>
                                <div id="js-files-show" class="js-img-list-f"></div>
                                <div class="clear"></div>
                                </div>
                            </td>
                    </tr>
                    <tr>
                        <td>个人简历：</td>
                        <td colspan="5" align="left"><label for="content">
                            <textarea  id="content" name="content" id="content"><?php echo set_value('content'); ?></textarea>
                        </label></td>
                    </tr>
                    <tr>
                        <td>验证码：</td>
                        <td colspan="5" align="left"><input type="text" maxlength="4" name="captcha" id="captcha">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><input type="submit"  value="提 交" /></td>
                    </tr>
                </table> -->

                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="applay-tb">
                    <tbody>
                        <tr style="border: none;">
                            <td align="right">姓 名</td>
                            <td ><input type="text" id="name" name="name" class="applay-input" ><span class="spred">*</span></td>
                            <td align="right">性 别</td>
                            <td >
                                <select name="gender" class="applay-input">
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select><span class="spred">*</span></td>
                            <td align="right">婚 姻</td>
                            <td  align="left" >
                                <select name="marriage" class="applay-input" >
                                    <option value="未婚">未婚</option>
                                    <option value="已婚">已婚</option>
                                    <option value="离异">离异</option>
                                </select><span class="spred">*</span></td>
                        </tr>
                        <tr>
                            <td align="right">E-mail</td>
                            <td><input type="text" class="applay-input"  value="" name="email"><span class="spred">*</span></td>
                            <td align="right">民 族</td>
                            <td><input type="text" class="applay-input"  value="" name="nation"><span class="spred">*</span></td>
                            <td align="right">年 龄</td>
                            <td align="left" ><input type="text" class="applay-input" value="" name="age"><span class="spred">*</span></td>
                        </tr>
                        <tr>
                            <td align="right">政治面貌</td>
                            <td><input type="text" class="applay-input"  value="" name="politic"><span class="spred">*</span></td>
                            <td align="right">籍 贯</td>
                            <td><input type="text" class="applay-input"  value="" name="birthplace"><span class="spred">*</span></td>
                            <td align="right">文化程度</td>
                            <td align="left" >
                                <select name="edu" class="applay-input" >
                                    <option value="本科">本科</option>
                                    <option value="硕士">硕士</option>
                                    <option value="博士">博士</option>
                                    <option value="博士后">博士后</option>
                                    <option value="专科">专科</option>
                                    <option value="高中">高中</option>
                                    <option value="初中或以下">初中或以下</option>
                                </select><span class="spred">*</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">毕业学校</td>
                            <td><input type="text" class="applay-input"  value="" name="school"><span class="spred">*</span></td>
                            <td align="right">专 业</td>
                            <td><input type="text" class="applay-input"  value="" name="major"><span class="spred">*</span></td>
                            <td align="right">毕业时间</td>
                            <td align="left" ><input type="text" class="applay-input"  value="" name="graduation"><span class="spred">*</span></td>
                        </tr>
                        <tr>
                            <td align="right">外语水平</td>
                            <td><input type="text" class="applay-input"  value="" name="language"></td>
                            <td align="right">应聘职位</td>
                            <td><input type="text" readonly="" class="applay-input"  value="销售经理" name="position"><input type="hidden" readonly="" class="applay-input"  value="38" name="recruit_id"><input type="hidden" readonly="" class="applay-input"  value="2" name="rid"></td>
                            <td align="right">联系电话</td>
                            <td align="left" ><input type="text" class="applay-input"  value="" name="tel"><span class="spred">*</span></td>
                        </tr>
                       <tr>
                           <td align="right" valign="top">简历上传</td>
                           <td colspan="5"><input type="file" name="userfile"><!-- <a href="http://121.41.128.239:8138/langyou/upload/应聘申请表.doc">在线应聘表格下载</a> --></td>
                       </tr>
                        <tr>
                            <td align="right">个人简历</td>
                            <td colspan="5"><label for="content"><textarea class="applay-input" id="content" name="content"></textarea><span class="spred">*</span></label></td>
                        </tr>
                        <tr>
                            <td align="right">验证码</td>
                            <td colspan="5" >
                                <input class="code applay-input" type="text" maxlength="4" name="captcha" id="captcha"><!-- <img src="" alt="" title="点击刷新" class="captchas"> -->
                                <input class="submit" type="submit" value="提交" >
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php echo static_file('site/js/init.js'); ?>

<?php
echo static_file('require.js');
echo static_file('require.config.js');
?>
<?php include_once VIEWS.'inc/inc_ui_media.php'; ?>
<script type="text/javascript">
    require(['adminer/js/ui','web/js/media'],function(ui,media){
      media.init();
      var files = <?php echo json_encode(one_upload(set_value("files"))) ?>;
      media.show(files,"files");
  });
</script>


<script>
    $(function(){
        $('#frm-applyonline').on('submit',function(event) {
            url =  $(this).attr('action');
            data = $(this).serializeArray();
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(data) {
                var status;
                if (data.status == 0) {
                    $('.validate').remove();
                    $('#frm-applyonline input').removeClass('error');
                    $('#frm-applyonline textarea').removeClass('error');
                    var strlist='';
                    $.each(data.msg, function(putid, putv) {
                        $('#'+putid).removeClass('success').addClass('error');
                        $('#'+putid).attr("placeholder",putv);
                        $('#'+putid).after('<span class="validate"> '+ putv +' </span>');
                        strlist+=putv+'\n';
                    });
                    // alert(strlist);
                }else if(data.status == 1){
                    alert(data.msg);
                    // document.location.reload();
                    // window.location.href="<?php echo site_url('recruitment');?>";
                };
            })
            event.preventDefault();
        });
});

</script>



<?php include_once VIEWS.'inc/footer.php'; ?>
</div>

</body>
</html>