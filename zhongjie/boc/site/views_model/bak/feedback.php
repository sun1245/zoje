<?php 
	// 提供回头数据
	$header = array(
	'title' => "反馈信息"
	,'title_seo' => "欢迎您提意见"
	,'tags' => "反馈信息,用户反馈"
	,'intro' => "反馈简介"
	);
?>
<?php include_once VIEWS.'inc_header.php'; ?>



<h2> 反馈信息 </h2>

<p>
<div id='msg'></div>	
</p>

<?php echo form_open(site_url('feedback/send_ajax'),array("class"=>"form-horizontal","id"=>"frm-fb")); ?>
	<div class="control-group">
		<label class="control-label" for="username">名称:</label>
		<div class="controls">
			<input type="text" name="username" id="username" placeholder="user.name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">邮箱:</label>
		<div class="controls">
			<input type="text" name="email" id="inputEmail" placeholder="Email">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="title">主题：</label>
		<div class="controls">
			<input type="text" id="title" name="title" x-webkit-speech>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="content">内容：</label>
		<div class="controls">
			<textarea id="content" name="content" rows="8" class="span5"></textarea>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="title">验证码：</label>
		<div class="controls">
			<input id="captcha" name="captcha"></input>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">提交信息</button>
		</div>
	</div>
</form>
<div id="ajax-msg"></div>

<script>
$(function(){
	$('#frm-fb').on('submit',function(event) {
		url =  $(this).attr('action');
		data = $(this).serializeArray();
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(data) {
			console.log("success");
			var status;
			if (data.status == 0) {
				status = "error";
			}else if(data.status == 1){
				status = "success";
			};
			$('#ajax-msg').html('<div class="alert alert-'+status+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		event.preventDefault();
		// return false;
	});

});

</script>





<?php include_once VIEWS.'inc_footer.php'; ?>
