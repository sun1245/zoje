(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS 规范
    module.exports = mod;
  else if (typeof define == "function" && define.amd) // AMD 规范
    return define(['jquery','tools'], mod);
  else // Plain browser env 浏览器
    mod($,tools);
})(function($,tools) {
// var $ = require(['jquery']);
// var tools = require(['tools']);
	// 对分页的链接添加处理
	if (!tools.isEmptyValue($('.pagination').toArray())) {
		$('.pagination>a ').each(function(index, el) {
			if ($(el).attr('href') != "#") {
				el.href += location.search;
			}
		});
	}

	// 验证码
	$('input[name="captcha"]').one('focusin', function(e) {
		var img = $(this).nextAll('img.captcha');
		if (tools.isEmptyValue(img)) {
			var imgStr = '<img src="' + SITE_URL + '/captchas?t=' + Math.random() * 10 +
				'" class="captcha" title="点击刷新"';
			if ($(this).attr('flg')) {
				imgStr += ' style="cursor:pointer; padding-left:145px"/>';
			} else {
				imgStr += ' style="cursor:pointer"/>';
			}
			$(this).after(imgStr);
		} else {
			if ($(img).attr('src') === "" || $(img).attr('src') === "#" || RegExp('blank.png').test($(img).attr('src'))) {
				$(img).attr('src', SITE_URL + '/captchas?t=' + Math.random() * 10);
			}
		}
	});

	// 验证码的实时验证
	// 让前端设定 input[name="captcha"] 的 .success 和 .error 的样式
	$('input[name="captcha"]').on('keyup', function(e) {
		var _self = $(this);
		var code = _self.val();
		// 长度应该 == 4
		if (code.length > 3 && code.length < 8 && !_self.attr('readonly')) {
			$.ajax({
					url: SITE_URL + '/captchas/verify',
					type: 'GET',
					dataType: 'json',
					data: {
						code: code
					}
				})
				.done(function(data) {
					console.log("success");
					if (data.status) {
						_self.removeClass('error').addClass('success');
						_self.next('img').remove();
						_self.attr('readonly', true);
						_self.nextAll('.captcha_no').remove();
						_self.after('<span class="captcha_ok" style="color:green;padding-left:0.8em;">&radic;</span>');
					} else {
						_self.removeClass('success').addClass('error');
						_self.nextAll('.captcha_ok').remove();
						_self.nextAll('.captcha_no').remove();
						_self.next().after(
							'<span class="captcha_no" style="color:red;padding-left:0.5em;font-size:1.2em;">&times;</span>');
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
		}
	});

	// 刷新验证码
	$(document).delegate('input[name="captcha"] ~ img.captcha', 'click', function(event) {
		$(this).attr('src', SITE_URL + '/captchas?t=' + Math.random() * 10);
	});

});
