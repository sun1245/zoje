<?php
// 默认从router中获取
?>
<?php include_once VIEWS.'inc_header.php'; ?>

<!-- EX: 异步获取列表， 使用路由来处理长的专题页面 -->
<div class="" id="telist"> </div>
<script>
require(['jquery','tools'],function($,tools){
	tools.load_page(SITE_URL + "telist/",'#telist');
});
</script>


<!-- EX：省市处理（默认的处理方式） -->

<div class="pro">
	<select id="pv_xxx" class='province'></select>
	<select class='province_city'></select>
	<script>
	require(['jquery','site/js/ui'],function($,ui){
		ui.province.init($('#pv_xxx'));
		// or 带有位置初始化
		var loc = {
			'province': 1
			,'city': 1
		}
		ui.province.init($('#pv'),loc);
	});
	</script>
</div>

<input type="text" name="captcha" value="">

<?php include_once VIEWS.'inc_footer.php'; ?>
<?php //echo page_profiler(); ?>
