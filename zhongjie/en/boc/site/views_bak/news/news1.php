<div class="newswarp1">
	<ul>

		<?php if(!empty($tuijian)) {?>
		<li class="model1">
			<a href="<?php echo site_url('news/info/'.$tuijian['id']); ?>" target="_blank" class="f-cb">
				<div class="pic fl">
					<img src="<?php echo UPLOAD_URL.tag_photo($tuijian['photo']); ?>" alt="<?php $a=one_upload($tuijian['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $tuijian['title'];}?>" class="css-face">
				</div>
				<div class="box fr">
					<h2 class="css-face"><?php echo strcut($tuijian['title'],20); ?></h2>
					<div class="details">
						<p><?php echo strcut(htmlchars($tuijian['content']),120); ?></p>
					</div>
					<span class="btns css-face">查看更多</span>
				</div>
			</a>
		</li>
		<?php } ?>

		<?php if(!empty($list)){ foreach($list as $v){ ?>
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