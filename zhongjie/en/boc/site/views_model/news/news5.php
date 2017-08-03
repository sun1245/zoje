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

<div class="newswarp5 f-cb">
	<ul>
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li class="css-face">
			<a href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank" class="f-cb">
				<div class="time fl">
					<span class="date"><?php echo date('d',$v['timeline']); ?></span>
					<span class="mouth"><?php echo date('F',$v['timeline']); ?>,</span>
					<span class="year"><?php echo date('Y',$v['timeline']); ?></span>
				</div>
				<div class="pic css-face fl"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="" class="css-face"></div>
				<div class="box fr">
					<h2><?php echo strcut($v['title'],20); ?></h2>
					<div class="details">
						<p><?php echo strcut(htmlchars($v['content']),130); ?></p>
					</div>
					<span class="mose">查看更多</span>
				</div>

			</a>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>
