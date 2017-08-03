<ul class="f-cb">
	<?php foreach($list as $v){?>
	<li>
		<a href="<?php echo $v['link']?>">
			<div class="img">
				<div class="label1"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
			</div>
			<p class="t1"><?php echo $v['title']?></p>
			<p class="c1"><?php echo strip_tags($v['content'])?></p>    							
		</a>
	</li>
	<?php } ?>
</ul>
<div class="page">
	<div class="label1">
		<div class="label2">
			<?php echo $pages;?>
		</div>
	</div>
</div>