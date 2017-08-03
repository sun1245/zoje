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
<div class="newswarp7 f-cb">
	<ul>
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li class="f-cb">
			<a class="news-img fl" href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" width="100%" alt="<?php $a=one_upload($v['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $v['title'];}?>"></a>
			<div class="news-txt fr">
				<a href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank"><h2><?php echo $v['title']; ?></h2></a>
				<div class="newsdate"><?php echo date('Y-m-d',$v['timeline']); ?></div>
				<a href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank"><p><?php echo strcut(htmlchars($v['content']),115); ?></p></a>
			</div>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>
