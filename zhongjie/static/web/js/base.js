




window._bd_share_config={
	"common":
	{
		"bdSnsKey":{

		},
		"bdText":"",
		"bdMini":"2",
		"bdMiniList":false,
		"bdPic":"",
		"bdStyle":"0",
		"bdSize":"16"
		},
		"share":{

			},
		"selectShare":
		{
			"bdContainerClass":null,
			"bdSelectMiniList":["qzone","tsina","weixin"]
		}
	};
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];


$(function(){
	$('.slidetop .slidetop_txt').click(function(){
		$('html,body').animate({'scrollTop':0},500)
	})
})

/*通过缩放处理手机页面大小调整*/
function initzoom(){
	var clientWidth = document.documentElement.clientWidth || document.body.clientWidth;
	var zoom;
	if (clientWidth < 380) {
			zoom = clientWidth / 260;
		}
	if (clientWidth < 480  && clientWidth > 380) {
		zoom = clientWidth / 310;
	}
	if (clientWidth < 640  && clientWidth > 480) {
		zoom = clientWidth / 380;
	}
	if (clientWidth < 850 && clientWidth > 640) {
		zoom = clientWidth / 480;
	}
	if (clientWidth < 1200 && clientWidth > 850) {
		zoom = clientWidth / 600;
	}
	
	
	window.zoom = zoom / 2;
	document.write('<style id="htmlzoom">html{font-size:' + (zoom * 50) + 'px;}</style>');
	window.addEventListener('resize', function() {
		clientWidth = document.documentElement.clientWidth || document.body.clientWidth;
		// zoom = clientWidth / 320;
		if (clientWidth < 380) {
			zoom = clientWidth / 260;
		}
		if (clientWidth < 480  && clientWidth > 380) {
			zoom = clientWidth / 310;
		}
		if (clientWidth < 640  && clientWidth > 480) {
			zoom = clientWidth / 380;
		}
		if (clientWidth < 850 && clientWidth > 640) {
			zoom = clientWidth / 480;
		}
		if (clientWidth < 1200 && clientWidth > 850) {
			zoom = clientWidth / 600;
		}
		
		// if (clientWidth < 1024) {
		// 	zoom = clientWidth / 512;
		// }
		window.zoom = zoom / 2;
		document.getElementById('htmlzoom').innerHTML = 'html{font-size:' + (zoom * 50) + 'px;}';
	});
}
initzoom();












