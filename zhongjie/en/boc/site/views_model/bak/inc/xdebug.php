<!--xdebug-->
<?php // 使用xdebug出现乱码;设置 php.ini default_charset = "UTF-8" ?>
<?php if (ENVIRONMENT == "development"): //开发模式 ?>
<div id="xdebug" class='modal' style="display:none;">
	<div class="modal-header">
		<h3 id="myModalLabel">PHP xdebug</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" id="xdebug-close" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
require(['jquery','tools','bootstrap'],function($,tools){
    if (!tools.isEmptyValue($('.xdebug-var-dump').toArray()) ||!tools.isEmptyValue($('.xdebug-error').toArray()) ) {
      $('.xdebug-var-dump').appendTo($('#xdebug .modal-body'));
      $('.xdebug-error').appendTo($('#xdebug .modal-body'));
      $('#xdebug').show();
    };
    $('#xdebug-close').on('click', function(event) {
      event.preventDefault();
      $('#xdebug').hide();
    });
  });
  </script>
<style>
.xdebug-var-dump{margin:5px 0 10px;}
.modal {
  position: fixed;
  top: 15%;
  left: 50%;
  z-index: 1050;
  width: 560px;
  margin-left: -280px;
  background-color: #ffffff;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, 0.3);
  *border: 1px solid #999;
  /* IE6-7 */

  -webkit-background-clip: padding-box;
  -moz-background-clip: padding-box;
  background-clip: padding-box;
  outline: none;
  box-shadow: 1px 5px 18px 2px #ccc;
}
.modal.fade {
  -webkit-transition: opacity .3s linear, top .3s ease-out;
  -moz-transition: opacity .3s linear, top .3s ease-out;
  -o-transition: opacity .3s linear, top .3s ease-out;
  transition: opacity .3s linear, top .3s ease-out;
  top: -25%;
}
.modal.fade.in {
  top: 10%;
}
.modal-header {
  padding: 9px 15px;
  border-bottom: 1px solid #eee;
}
.modal-header .close {
  margin-top: 2px;
}
.modal-header h3 {
  margin: 0;
  line-height: 30px;
}
.modal-body {
  position: relative;
  overflow-y: auto;
  max-height: 400px;
  padding: 15px;
}
.modal-form {
  margin-bottom: 0;
}
.modal-footer {
  padding: 14px 15px 15px;
  margin-bottom: 0;
  text-align: right;
  background-color: #f5f5f5;
  border-top: 1px solid #ddd;
  *zoom: 1;
}
.modal-footer:before,
.modal-footer:after {
  display: table;
  content: "";
  line-height: 0;
}
.modal-footer:after {
  clear: both;
}
.modal-footer .btn + .btn {
  margin-left: 5px;
  margin-bottom: 0;
}
.modal-footer .btn-group .btn + .btn {
  margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
  margin-left: 0;
}
</style>
<?php else: // 产品模式 ?>
<script type="text/javascript" charset="utf-8">
if (!tools.isEmptyValue($('.xdebug-var-dump').toArray()) || !tools.isEmptyValue($('.xdebug-error').toArray()) ) {
	$('.xdebug-var-dump').css('display','none');
	$('.xdebug-error').css('display','none');
}
</script>
<?php endif ?>
<!-- 用来存储error -->
<div id="php-error"></div>
