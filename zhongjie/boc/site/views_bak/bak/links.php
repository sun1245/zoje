<?php 
// 直接在view页面中处理数据，舍弃了MVC特性，数据模块仍然另存为 `_model`文件，方便维护。
$CI->load->model('links_model','mlink');
$CI->mlink->change_table('links');
$page = 1;	
if ($reg) {
	$page = $reg[0];
}
$limit = 2 ;
$count = $CI->mlink->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,2);
$list = $CI->mlink->get_list($limit,$limit*($page-1),$orders,$where);
?>

<?php include_once 'inc_header.php'; ?>

<ul>
<?php foreach ($list as $v):?>
<li>
	<?php echo $v['title'] ?>
</li>
<?php endforeach;?>
</ul>
<?php echo $pages ?>



<!-- 异步处理 -->
<?php if (!is_ajax()): ?>
<div>
	<h3>异步处理</h3>
	<div id="loadpage"></div>	
</div>
<script>
load_page("<?php echo site_url('links'); ?>",'#loadpage')
</script>
<?php endif ?>


<!-- 
<p>
城市分页：
</p>
<div class="province-city">
	<select id="province" class='bselect province'></select>
	<select class='bselect province_city'></select>
</div> 

<script>
$(function(){
	// 初始
	// province.init($('#province'));
})
</script>
-->

<?php include_once 'inc_footer.php'; ?>
