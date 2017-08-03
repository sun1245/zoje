<?php
$CI->load->model('news_model','mnews');
$CI->db->order_by('sort_id','desc');
$tuijianlist = $CI->mnews->get_all_limit(array('cid'=>8,'audit'=>1,'flag'=>1),'id,title,photo,content,timeline',3);

$page = 1;
if(!empty($reg[0])){
	$page = $reg[0];
}
$limit = 9;
if(!empty($tuijianlist)){
	$a_tj=array();
	foreach ($tuijianlist as $t) {
		array_push($a_tj, $t['id']);
	}

	$where = array('cid'=>8,'audit'=>1);
	$where2 = array('not_in id' => array('id',$a_tj));
	$where=array_merge($where,$where2);
}else{
	$where = array('cid'=>8,'audit'=>1);
}

$count = $CI->mnews->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,2);
$datalist = $CI->mnews->get_list($limit,$limit*($page-1),$orders,$where);
// echo $this->db->last_query();exit;

?>

<!-- 新闻模板六 -->
<div class="newswarp6 f-cb">
	<!-- 推荐新闻 -->
	<ul class="newswarp6-list1 f-cb">
		<?php if(!empty($tuijianlist)){ foreach($tuijianlist as $v){ ?>
		<li>
			<a href="<?php echo site_url('news/info/'.$v['id'])?>" target="_blank">
				<img width="100%" src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="<?php $a=one_upload($v['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $v['title'];}?>">
				<h3><?php echo strcut($v['title'],15); ?></h3>
				<span><?php echo date('Y-m-d',$v['timeline']); ?></span>
				<p><?php echo strcut(htmlchars($v['content']),45); ?></p>
				<i class="demomore"></i>
			</a>
		</li>
		<?php }}else{echo "<div align='center'>暂无推荐信息！</div>";} ?>
	</ul>
	<!-- 普通新闻 -->
	<a name="newswarp6-list"></a>
	<ul class="newswarp6-list2 f-cb">
		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
		<li>
			<a href="<?php echo site_url('news/info/'.$v['id']);?>" target="_blank">
				<span><?php echo date('Y-m-d',$v['timeline']); ?></span>
				<h3><?php echo strcut($v['title'],15); ?></h3>
				<p><?php echo strcut(htmlchars($v['content']),70); ?></p>
				<span class="demomore">查看详情</span>
			</a>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>

</div>

<div class="page"><?php echo $pages; ?></div>
<script>
	$(function(){
		$('.newswarp6 ul li').eq(2).addClass('nobor');

		$('.page a').each(function(i,e){
			var u = $(e).attr('href')+'#newswarp6-list';
			$(e).attr('href',u);
		})

	})
</script>