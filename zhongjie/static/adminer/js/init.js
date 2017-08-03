
define(['jquery','underscore','tools','adminer/js/ui','bootstrap','bootstrap-select','jquery.ui'],function($,_,tools,ui){

	return function(){

		// setTimeout(function () {
		// 	$('#sidebar-bg').css('height',$(document).height());
		// }, 1500);

		// $(window).on('resize',function(){
		// 		$('#sidebar-bg').css('height',$(document).height());
		// });

		$(window).on('scroll',function(){
			if ($('#sidebar-bg').height() !== $(document).height()) {
				$('#sidebar-bg').css('height',$(document).height());
			}
		});

		$.support.cors = true;

		// $('a[data-toggle]').dropdown();

		// 为 a 添加 tooltip提示
		$('.boxed a[title]').tooltip({placement:'bottom'});

		// inc_header.php
		// 栏目的标题搜索 #navbar #search-col
		$('#search-col').on('focus',function(){
			$(this).animate({width:"180"});
		}).on('focusout',function(){
			if (!$(this).val()) {
				$(this).animate({width:"45"});
			}
		}).on('click',function(){
			$(this).select();
		});

		// input select plugin
		if (!tools.isEmptyValue($('.bselect').toArray())){
			$('.bselect').selectpicker();
		}

		// modal 的拖动
		if (!tools.isEmptyValue($('.modal').toArray())){
			$( ".modal" ).draggable({ handle: ".modal-header" });
			$( ".modal .modal-header" ).disableSelection();
		}

		// 对分页的链接添加处理
		if (!tools.isEmptyValue($('.pagination').toArray())){
			$('.pagination>ul>li>a ').each(function(index, el) {
				if ($(el).attr('href') !="#") {
					el.href+=location.search;
				}
			});
		}

		// 为列表页面提供选择
		ui.btn_select_all();
		// switch开关
		ui.btn_switch();

		// ajax加载页面
		$('a[data-toggle="modal"].modal-link').on('click',function(event) {
			event.preventDefault();
			var url = $(this).attr('href');
			// 非本页
			if (parseInt(url.indexOf('#')) !== 0) {
				$.get(url, function(data) {
					$('<div class="modal hide fade modal-ajax">' + data + '</div>').modal();
				}).success(function() {
					$('input:text:first').focus();
				});
			}
		});

		$('div.modal-ajax').on("click",'[data-dismiss="modal"]',function(event){
			event.preventDefault();
			// $(this).parents('div.modal-ajax').remove();
			console.log($(this));
			$(this).remove();
		});

		// 消除无效图片
		// $('img[src^=undefined]').remove();

		// limit 对列表页的栏目数目limit
		$('#btn-limit').on('change',function(e) {
			var limit =$(this).val();
			// url 地址处理
			// url 地址处理
			var url = tools.parseURL(window.location.href);
			var query = '?';
			var params = _.filter(url.params,function(n){
				return n.key != 'limit';
			});
			params.push({"key":"limit","val":limit});
			query += _.map(params,function(n){
					return n.key+"="+n.val;
				}).join("&");
			window.location = location.pathname+query;
		});

		// 对.ui-checkbox 处理
		/*
		<div class="btn-group ui-checkbox" data-toggle="buttons-checkbox">
		<button type="button" class="btn active"> <input type="checkbox" name="auth[]" value="1" checked ?> class="hide"> text </button>
		...
		</div>
		*/
		$('.ui-checkbox').delegate('.btn', 'click', function(e){
			var chk = $(this).children('input[type="checkbox"]')[0];
			console.log(chk);
			if (chk.checked) {
				chk.checked = false;
			}else{
				chk.checked = true;
			}
		});

	};

});

function change_citys(region,cid,type){
	$.ajax({
		url:ADMINER_URL+'dealer/change_resion/'+region+'?c='+cid,
		async:false,
		type:'GET',
		success:function(rlt){
			// alert(rlt);
			// console.log(rlt);
			$("#cityid").html(rlt);
		}
	});
}