<?php
$CI->load->model('news_model','mnews');
$page=$this->input->get('page');
// $ctype=$this->input->get('ctype');
$s=$page*10;
$datalist = $CI->mnews->get_list(10,$s,array('sort_id'=>'desc'),array('cid'=>8,'audit'=>1));
?>

<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
<div class="box">
	<a class="contbox" href="<?php echo site_url("news/info".$v['id']);?>" target="_blank">
		<p class="img">
			<?php if(!empty($v['photo'])) {?>
			<img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" alt="<?php $a=one_upload($v['photo']); if(!empty($a['alt'])){echo $a['alt'];}else{echo $v['title'];}?>" width="100%" height="173px">
			<?php } ?>
		</p>
		<p class="cont">
			<span class="tit"><?php echo strcut($v['title'],15); ?></span>
			<span class="font"><?php echo strcut(htmlchars($v['content']),35); ?></span>
			<span class="date"><?php echo date('Y.m.d',$v['timeline']); ?></span>
		</p>
	</a>
</div>
<?php }}else{echo "<div align='center'></div>";} ?>

<script>
	$(function(){
		waterFall("newsmain");
	})
</script>