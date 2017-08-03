(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS 规范
    module.exports = mod;
  else if (typeof define == "function" && define.amd) // AMD 规范
    return define(['jquery','jquery.validate'], mod);
  else // Plain browser env 浏览器
    this.tools = mod();
})(function() {
	var tools = {};

	tools.check_cookie = function(){
		if(window.navigator.cookieEnabled)
			return true;
		else{
			alert("浏览器配置错误，Cookie不可用！");
			return false;
		}
	};

	tools.set_cookie = function(name,value){
	   var Days = 30; //此 cookie 将被保存 30 天
	   var exp = new Date(); //new Date("December 31, 9998");
	   exp.setTime(exp.getTime() + Days*24*60*60*1000);
	   document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	};

	tools.get_cookie = function(name)
	{
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		if(arr !== null){
			return unescape(arr[2]);
		}else{
			return null;
		}

		// var regexp = new RegExp("(?:^" + name + "|;\s*"+ name + ")=(.*?)(?:;|$)", "g");
		// var result = regexp.exec(document.cookie);
		// return (result === null) ? null : result[1];
	};

	tools.del_cookie = function(name)
	{
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var cval=getCookie(name);
		if(cval!==null){
			document.cookie= name + "="+cval+";expires="+exp.toGMTString();
		}
	};

	// 检测空对象
	// 空则返回true
	tools.isEmptyValue = function(value) {
		var type;
	    if(value === null) { // 等同于 value === undefined || value === null
	    	return true;
	    }
	    type = Object.prototype.toString.call(value).slice(8, -1);
	    switch(type) {
	    	case 'String':
	    	return !!$.trim(value);
	    	case 'Array':
	    	return !value.length;
	    	case 'Object':
	    	// return $.isEmptyObject(value);
	    	return !value.length;
	    	default:
	    	return false;
	    }
	};

	tools.isEmpty = function(v){
		if (v instanceof String) {
			var r = /^\s*$/;
			return r.test(v);
		}else if(v instanceof Array){
			return !v.length;
		}else if(v instanceof Object){
			return v === {};
		}else{
			return false;
		}
	};

	tools.is_set = function(value){
		if (typeof(value) == "undefined") {
			return false;
		}else{
			return true;
		}
	};

	// 解析URL路径
	tools.parseURL = function(url) {
		var a =  document.createElement('a');
		a.href = url;
		return {
			source: url,
			protocol: a.protocol.replace(':',''),
			host: a.hostname,
			port: a.port,
			query: a.search,
			params: (function(){
				var ret = [],
				seg = a.search.replace(/^\?/,'').split('&'),
				len = seg.length, i = 0, s;
				for (;i<len;i++) {
					if (!seg[i]) { continue; }
					s = seg[i].split('=');
					ret[i] = {"key":s[0],"val":s[1]};
				}
				return ret;
			})(),
			file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
			hash: a.hash.replace('#',''),
			path: a.pathname.replace(/^([^\/])/,'/$1'),
			relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
			segments: a.pathname.replace(/^\//,'').split('/')
		};
	};

	// TODO: url params change

	/**
	 * 图片头数据加载就绪事件
	 * @version	2011.05.27
	 * @author	TangBin
	 * @see		http://www.planeart.cn/?p=1121
	 * @param	{String}	图片路径
	 * @param	{Function}	尺寸就绪
	 * @param	{Function}	加载完毕 (可选)
	 * @param	{Function}	加载错误 (可选)
	 * @example imgReady('http://www.google.com.hk/intl/zh-CN/images/logo_cn.png', function () {
			alert('size ready: width=' + this.width + '; height=' + this.height);
		});
	 */
	tools.imgReady = (function () {
		var list = [];
		var intervalId = null;

		// 用来执行队列
		var tick = function () {
			var i = 0;
			for (; i < list.length; i++) {
				list[i].end ? list.splice(i--, 1) : list[i]();
			}
			!list.length && stop();
		};

		// 停止所有定时器队列
		var stop = function () {
			clearInterval(intervalId);
			intervalId = null;
		};

		return function (url, ready, load, error) {
			var onready, width, height, newWidth, newHeight,
				img = new Image();

			img.src = url;

			// 如果图片被缓存，则直接返回缓存数据
			if (img.complete) {
				ready.call(img);
				load && load.call(img);
				return;
			}

			width = img.width;
			height = img.height;

			// 加载错误后的事件
			img.onerror = function () {
				error && error.call(img);
				onready.end = true;
				img = img.onload = img.onerror = null;
			};

			// 图片尺寸就绪
			onready = function () {
				newWidth = img.width;
				newHeight = img.height;
				if (newWidth !== width || newHeight !== height ||
					// 如果图片已经在其他地方加载可使用面积检测
					newWidth * newHeight > 1024
				) {
					ready.call(img);
					onready.end = true;
				}
			};

			onready();

			// 完全加载完毕的事件
			img.onload = function () {
				// onload在定时器时间差范围内可能比onready快
				// 这里进行检查并保证onready优先执行
				!onready.end && onready();
				load && load.call(img);
				// IE gif动画会循环执行onload，置空onload即可
				img = img.onload = img.onerror = null;
			};

			// 加入队列中定期执行
			if (!onready.end) {
				list.push(onready);
				// 无论何时只允许出现一个定时器，减少浏览器性能损耗
				if (intervalId === null) intervalId = setInterval(tick, 40);
			};
		};
	})();

	// 一部加载页面对分页按钮处理 ,id 带有 #
	tools.load_page = function(_url,nodeId) {
		var _load_page = function(__url){
			$.ajax({
				url: __url,
				type: 'GET',
				dataType: 'html'
			})
			.done(function(data) {
				console.log("success");
				$(nodeId).html(data);
				$(nodeId+" .pagination a").each(function(index, el) {
					var elhref = $(el).attr('href');
					if ( elhref == '#' ) {
						elhref = __url;
						$(el).attr('data-href',__url);
					}else{
						$(el).attr('data-href',elhref);
					}
					$(el).attr('href','javascript:void(0)');
					// $(el).attr('href',"javascript:tools.load_page('"+elhref+"','"+nodeId+"')");
				});
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
		};

		_load_page(_url);

		$(nodeId).delegate('a[data-href]','click',function(){
			_load_page($(this).attr('data-href'));
		});
	};


	/**
	 * @brief 创建表单验证
	 * 注意引用  jquery.validate.js 和 jquery.validate.lang.cn.js
	 * @param frm  表单 Id
	 * @param rules 验证规则
	 */
	tools.make_validate = function(frm,rules,messages,inline){
		if (inline === 0) {
			inline = "block";
		}else{
			inline = "inline";
		}
		$('#'+frm).validate({
			ignore: ".ignore", // 忽略
			rules:rules,
			onchange: true,
			onblur: true,
			messages:messages,
			errorClass: "help-"+inline+" validate",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('success').addClass('error');
				$(element).removeClass('success').addClass('error');
				$(element).nextAll('span.validate').remove();
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error').addClass('success');
				$(element).removeClass('error').addClass('success');
				$(element).nextAll('span.validate').remove();
			},
			errorPlacement: function(error, element) {
				if (inline == "block") {
					error.appendTo(element.parents(".control-group"));
				}else{
					element.after(error);
				}
			}
		});
	};

	/**
	 * @brief 创建表单验证
	 	      带有返回函数, 可以验证后直接用ajax处理
	 * 注意引用  jquery.validate.js 和 jquery.validate.lang.cn.js
	 * @param frm  表单 Id
	 * @param rules 验证规则
	 */
	tools.make_validate_submit = function(frm,rules,messages,submit_fun,inline){
		if (inline === 0) {
			inline = "block";
		}else{
			inline = "inline";
		}
		$('#'+frm).validate({
			ignore: ".ignore", // 忽略
			rules:rules,
			onchange: true,
			onblur: true,
			messages:messages,
			errorClass: "help-inline validate",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('success').addClass('error');
				$(element).removeClass('success').addClass('error');
				$(element).nextAll('span.validate').remove();
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error').addClass('success');
				$(element).removeClass('error').addClass('success');
				$(element).nextAll('span.validate').remove();
			},
			errorPlacement: function(error, element) {
				if (inline == "block") {
					error.appendTo(element.parents(".control-group"));
				}else{
					element.after(error);
				}
			},
			submitHandler:function(form){
				submit_fun(form);
			}
		});
	};

	return tools;
});
