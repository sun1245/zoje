 <?php
$CI->load->model('recruit_model','mrecruit');
$page = 1;
if(!empty($reg[0])){
	$page = $reg[0];
}
$limit = 8;
$where = array('cid'=>10,'audit'=>1);
$count = $CI->mrecruit->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,2);
$datalist = $CI->mrecruit->get_list($limit,$limit*($page-1),$orders,$where);
?>

<!-- 招聘模板一 -->
<div class="recruitwrap1 f-cb">
	<ul>
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li data-id="<?php echo $v['id']; ?>">
			<div class="recruit-date"> <?php echo date('Y-m-d',$v['timeline']); ?> </div>
			<div class="recruit-tit"> <?php echo strcut($v['title'],5); ?> </div>
			<div class="recruit-txt">
				<?php echo strcut(htmlchars($v['content']),85); ?>
			</div>
			<div class="more">+&nbsp;More</div>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>
<div class="body-shadow-demo"><!-- ajaxinfo.php --></div>
<script>
	$(function(){

		// 点击加载ajax
		var recruitAjax_Url = "<?php echo site_url('recruitment/ajaxinfo'); ?>";
		$(".recruitwrap1 li").on('click',function(){
			var id = $(this).data("id");
			$.ajax({
				url:recruitAjax_Url+'/'+id,
				beforeSend: function(){
					$(".body-shadow-demo").html("加载中......");
				},
				success: function(data){
					$(".body-shadow-demo").html(data);
					$(".body-shadow-demo").fadeIn();
				}
			});
		})

	})
</script>
