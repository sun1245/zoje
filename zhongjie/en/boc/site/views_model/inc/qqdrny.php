<div class="drny-box">
	<ul>
		<li>
			<a href="javasrcipt:;" target="_blank">
				<div class="details">
					<i class="ico1"></i>
					<p>QQ咨询</p>
				</div>
			</a>
		</li>
		<li>
			<a href="javascript:void(0)">
				<div class="details">
					<i class="ico2"></i>
					<p>400电话</p>
				</div>
				<span>400-688-2328</span>
			</a>
		</li>
		<li style="overflow: visible">
			<a href="javascript:void(0)">
				<div class="details">
					<i class="ico3"></i>
					<p>微信扫一扫</p>
				</div>
			</a>
			<div class="ewm">
				<img src="<?php echo static_file('web/img/drny/drny.jpg');?>" width="120" height="120">
			</div>
		</li>
		<li>
			<a href="http://www.weibo.com" target="_blank">
				<div class="details">
					<i class="ico4"></i>
					<p>关注微博</p>
				</div>
			</a>
		</li>
	</ul>
</div>
<?php
echo static_file('web/css/drny.css');
?>
<script>
	$(function(){
		var lxbtn=$(".drny-box li");
		lxbtn.each(function(){
			var index=$(this).index()
			if(index==0 || index==1 || index==3){
				$(this).hover(function(){
					$(this).stop().animate({marginLeft:"-13px",width:"90px"},600)
				},function(){
					$(this).stop().animate({marginLeft:"0px",width:"77px"},600)
				})
			}
			if(index==1){
				$(this).hover(function(){
					$(this).stop().animate({marginLeft:"-155px",width:"232px"},600)
				},function(){
					$(this).stop().animate({marginLeft:"0px",width:"77px"},600)
				})
			}
			if(index==2){
				$(this).hover(function(){
					$(this).stop().animate({marginLeft:"-13px",width:"90px"},600,function(){
						$(".ewm").stop().show()
					})
				},function(){
					$(this).stop().animate({marginLeft:"0px",width:"77px"},600,function(){
						$(".ewm").stop().hide()
					})
				})
			}
		})

	})
</script>
