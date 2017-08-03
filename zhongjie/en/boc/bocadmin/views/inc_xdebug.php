<!--xdebug-->
<?php // 使用xdebug出现乱码;设置 php.ini default_charset = "UTF-8" ?>
<?php if (ENVIRONMENT == "development"): //开发模式 ?>


<div id="debug" class='modal hide fade left'>
	<style>
	.xdebug-var-dump{margin:5px 0 10px;}
	</style>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">PHP xdebug</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>

<button class="btn" id="show-profiler" >Show Profiler</button>

<!-- profiler  -->
<div id="profiler" class="modal hide fader">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">PHP Profiler</h3>
	</div>
	<div class="modal-body">

	<?php
	$CI = & get_instance();
	$CI->load->library('profiler');
	echo ($CI->profiler->run());
	?>
	</div>
</div>

<script type="text/javascript" charset="utf-8">
require(['jquery','tools','bootstrap'],function($,tools){
	// php error
	if (!tools.isEmptyValue($('.xdebug-var-dump').toArray()) ||!tools.isEmptyValue($('.xdebug-error').toArray()) ) {
		$('.xdebug-var-dump').appendTo($('#debug .modal-body'));
		$('.xdebug-error').appendTo($('#debug .modal-body'));

		$('#debug').modal({
			keyboard: false,
			backdrop:false,
			show:true
		});
	};

	// ci router profileter
	$('#show-profiler').on('click',function(){
		$('#profiler').modal({
			keyboard: false,
			backdrop:false,
			show:true
		});
	});

});
</script>
<?php else: ?>
<script type="text/javascript" charset="utf-8">
require(['jquery','tools','bootstrap'],function($,tools){
	if (!tools.isEmptyValue($('.xdebug-var-dump').toArray()) || !tools.isEmptyValue($('.xdebug-error').toArray()) ) {
		$('.xdebug-var-dump').css('display','none');
		$('.xdebug-error').css('display','none');
	}
});
</script>
<?php endif ?>

<!-- 用来存储error -->
<div id="php-error"></div>
