<?php
$CI->load->model('news_model','mnews');
$page = 1;
if(!empty($reg[0])){
	$page = $reg[0];
}
$limit = 9;
$where = array('cid'=>8,'audit'=>1);
$count = $CI->mnews->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,2);
$datalist = $CI->mnews->get_list($limit,$limit*($page-1),$orders,$where);
?>

<div class="newswarp4 f-cb">
	<ul>
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li>
			<a href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank">
				<div class="pic css-face"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="<?php $a=one_upload($v['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $v['title'];}?>" class="css-face"></div>
				<div class="box">
					<h2><?php echo strcut($v['title'],20); ?></h2>
					<div class="details">
						<p><?php echo strcut(htmlchars($v['content']),65); ?></p>
					</div>
					<span class="time"><?php echo date('Y-m-d',$v['timeline']); ?></span>
				</div>
			</a>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>

<script>
	$(function(){
		for (var i= 1;i<=$('.newswarp4 ul li').length; i++) {
			if (i%3==0) {
				$('.newswarp4 ul li').eq(i-1).addClass('on');
			}
		};
	})
</script>
