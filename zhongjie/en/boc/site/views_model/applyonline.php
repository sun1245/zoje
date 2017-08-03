<?php !isset($reg[0]) and show_404(); ?>
<?php
$CI->load->model('recruit_model','mrecruit');
$rs = $CI->mrecruit->get_one($reg[0]);
!$rs and show_404();

$header['title'] = '在线应聘';
if (!empty($rs['title_seo'])) {
    $header['title'] = $rs['title_seo'];
}
if (!empty($rs['tags'])) {
    $header['tags'] = $rs['tags'];
}
if (!empty($rs['intro'])) {
    $header['intro'] = $rs['intro'];
}

?>

<!DOCTYPE html>
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
	<div>
		<div >
			<div>
             <?php echo form_open(site_url('applyonline/sendpost'),array("class"=>"form-horizontal","id"=>"frm-applyonline")); ?>
             <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" >
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
        </table>

        <?php echo form_close(); ?>
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
                    window.location.href="<?php echo site_url('recruitment');?>";
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