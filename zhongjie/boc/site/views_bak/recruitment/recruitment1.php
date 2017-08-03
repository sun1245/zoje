<!-- 招聘模板一 -->
<div class="recruitwrap1 f-cb">
	<ul>
		<?php if(!empty($list)){ foreach($list as $v){ ?>
		<li data-id="<?php echo $v['id']; ?>">
			<div class="recruit-date"> <?php echo date('Y-m-d',$v['timeline']); ?> </div>
			<div class="recruit-tit"> <?php echo strcut($v['title'],5); ?> </div>
			<div class="recruit-txt">
				<?php echo strcut(htmlchars($v['content']),85); ?>
			</div>
			<div class="more">+&nbsp;More</div>
		</li>
		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
	</ul>
</div>
<div class="page"><?php echo $pages; ?></div>
<div class="body-shadow-demo"><!-- ajaxinfo.php --></div>
<script>
	$(function(){
		// 点击加载ajax
		var recruitAjax_Url = "<?php echo site_url('recruitment/ajaxinfo'); ?>";
		$(".recruitwrap1 li").on('click',function(){
			var id = $(this).data("id");
			$.ajax({
				url:recruitAjax_Url+'/'+id,
				beforeSend: function(){
					$(".body-shadow-demo").html("加载中......");
				},
				success: function(data){
					$(".body-shadow-demo").html(data);
					$(".body-shadow-demo").fadeIn();
				}
			});
		})

	})
</script>
