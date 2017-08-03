require(['jquery', 'adminer/js/ui', 'bootstrap'], function($, ui) {

	$('.pur').each(function(index, el) {
		var pid = $(el).attr('data-pid');
		var status = $(el).attr('data-status');
		var con = '<div class="btn-group" style="min-width: 160px;">';
		con += '<a class="btn" href="' + ADMINER_URL + '/manager_purview/edit/' + pid + '">修改</a>';
		if (status === 0) {
			con += '<a class="btn btn-success btn-status" data-status="1" data-pid="' + pid + '">启用</a>';
		} else {
			con += '<a class="btn btn-danger btn-status" data-status="0" data-pid="' + pid + '">禁用</a>';
		}
		con += '<a class="btn btn-danger btn-del" href="#" data-pid="' + pid + '">删除</a>';
		con += '</div>';

		// TODO: 处理在最右侧的位置为left

		$(el).parent('span').popover({
			trigger: 'click',
			placement: 'bottom',
			html: true,
			content: con
		});
	});

	$('li').delegate('.popover', 'mouseleave', function(e) {
		e.preventDefault();
		$(this).prev('span').popover('hide');
	});

	// TODO ajax del
	$('li').delegate('.popover a.btn-del', 'click', function(e) {
		e.preventDefault();
		var pid = $(this).attr('data-pid');
		var badge = $(this).parents('.popover').prev('.badge');
		bootbox.confirm('确认删除权限', function(result) {
			if (result) {
				url = ADMINER_URL + 'manager_purview/delete';
				ui.action_del(url, pid, badge);
			}
		});
	});

	// TODO ajax status change
	$('li').delegate('.popover a.btn-status', 'click', function(e) {
		e.preventDefault();
		var pid = $(this).attr('data-pid');
		var status = $(this).attr('data-status');
		var status_txt = $(this).text();
		var btn = $(this);
		var pur = $(this).parents('.popover').prev('.badge').children('a.pur');
		var url = ADMINER_URL + 'manager_purview/cg_status_ajax';

		(function(url, id, pur, btn) {
			$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						ids: id,
						status: status,
						_cfs: $.cookie('_cfc')
					}
				})
				.done(function(data) {
					if (data.status) {
						$.pnotify({
							title: "修改成功",
							text: "已经" + status_txt + '权限',
							type: "success",
							animation: 'fade'
						});
						if (status == 1) {
							pur.parent('span.badge').addClass('badge-success');
							btn.text('禁用');
							btn.removeClass('btn-success');
							btn.addClass('btn-danger');
							btn.attr('data-status', 0);
						} else {
							pur.parent('span.badge').removeClass('badge-success');
							btn.text('启用');
							btn.addClass('btn-success');
							btn.removeClass('btn-danger');
							btn.attr('data-status', 1);
						}
						pur.attr('data-status', status);
					} else {
						$.pnotify({
							title: "error!",
							text: data.msg,
							type: "error",
							animation: 'fade'
						});
					}
					console.log("success");
				})
				.fail(function(XMLHttpRequest, textStatus, errorThrown) {
					m = XMLHttpRequest.responseJSON;
					$.pnotify({
						title: "错误提示！",
						text: '500 error!',
						type: "error",
						animation: 'fade'
					});
				});
		})(url, pid, pur, btn);
	});
});
