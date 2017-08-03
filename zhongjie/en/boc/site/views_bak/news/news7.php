<div class="newswarp7 f-cb">
	<ul>
		<?php if(!empty($list)){ foreach($list as $v){ ?>
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
