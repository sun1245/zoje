require(['jquery', 'adminer/js/media'], function($, media) {

	// 第一次访问提示
	if ($.cookie('config-first') === undefined) {
		$.pnotify({
			title: "提示",
			text: "修改内容后回车即可完成",
			type: "info",
			delay: 3000
		});
		$.cookie('config-first', '1');
	}

	$('#configs .ajax-input').on({
		keyup: function(event) {
			var input = $(this);
			input.parent().next('.msg').text('').removeClass('text-error').removeClass('text-success');
			var keyCode = event.keyCode || event.which;
			if (keyCode == 13) {
				// bootbox.confirm("确认修改?",function(result){
				// if (result) {
				configs_set(input);
				// }
				// });
			} else {
				input.next('.ajax-edit').css({
					'display': 'block',
					'visibility': 'visible'
				});
			}
		},
		change: function() {
			var input = $(this);
			var txtinput = input.next('.ajax-edit');
			txtinput.css({
				'display': 'block',
				'visibility': 'visible'
			});
			$(this).addClass('alert');
		}
	});

	$('#configs .ajax-edit').on('click', function(event) {
		event.preventDefault();
		var input = $(this).prev('.ajax-input');
		configs_set(input);
	});

	// 主题设置
	$('#theme-select').on('change', function(event) {
		event.preventDefault();
		$.cookie('theme', $(this).val());
		window.location.reload();
	});

	$('#js-theme-select span').on('click', function(event) {
		event.preventDefault();
		$.cookie('theme', $(this).attr('data-value'));
		window.location.reload();
	});

	// 不使用水印
	$('#remove-watermark').on('click', function(event) {
		event.preventDefault();
		var input = $('#watermark');
		var id = input.val();
		if (id > 1) {
			media.del(id);
			input.val(0);
			configs_set(input);
		}
	});

	// 切换按钮html
	$('#btn-switch-html').delegate('a[data-value]', 'click', function(e) {
		e.preventDefault();
		var input = $(this);
		$(this).parent().children('a').removeClass('btn-primary');
		input.addClass('btn-primary');
		var oj = {
			category: 'html',
			key: 'html',
			value: input.attr('data-value'),
			input: input,
			label: input.prev('label').text(),
			edit: input.next('.ajax-edit'),
			msg: input.next().next('.msg')
		};
		configs_set(oj);
	});

	$('#urlmodel').on('change', function(event) {
		event.preventDefault();
		/* Act on the event */
		var input = $(this);
		var oj = {
			category: 'html',
			key: 'urlmodel',
			value: input.val(),
			input: input,
			label: input.prev('label').text(),
			edit: input.next('.ajax-edit'),
			msg: input.next().next('.msg')
		};
		configs_set(oj);
	});


	function oj_create(input) {
		var oj = {
			category: input.attr('data-category'),
			key: input.attr('name'),
			value: input.val(),
			input: input,
			label: input.prev('label').text(),
			edit: input.next('.ajax-edit'),
			msg: input.next().next('.msg')
		};
		return oj;
	}

	// ajax 配置
	function configs_set(input) {
		var oj;
		// 对特殊值的处理
		// if(input[0] && input[0].hasOwnProperty && (input[] instanceof Node) )
		if (input instanceof Node || input[0] instanceof Node) {
			oj = oj_create(input);
		} else {
			oj = input;
		}
		$.ajax({
				url: $('#config_set').val(),
				type: 'POST',
				dataType: 'JSON',
				data: {
					category: oj.category,
					key: oj.key,
					value: oj.value,
					_cfs: $.cookie('_cfc')
				}
			})
			.done(function(data) {
				console.log("success");
				if (data.status == 1) {
					oj.input.removeClass('alert');
					oj.edit.hide();
					oj.msg.text(data.msg).addClass('text-success');
					status = 'success';
				} else {
					oj.input.removeClass('alert');
					oj.msg.text(data.msg).addClass('text-error');
					oj.edit.hide();
					status = 'error';
				}
				$.pnotify({
					title: oj.label,
					text: data.msg,
					type: status,
					delay: 3000
				});
			})
			.fail(function(XMLHttpRequest, textStatus, errorThrown) {
				var m = XMLHttpRequest.responseJSON;
				$.pnotify({
					title: "错误提示！",
					text: m.msg,
					type: "error",
					animation: 'fade'
				});
			})
			.always(function() {
				console.log("complete");
			});
	}

	// TODO::  对上传后的处理
	function media_done(tdata, input_name) {
		configs_set($('#' + input_name));
		// console.log(tdata.it.id);
		$('#watermark').val(tdata.it.id);
		$('#remove-watermark').show("fast");
		$('#watermark-nofile').hide();
	}

	// 删除后处理
	function media_delete(id, input_name) {
		$('#watermark').val(0);
		configs_set($('#' + input_name));
		$('#remove-watermark').hide("fast");
		// $('#watermark-nofile').show();
	}

	media.init(media_done, media_delete);
  if (typeof watermark_data !== "undefined") {
    media.show(watermark_data,'watermark');
  }

});
