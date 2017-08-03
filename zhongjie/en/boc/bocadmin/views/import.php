<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">

  <div class="boxed span12">
    <div class="boxed-inner hg1">
      <h3> <i class="fa fa-user-md"></i> 会员导入</h3>
      <div class="center">
        <div class="content clearfix">
          <div class="shao-cont">
            <div class="right">
              <div class="right_list">
                <table width="100%" border="0" align="center" >
                  <?php echo form_open(site_url('insert/index'),array("enctype"=>"multipart/form-data","class"=>"form-horizontal","id"=>"form1","name"=>"form1")); ?>
                  <tr>
                    <td width="18%" height="50"> 选择你要导入的数据表  </td>
                    <td width="82%">

                      <input name="file" type="file" id="file" size="50" />


                      <input name="button" type="submit" class="nnt_submit" id="button" value="导入数据"   onclick=" return  import_check();" />

                    </td>
                  </tr>

                 <!--  <tr>
                  <td colspan="2" height="25"> 数据格式 <a href="javascript:;">
                  <strong style="color:#F00">请下载！</strong></a></td>
                </tr> -->

                <tr>
                  <td colspan="2" height="25"> 导入数据表文件必须是<strong>execel</strong>文件格式{.<span><strong>xls</strong></span>}为扩展名．</td>
                </tr>
              </form>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="height"></div>
  </div>
  <div id="div_div" ></div>

</div>
</div>

</div>


<script>
  function import_check(){
    var f_content = form1.file.value;
    var fileext=f_content.substring(f_content.lastIndexOf("."),f_content.length)
    fileext=fileext.toLowerCase()
    if (fileext!='.xls')
    {
     alert("对不起，导入数据格式必须是xls格式文件哦，请您调整格式后重新上传，谢谢 ！");
     return false;
   }
 }
</script>
