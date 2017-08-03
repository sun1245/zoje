	// 获取当前不带后缀的页面名称
	var strUrl = location.href;
	var strUrl = strUrl.split("/");
	var strUrl = strUrl.slice(strUrl.length-1, strUrl.length).toString(String).split(".");
	var strPage = strUrl.slice(0, 1);

	// 创建和初始化地图函数：
	var markerArr = new Array();
	function initMap(){
		// 创建地图
		createMap();
        // 设置地图事件
        setMapEvent();
        // 向地图添加控件
        addMapControl();
        // 向地图中添加marker
        addMarker();
    }
    function initMaps(){
    	// 创建地图
    	createMap();
    	// 设置地图事件
    	setMapEvent();
        // 向地图添加控件
        addMapControl();
    }

    // 创建地图函数：
    function createMap(){
    	// 在百度地图容器中创建一个地图
    	var map = new BMap.Map("mapBox");
    	var localCity = new BMap.LocalCity();
    	localCity.get(function (r) {
    		map.centerAndZoom(r.center, 12);
    	});
        //将map变量存储在全局
        window.map = map;
    }

    // 地图事件设置函数：
    function setMapEvent(){
    	// 启用地图拖拽事件，默认启用(可不写)
    	map.enableDragging();
        // 启用地图滚轮放大缩小
        map.enableScrollWheelZoom();
        // 启用鼠标双击放大，默认启用(可不写)
        map.enableDoubleClickZoom();
        // 启用键盘上下左右键移动地图
        map.enableKeyboard();
    }

    // 地图控件添加函数：
    function addMapControl(){
    // 向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
    // 向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
    // 向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
}
function dealer(){
	var city_id=$("#sel_city").find('option:selected').val();
	var mkArr = new Array();
	$.ajaxSetup({
		async : false
	});

	$.getJSON('dealer/dealer_resion_map/'+city_id,function(json){
		var r = json.data;
		for(var i=0; i<json.data.length;i++){
			r=json.data[i];
			if(r.lal != ""){
					mkArr.push({id:r.id,title:r.title,mobile:r.mobile,telphone:r.telphone,address:r.address,point:r.lal,isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}) //标注点数组
				}
			}
		});
	markerArr = mkArr;
}
dealer();

    // 创建marker
    function addMarker(){
    	for(var i=0;i<markerArr.length;i++){
    		var json = markerArr[i];
    		var p0 = json.point.split(",")[0];
    		var p1 = json.point.split(",")[1];
    		var point = new BMap.Point(p0,p1);
    		var iconImg = createIcon(json.icon);
    		var marker = new BMap.Marker(point,{icon:iconImg});
    		var iw = createInfoWindow(i);
    		var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
    		marker.setLabel(label);
    		map.addOverlay(marker);
    		label.setStyle({
    			borderColor:"#808080",
    			color:"#333",
    			cursor:"pointer"
    		});

    		(function(){
    			var index = i;
    			var _iw = createInfoWindow(i);
    			var _marker = marker;
    			_marker.addEventListener("click",function(e){
    				this.openInfoWindow(_iw);
					// $("#msgContent").find("li").eq(index).find(".contF").css({
					//	"background":"#f5f5f5"
					// });
					$("#msgContent").find("li").eq(index).siblings().find(".contF").css({
						"background":"#ffffff"
					});
					markerTitleCont(index);
				});
    			_iw.addEventListener("open",function(){
    				_marker.getLabel().hide();
    			})
    			_iw.addEventListener("close",function(){
    				_marker.getLabel().show();
    			})
    			label.addEventListener("click",function(){
    				_marker.openInfoWindow(_iw);
    			})
    			if(!!json.isOpen){
    				label.hide();
    				_marker.openInfoWindow(_iw);
    			}
    		})();
    		addMsgContent(i);
    	}

    	nullCont()
    }
	// 添加内容信息
	function addMsgContent(i){
		var json = markerArr[i];
		var cont =
		'<li onclick="onMarker($(this))" data-id="'+json.id+'">'+
		'<div class="msgSign">'+
		'<div class="contF">'+
		'<h4>'+json.title+'</h4>'+
		'<p class="addr">联系方式：' + (json.telphone+ '<br>'+json.mobile) + '</p>'+
		'<p class="addr">地址：' + (json.address) + '</p>'+
		'<p style="margin-top:5px;"><a href="../joinus/'+json.id+'" class="mapbtn"> </a></p>'+
		'</div>'+
		'</div>'+
		'</li>'
		document.getElementById("msgContent").innerHTML += cont;
	}

	// 没有合适店铺
	function nullCont(){
		// if($("#msgContent").html().trim().length<=0){
			if($("#msgContent").html().length<=0){
				var cont =
				'<li onclick="onMarker($(this),event)">'+
				'<div class="msgSign">'+
				'<div class="contF">'+
				'<h4>暂无信息</h4>'+
				'</div>'+
				'</div>'+
				'</li>'
				document.getElementById("msgContent").innerHTML += cont;
			}
		}

	// 点击右边内容关联标注
	function onMarker(_this){
		var index = _this.index();
		$('.BMap_Marker').eq(index).click();
		// _this.find(".contF").css({
		//	"background":"#f5f5f5"
		// })
		_this.siblings().find(".contF").css({
			"background":"#ffffff"
		})
		msgTitleCont(_this);
		// 更换提示标语
		var sel_car= $("#sel_car").find("option:selected").val();
		if (sel_car != '0'){
			$("#select").show().siblings("#start").hide()
		}
	}

    // 创建InfoWindow
    function createInfoWindow(i){
    	var json = markerArr[i];
    	var mapTlStyle = '';
    	var tl = '<div class="map_logo"><div class="'+mapTlStyle+'"></div><span class="tl-name">' + json.title + '</span></div>'

    	var mapTlStyle = '';
    	var href = '';
    	var regionid = $("#sel_region").find("option:selected").val();
    	var cityid = $("#sel_city").find("option:selected").val();
    	var txt =
    	'<div class="contF" class="'+mapTlStyle+'">' +
    	'<span class="addr">联系方式：' + (json.telphone+ '<br>'+json.mobile) + '</span><br/>' +
    	'<span class="addr">地址：' + (json.address) + '</span>' +
    	'</div>';
    	var iw = new BMap.InfoWindow(tl+txt);
    	return iw;
    }
    // 创建一个Icon
    function createIcon(json){
    	var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
    	return icon;
    }
	// 清除标注
	function clearMarker(){
		map.clearOverlays();
		document.getElementById("msgContent").innerHTML = '';
	}

	// 添加标记
	function addMarkerBtn(){
		addMarker();
	}

	// 跳转地图中心
	function cityCenter(){
		var txt = $("#sel_city").find('option:selected').text();
		map.setCenter(txt);
	}

	// 从标注获取title
	function markerTitleCont(index){
		if(!document.getElementById("dealerid"))return;
		var $dealerid = $("#dealerid");
		var liVal = $("#msgContent li").eq(index).find("h4").text();

		// $dealername.val(liVal)
		var dealerid = $("#msgContent li").eq(index).attr("data-id");
		$dealerid.val(dealerid);
		$("#reserResultS").find("span").html(liVal);//zuof
	}

	// 从信息列表获取title
	function msgTitleCont(_this){
		if(!document.getElementById("dealerid"))return;
		// var dealerid = $("#dealerid");
		var liVal = _this.find("h4").text();
		// var dealerid = $("#msgContent li").eq(index).attr("data-id");
		// $dealerid.val(dealerid);
		$("#start").hide();
		$("#select").show();
		// zuof
		$("#reserResultS").find("span").html(liVal);
	}
