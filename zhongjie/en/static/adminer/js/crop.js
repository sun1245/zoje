// "use strict";
define(['jquery', 'tools', 'bootstrap', 'jquery.Jcrop'], function($, tools) {

	var imgCrop = {};

	imgCrop.showCoords = function(c) {
		imgCrop.w = c.w;
		imgCrop.h = c.h;
		imgCrop.x1 = c.x;
		imgCrop.x2 = c.x2;
		imgCrop.y1 = c.y;
		imgCrop.y2 = c.y2;
	};

	imgCrop.clearCoords = function(c) {};

	imgCrop.init = function(url) {
    if (imgCrop.jcrop_api !== undefined ) {
      imgCrop.jcrop_api.destroy();
    }
		$('#crop-target').Jcrop({
			onChange: imgCrop.showCoords,
			onSelect: imgCrop.showCoords,
			onRelease: imgCrop.clearCoords
		},function(){
      imgCrop.jcrop_api = this;
    });
	};

	$('.js-img-list-f').delegate('.js-goal a[data-crop]', 'click', function(e) {
		e.preventDefault();
		var fid = $(this).data('crop');
		$('#crop-btn').attr('data-fid', fid);

		$.getJSON(UPLOADDO_URL + 'get_ajax/' + fid)
			.done(function(data) {
				img_url = UPLOAD_URL + data.url;
				var tmp_url = img_url + '?n=' + Math.random() * 100;
				$('#crop-target').attr('src', tmp_url);
				$('#crop-modal').modal();
        imgCrop.init();
			});
	});

	$('#crop-btn').on('click', function(e) {

		if ($.isNumeric(imgCrop.w)) {
			var d = {};

			d.x = imgCrop.x1;
			d.y = imgCrop.y1;
			d.w = imgCrop.w;
			d.h = imgCrop.h;
			d.fid = $(this).attr('data-fid') - 0;

			$.ajax({
					url: UPLOADDO_URL + 'gd_ajax',
					type: 'GET',
					dataType: 'json',
					data: d
				})
				.done(function(data) {
					console.log("success");
					if (data.status == 1) {
						// bootbox.alert(data.msg);
						$.pnotify({
							title: '裁剪',
							text: data.msg,
							type: 'success',
							animation: 'fade'
						});
						tmp_url = img_url + '?n=' + Math.random() * 100;
    				$('#crop-target').attr('src', tmp_url);
            imgCrop.init();
						$('#crop-modal').modal('hide');
					} else {
						bootbox.alert("<span class='text-error'>" + data.msg + "</span>");
					}
				})
				.fail(function(XMLHttpRequest, textStatus, errorThrown) {
					var m = XMLHttpRequest.responseJSON;
					$.pnotify({
						title: "错误提示！",
						text: m.msg,
						type: "error",
						animation: 'fade'
					});
					$('#' + domf).after(ui.alert('访问数据列表错误 ：<br />' + m));
				})
				.always(function() {
					console.log("complete");
				});

		} else {
			bootbox.alert('你还没有任何的裁剪。');
		}

	});


	return function() {

	};

});
