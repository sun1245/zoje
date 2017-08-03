define(['jquery', 'tools', 'jquery.validate.cn','jquery.cookie'], function($, tools) {
	// $.fn.validate = require('jquery.validate.cn');
	return function(urls) {

		var rules = {
			uname: {
				required: true
			},
			pwd: {
				required: true
			}
		};

		var messages = {
			uname: {
				required: '还未输入帐号'
			},
			pwd: {
				required: '还未输入密码'
			}
		};

		tools.make_validate('frm-login', rules, messages, 0);

		$('#btn-lostpass').on('click', function(event) {
			event.preventDefault();
			$('#login').animate({
				'marginLeft': '-800px',
				'opacity': '0'
			}, 600);
			$('#getpass').animate({
				'marginLeft': '-190px',
				'opacity': '1'
			}, 600);
		});

		$('#btn-login').on('click', function(event) {
			event.preventDefault();
			$('#getpass').animate({
				'marginLeft': '300px',
				'opacity': '0'
			}, 600);
			$('#login').animate({
				'marginLeft': '-190px',
				'opacity': '1'
			}, 600);
		});

		$('#btn-getpass').on('click', function(event) {
			event.preventDefault();

			$.ajax({
					url: urls.getpass,
					type: 'POST',
					dataType: 'json',
					data: {
						email: $('#email').val(),
						_cfs: $.cookie('_cfc')
					}
				})
				.done(function(data) {
					console.log('success');
					console.log(data);

					var status = 'alert-error';
					if (data.status === 1) {
						status = 'alert-success';
						$('#pass-msg').removeClass('alert-error');
						$('#pass-msg').addClass('alert-success');
					}

					$('#pass-msg').removeClass('hide');
					$('#pass-msg').children('div').html(data.msg);

				})
				.fail(function() {
					console.log('error');
				})
				.always(function() {
					console.log('complete');
				});

		});
	};

});
