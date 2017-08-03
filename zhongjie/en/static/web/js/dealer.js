/* 地图搜索内容栏 隐藏显示效果 */
$(function(){
	if(!document.getElementById("addrBox")){return}
	var $addrBox = $("#addrBox");
	var $mapMsgBox = $("#mapMsgBox");
	var $mapControlBtn = $("#mapControlBtn");
	$mapControlBtn.click(function(){
		var dataState = $(this).attr("data-state");
		if(parseInt(dataState,10)){
			$("#addrBox").animate({
				"right":-205
			},"show")
			$(this).attr("data-state",0).removeClass("on")
			$(this).animate({
				"left":641
			},"show")
		}else{
			$("#addrBox").animate({
				"right":13
			},300)
			$(this).animate({
				"left":423
			},300)
			$(this).attr("data-state",1).addClass("on")
		}
	})
})

/* 上下滚动效果 */
function scollBox()
{
	var oUl=document.getElementById('msgContent');
	var aLi=oUl.getElementsByTagName('li');
	var oWrap=document.getElementById('mapMsgBox');
	var boxHeight = oWrap.offsetHeight;
	var oUp=document.getElementById('mapTopBtn');
	var odown=document.getElementById("mapBottBtn");

function css(obj, attr, value)
{
	if(arguments.length==2)
	{
		if(attr!='opacity')
		{
			return parseInt(obj.currentStyle?obj.currentStyle[attr]:document.defaultView.getComputedStyle(obj, false)[attr]);
		}
		else
		{
			return Math.round(100*parseFloat(obj.currentStyle?obj.currentStyle[attr]:document.defaultView.getComputedStyle(obj, false)[attr]));
		}
	}
	else if(arguments.length==3)
		switch(attr)
		{
			case 'width':
			case 'height':
			case 'paddingLeft':
			case 'paddingTop':
			case 'paddingRight':
			case 'paddingBottom':
				value=Math.max(value,0);
			case 'left':
			case 'top':
			case 'marginLeft':
			case 'marginTop':
			case 'marginRight':
			case 'marginBottom':
				obj.style[attr]=value+'px';
				break;
			case 'opacity':
				obj.style.filter="alpha(opacity:"+value+")";
				obj.style.opacity=value/100;
				break;
			default:
				obj.style[attr]=value;
		}
	return function (attr_in, value_in){css(obj, attr_in, value_in)};
}

var FRAME_MOVE_TYPE={
	BUFFER: 1,
	FLEX: 2
};

function stopMove(obj)
{
	clearInterval(obj.timer);
}

function startMove(obj, oTarget, iType, fnCallBack, fnDuring)
{
	var fnMove=null;
	if(obj.timer)
	{
		clearInterval(obj.timer);
	}
	switch(iType)
	{
		case FRAME_MOVE_TYPE.BUFFER:
			fnMove=DoMoveBuffer;
			break;
		case FRAME_MOVE_TYPE.FLEX:
			fnMove=DoMoveFlex;
			break;
	}
	obj.timer=setInterval(function (){
		fnMove(obj, oTarget, fnCallBack, fnDuring);
	}, 30);
}

function DoMoveBuffer(obj, oTarget, fnCallBack, fnDuring)
{
	var bStop=true;
	var attr='';
	var speed=0;
	var cur=0;

	for(attr in oTarget)
	{
		cur=css(obj, attr);
		if(oTarget[attr]!=cur)
		{
			bStop=false;
			speed=(oTarget[attr]-cur)/15;
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			css(obj, attr, cur+speed);
		}
	}

	if(fnDuring)fnDuring.call(obj);

	if(bStop)
	{
		clearInterval(obj.timer);
		obj.timer=null;
		if(fnCallBack)fnCallBack.call(obj);
	}
}

function DoMoveFlex(obj, oTarget, fnCallBack, fnDuring)
{
	var bStop=true;
	var attr='';
	var speed=0;
	var cur=0;

	for(attr in oTarget)
	{
		if(!obj.oSpeed)obj.oSpeed={};
		if(!obj.oSpeed[attr])obj.oSpeed[attr]=0;
		cur=css(obj, attr);
		if(Math.abs(oTarget[attr]-cur)>=1 || Math.abs(obj.oSpeed[attr])>=1)
		{
			bStop=false;

			obj.oSpeed[attr]+=(oTarget[attr]-cur)/5;
			obj.oSpeed[attr]*=0.7;

			css(obj, attr, cur+obj.oSpeed[attr]);
		}
	}

	if(fnDuring)fnDuring.call(obj);

	if(bStop)
	{
		clearInterval(obj.timer);
		obj.timer=null;

		if(fnCallBack)fnCallBack.call(obj);
	}
}

	odown.onmousedown=function()
	{
		if(oUl.offsetHeight<boxHeight){
			return;
		}
		startMove(oUl,{top:-(oUl.offsetHeight-boxHeight)},FRAME_MOVE_TYPE.BUFFER);
		// oUl.style.top=-aLi[iNow].offsetHeight+'px';
	}
	odown.onmouseup=function()
	{
		stopMove(oUl);
	}
	oUp.onmousedown=function()
	{
		startMove(oUl,{top:0},FRAME_MOVE_TYPE.BUFFER);
	}
	oUp.onmouseup=function()
	{
		stopMove(oUl);
	}
}

/*zuof start*/
/*选择省份变动*/
function region_change(region,type){
	$("#addrBox").show();
	$.ajax({
		url:SITE_URL+'dealer/change_resion/'+region,
		async:false,
		type:'GET',
		success:function(rlt){
			$("#sel_city").html(rlt);
		}
	});
	jxs_change(type);
}
function jxs_change(type){
	var city_id=$("#sel_city").find('option:selected').val();

	if (type == '1')
	{
		$.ajax({
			url:SITE_URL+'dealer/jxs_resion/'+city_id+"/"+type,
			async:false,
			type:'GET',
			success:function(rlt){
				// alert(rlt);
				$("#sel_jxs1").html(rlt);
			}
		});
	}else{
		$.ajax({
			url:SITE_URL+'dealer/jxs_resion/'+city_id+"/"+type,
			async:false,
			type:'GET',
			success:function(rlt){
			// $("#mapMsgBox").html(rlt);
			}
		});
	}
	clearMarker();
	cityCenter();
	dealer();
	$("#msgContent").css("top",0);
	$("#start").show().siblings("#select").hide()
	addMarker();

}

function dealer_change(type){
	var city_id=$("#sel_city").find('option:selected').val();
	// alert(city_id)
	if (type == '1')
	{
		$.ajax({
			url:SITE_URL+'dealer/dealer_resion/'+city_id+"/"+type,
			async:false,
			type:'GET',
			success:function(rlt){
				$("#sel_jxs1").html(rlt);
			}
		});
	}else{
		$.ajax({
			url:SITE_URL+'dealer/dealer_resion/'+city_id+"/"+type,
			async:false,
			type:'GET',
			success:function(rlt){
				// alert(rlt);
				// $("#mapMsgBox").html(rlt);
			}
		});
	}
	change_modelId();
	clearMarker();
	cityCenter();
	dealer();
	$("#msgContent").css("top",0);
	$("#start").show().siblings("#select").hide()
	addMarker();

}
/*zuof end*/

/*jason start*/
function getProvinceOnline(region){
	$.ajax({
		url:SITE_URL+'dealer/change_resion/'+region,
		async:false,
		type:'GET',
		success:function(rlt){
			$("#sel_city").html(rlt);
		}
	});
	getServiceStat($("#sel_city").find('option:selected').val());
}

/*jason end*/