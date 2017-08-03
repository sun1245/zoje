require(['jquery'], function($) {
	// SEO按钮
	$('#btn-seo').on('click', function(event) {
		event.preventDefault();
		$('#seo-modal').modal();
	});

	$('form#frm-seo').submit(function(event) {
		event.preventDefault();

		var url = $(this).attr('action') + "/" + $('input[name="cid"]').val();

		$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					id: $('input[name="cid"]').val(),
					title: $('input#title').val(),
					title_seo: $('input#title_seo').val(),
					tags: $('input#tags').val(),
					intro: $('textarea#intro').val(),
					_cfs: $.cookie('_cfc')
				}
			})
			.done(function(data) {
				console.log('处理');
				var status;
				if (data.status === 0) {
					status = "error";
				} else if (data.status === 1) {
					status = "success";
					$('#seo-modal').modal('hide');
				}
				$('#ajax-msg').alert(data.msg, status);
				$.pnotify({
					title: "修改栏目",
					text: data.msg,
					type: status,
					delay: 3000
				});
			})
			.fail(function(jqXHR, textStatus, errorThrown) {
				m = XMLHttpRequest.responseJSON;
				$.pnotify({
					title: "错误",
					text: m.msg,
					type: 'error',
					delay: 3000
				});
				console.log("error");
			});
	});

});
