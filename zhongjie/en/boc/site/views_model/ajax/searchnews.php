<?php
$CI->load->model('news_model','mnews');
$page = 1;
if(!empty($reg[0])){
	$page = $reg[0];
}
$limit = 5;
$searchkey=$this->input->get('searchkey');
if(!empty($searchkey)){
    $where_a=array('cid'=>8,'audit'=>1);
    $where_b = array('like 1' => array('title', $searchkey));
    $where=array_merge($where_a,$where_b);
}else{
    $where = array('id <' =>0);
}

$count = $CI->mnews->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,3);
$datalist = $CI->mnews->get_list($limit,$limit*($page-1),$orders,$where);
// echo $this->db->last_query();
?>
<?php include_once VIEWS.'inc/head.php'; ?>

<?php echo static_file ('web/css/news1.css'); ?>
<h1 align='center'>新闻</h2>
<div class="newswarp1">
	<ul>
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li class="model2">
			<a href="<?php echo site_url('news/info/'.$v['id']); ?>" target="_blank" class="f-cb">
				<div class="box fl">
					<div class="title"><h2 class="css-face"><?php echo strcut($v['title'],20); ?></h2><span><?php echo date('Y-m-d',$v['timeline']); ?></span></div>
					<div class="details">
						<p><?php echo strcut(htmlchars($v['content']),120); ?></p>
					</div>
				</div>
				<div class="pic fr">
					<img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="<?php $a=one_upload($v['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $v['title'];}?>" class="css-face">
				</div>
			</a>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>

<?php echo static_file('site/js/init.js'); ?>
