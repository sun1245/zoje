<?php foreach($video as $v){?>
<li>
	<a href="<?php echo UPLOAD_URL.tag_photo($v['files']); ?>">
		<div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
		<div class="font">
			<div class="label1">
				<div class="laebl2"><img src="<?php echo static_file('web/img/news/icon5_03.png')?>"></div>
			</div>
		</div>
	</a>
</li>
<?php } ?>