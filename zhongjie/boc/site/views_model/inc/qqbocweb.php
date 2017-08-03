<?php
$CI->load->model('onlineservice_model','mqq');
$footqq = $CI->mqq->get_all(array('audit'=>1),'title,number,link');
?>
<div class="server-box on">
	<div class="list">
		<ul>
			<?php foreach($footqq as $k=>$v) {?>
			<li>
				<a class="f-cb" href="<?php echo $v['link']; ?>" target="_blank">
					<span class="fl stt"> <?php echo $v['title']; ?> </span>
					<span class="ico ico<?php echo $k+1;?>"></span>
				</a>
			</li>
			<?php } ?>

			<li>
				<a class="f-cb return-webtop" href="javascript:;">
					<span class="fl stt">TOP</span>
					<span class="ico ico5"></span>
				</a>
			</li>
		</ul>
	</div>
	<div class="warp f-cb">
		<div class="fl mian">
			<a class="icon1"  href="javascript:;" title=" "></a>
			<a class="icon2"  href="javascript:;" title=" "></a>
			<a class="icon3"  href="javascript:;" title=" "></a>
			<a class="icon4"  href="javascript:;" title=" "></a>
		</div>
		<span class="fr icon5"></span>
	</div>
</div>
<?php
echo static_file('web/css/bocweb.css');
?>
<script>
	$(function(){
	//滚动渐隐出现
	$(".server-box").hover(function() {
		$(this).stop(true,true).removeClass('on');
	}, function() {
		$(this).stop(true,true).addClass('on');
	});
})
</script>
