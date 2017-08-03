<?php
$checked = $it['ga']? 1:0;
 ?>
<div class="boxed span5" id='ga' style="span3">
	<div class="boxed-inner">
		<h3>验证两部验证</h3>
		<div class="row-fluid">
			<div class="span6">
				<p></p>
				<div class="btn-group ui-radio" data-toggle="buttons-radio">
					<label class="btn <?php echo set_checked('ga','1',$checked,'active'); ?>">
						<input type="radio" name="ga" id="ga1" value="1" <?php echo set_checked('ga','1',$checked); ?>> 开启
					</label>
					<label class="btn <?php echo set_checked('ga','0',$checked,'active'); ?>">
					<input type="radio" name="ga" id="ga2" value="0" <?php echo set_checked('ga','0',$checked); ?> > 关闭
					</label>
				</div>
				<p></p>
				<div class="input-append">
					<input type="text" id="verify-code" name="verify_code" class="input-mini">
					<a href="#" id="btn-verify" class="btn btn-success">验证</a>
				</div>
				<p>
					获取GA APP后扫描右侧二维码添加帐号。
				</p>
			</div>
			<div class="span6">
				<p></p>
				<img id="qr" class="img-polaroid" style="" src="<?php echo site_url('ga/qr') ?>" alt="qr">
				<p></p>
			</div>
		</div>
	</div>
</div>
<style>
.error input{
	border-color:red;
}
</style>

<script type="text/javascript" charset="utf-8">
require(['adminer/js/ui'],function(ui){

	var ga = {
		open:"<?php echo site_url('ga/open') ?>"
		,qr:"<?php echo site_url('ga/qr') ?>"
	}

	$('#btn-qr').on('click', function(event) {
		event.preventDefault();
		$('#qr').attr('src', ga.qr);
		$(this).hide(100);
		$('#qr').fadeIn(400);
	});

	$('#btn-verify').on('click', function(event) {
		event.preventDefault();

		code = $('#verify-code').val();

		if(code && /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(code)){
			ga_status = $('input[name=ga]:checked').val();

		$.ajax({
			url: ga.open ,
			type: 'POST',
			dataType: 'json',
			data: {
				code:code
				,ga:ga_status
				,_cfs:$.cookie('_cfc')
			}
		})
		.done(function(data) {
			var status;
			if (data.status == 0) {
				status = "error";
			}else if(data.status == 1){
				status = "success";
			};
			$.pnotify({
				title:"两步验证"
				,text:data.msg
				,type:status
				,delay:3000
			});
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		}else{
			$.pnotify({
				title:"两步验证"
				,text:"填写正确的数字！"
				,type:"error"
				,delay:3000
			});
		}

	});

});
</script>
