<ul>
	<?php foreach($list as $v){?>
	<li>
		<a href="<?php echo site_url('news/info/'.$v['id'])?>">
			<div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
			<p class="t1"><?php echo $v['title']?></p>
			<p class="c1"><?php echo strcut(strip_tags($v['content']),35); ?></p>
			<p class="time"><?php echo date('Y-m-d',$v['timeline']); ?></p>
		</a>
	</li>
	<?php } ?>
</ul>