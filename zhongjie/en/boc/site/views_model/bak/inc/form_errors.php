<p></p>
<?php //echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>', '</div>'); ?>
<script>
$(function(){
	var form_error = [];
	<?php 
	if ($errs = form_errors()) {
		foreach ($errs as $key => $value) {
			echo "form_error.push(['$key','$value']);";
		}
	}?>
	$.each(form_error, function(i, v) {
		$('#'+v[0]).removeClass('success').addClass('error');
		$('#'+v[0]).after('<span class="validate">'+v[1]+'</span>');
	});
});
</script>
