<?php include_once VIEWS.'inc/head.php'; ?>
<style>
	input.error{
		border: 1px solid #D70128;
	}
	textarea.error{
		border: 1px solid #D70128;
	}
</style>
<br><br><br>
<?php echo form_open(site_url('feedback/sendpost'),array("class"=>"form-horizontal","id"=>"frm-feedback")); ?>
<h1 align='center'>
	<div>标题:<input type="text" name="title" id="title" placeholder=""></div><br>
	<div>姓名:<input type="text" name="username" id="username" placeholder=""></div><br>
	<div>邮箱:<input type="text" name="email" id="email" placeholder=""></div><br>
	<div>手机:<input type="text" name="telphone" id="telphone" placeholder=""></div><br>
	<div>传真:<input type="text" name="fax" id="fax" placeholder=""></div><br>
	<div>内容:<textarea id="content" name="content" rows="8" class="span5"></textarea></div><br>
	<div>验证码:<input id="captcha" name="captcha"></input></div><br>
	<div><input type="submit" value="提交"></div>
</h1>
<?php echo form_close(); ?>
<br><br><br>

<?php echo static_file('site/js/init.js'); ?>

<script>
	$(function(){
		$('#frm-feedback').on('submit',function(event) {
			url =  $(this).attr('action');
			data = $(this).serializeArray();
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: data,
			})
			.done(function(data) {
				var status;
				if (data.status == 0) {
					$('.validate').remove();
					$('#frm-feedback input').removeClass('error');
					$('#frm-feedback textarea').removeClass('error');
					var strlist='';
					$.each(data.msg, function(putid, putv) {
						$('#'+putid).removeClass('success').addClass('error');
						$('#'+putid).attr("placeholder",putv);
						$('#'+putid).after('<span class="validate"> '+ putv +' </span>');
						strlist+=putv+'\n';
					});
					// alert(strlist);
				}else if(data.status == 1){
					alert(data.msg);
					// document.location.reload();
					// window.location.href="";
				}else if(data.status == 2){
					alert(data.msg);
				};
			})
			// .fail(function() {
			// 	console.log("error");
			// })
			// .always(function() {
			// 	console.log("complete");
			// });
		event.preventDefault();
	});

	});

</script>





<?php include_once VIEWS.'inc/footer.php'; ?>
