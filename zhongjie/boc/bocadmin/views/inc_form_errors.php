<p></p>
<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>', '</div>'); ?>
<script>
require(['jquery'],function($){
	form_error = [];
	<?php
	if ($errs = form_errors()) {
		foreach ($errs as $key => $value) {
			echo "form_error.push('".$key."');";
		}
	}?>
	$.each(form_error, function(i, v) {
		// TODO: bug  按照 input id 结构来处理
		// $('label[for='+v+']').parent(".control-group").addClass('error')
		$('#'+v.replace('[]','')).parents(".control-group").addClass('error');
	});
});
</script>
