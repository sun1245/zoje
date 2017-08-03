
<div id="upload-modal" class="hide">
	<div class="upload-header">
		<span class="pull-left"> <i class="fa fa-upload"></i> 上传 </span>
		<span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<a href="#" class="upload-close pull-right"> <i class="fa fa-times"></i> </a>
		<div class="clear"></div>
	</div>
	<div class="progress"><div class="progress-bar progress-bar-success bar"></div></div>
	<ul class="boxed-list" id="js-upload-list-f">
	</ul>
	<!-- 模板 -->
	<script id="tpl-upload-list" type="text/html">
		{% for(i = 0; i < list.length; i ++) { %}
		<li class='js-goal'>
			<span class="name"><a href="{% =upload_url+list[i].url %}"  class="fancybox-img" title="{% =list[i].name %}">{% =list[i].name %}</a></span>
			<span class="type"> {% =list[i].type %} </span>
			<span class="size"> {% =list[i].size %} KB </span>
			<span class="pull-right"><a href="#" class="btn-del" data-del="{% =list[i].id %}">删除</a></span>
		</li>
		{% } %}
	</script>
</div>

<!-- 单个模板 -->
<script id="tpl-photo-show" type="text/html">
	<div class="photos-list img-list js-goal pull-left" data-id="{% =it.id %}" data-thumb="{% =it.thumb %}" >
		{%  if(/^image/.test(it.type)){ %}
		<a href="{% =upload_url+it.url %}" class="fancybox-img">
			<img src="{% =upload_url+it.thumb %}" alt="{% it.name %}" height="80px;">
		</a>
		{% }else{ %}
		<div class="unkownfile">
			<a href="{% =upload_url+it.url %}">
				{%  if(/zip$/.test(it.type)){ %}
				<img src="<?php echo static_file('img/media.zip.png') ?>" alt="" style="height:80px" />
				{% }else if(/^audio/.test(it.type)){ %}
				<img src="<?php echo static_file('img/media.audio.png') ?>" alt="" style="height:80px" />
				{% }else if(/^video/.test(it.type)){ %}
				<img src="<?php echo static_file('img/media.video.png') ?>" alt="" style="height:80px" />
				{% }else if(/doc|docx$/.test(it.type)){ %}
				<img src="<?php echo static_file('img/media.doc.png') ?>" alt="" style="height:80px" />
				{% }else if(/xls|xlsx$/.test(it.type)){ %}
				<img src="<?php echo static_file('img/media.xls.png') ?>" alt="" style="height:80px" />
				{% }else{ %}
				<img src="<?php echo static_file('img/media.file.png') ?>" alt="" style="height:80px" />
				{% } %}

				<!-- {% if (it.title){  %}
				{% =it.title %}
				{% }else{ %}
				{% =it.type %}
				{% } %} -->
			</a>
		</div>
		{% } %}

		<div class="img-list-action">
			{%  if(it.type.match("^image")){ %}

			{% } %}
			<a href="#" class="pull-center btn-seo" data-seo="{% =it.id %}" title="名称" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>
			<a href="#" class="pull-right btn-del" data-del="{% =it.id %}" title="删除"><i class="fa fa-times" style='color:red;'></i></a>
			<div class="clearfix"></div>
		</div>
	</div>
</script>


<!-- 多个显示模板 -->
<script id="tpl-photos-show" type="text/html">
	{% for(i = 0; i < list.length; i ++) { %}
	<div class="img-list js-goal pull-left" data-id="{% =list[i].id %}" data-thumb="{% =list[i].thumb %}" >
		{%  if(/^image/.test(list[i].type)){ %}
		<a href="{% =upload_url+list[i].url %}" class="fancybox-img">
			<img src="{% =upload_url+list[i].thumb %}" alt="{% list[i].name %}" height="80px;">&nbsp;&nbsp;
		</a>
		{% }else{ %}
		<div class="unkownfile">
			<a href="{% =upload_url+list[i].url %}" target="_blank">
				{%  if(/zip$/.test(list[i].type)){ %}
				<img src="<?php echo static_file('img/media.zip.png') ?>" alt="" style="height:80px" />
				{% }else if(/^audio/.test(list[i].type)){ %}
				<img src="<?php echo static_file('img/media.audio.png') ?>" alt="" style="height:80px" />
				{% }else if(/^video/.test(list[i].type)){ %}
				<img src="<?php echo static_file('img/media.video.png') ?>" alt="" style="height:80px" />
				{% }else if(/doc|docx$/.test(list[i].type)){ %}
				<img src="<?php echo static_file('img/media.doc.png') ?>" alt="" style="height:80px" />
				{% }else if(/xls|xlsx$/.test(list[i].type)){ %}
				<img src="<?php echo static_file('img/media.xls.png') ?>" alt="" style="height:80px" />
				{% }else{ %}
				<img src="<?php echo static_file('img/media.file.png') ?>" alt="" style="height:80px" />
				{% } %}
				<!-- {% if (list[i].title){  %}
				{% =list[i].title %}
				{% }else{ %}
				{% =list[i].type %}
				{% } %} -->
			</a>
		</div>
		{% } %}
		<div class="img-list-action">
			{%  if(list[i].type.match("^image")){ %}

			{% } %}
			<a href="#" class="pull-center btn-seo" data-seo="{% =list[i].id %}" title="名称" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>
			<a href="#" class="pull-right btn-del" data-del="{% =list[i].id %}" title="删除"><i class="fa fa-times" style='color:red;'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			<div class="clearfix"></div>
		</div>
	</div>
	{% } %}
</script>
<div id="js-upload-seo-modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="ion-close"></i> </button>
		<h3> <i class="fa fa-info"></i> 文件：<span id="js-upload-seo-name"></span></h3>
	</div>
	<div class="modal-body seamless form-horizontal">
		<div class="control-group">
			<label class="control-label" for="js-upload-seo-title">名称</label>
			<div class="controls">
				<input type="text" id="js-upload-seo-title" value="">
				<span class="help-inline"></span>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="js-upload-seo-save" data-fid="" >保存</a>
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger">关闭</a>
	</div>
</div>


<style type="text/css">
	.modal-backdrop.fade.in{
		background:-webkit-radial-gradient(center, rgba(127,127,127,0.32), rgba(127,127,127,0.4) 35%, rgba(0,0,0,0.65));opacity:initial;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";filter:alpha(opacity=30);opacity:.3
	}
	.modal-backdrop {
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1040;
		background-color: #000000;
	}
	.modal-backdrop.fade {
		opacity: 0;
	}
	.modal-backdrop,
	.modal-backdrop.fade.in {
		opacity: 0.8;
		filter: alpha(opacity=80);
	}
	.modal.fade.in {
		top: 10%;
	}
	.modal.fade.in{top:25%}
	.modal.fade {
		top: -25%;
		-webkit-transition: opacity 0.3s linear, top 0.3s ease-out;
		-moz-transition: opacity 0.3s linear, top 0.3s ease-out;
		-o-transition: opacity 0.3s linear, top 0.3s ease-out;
		transition: opacity 0.3s linear, top 0.3s ease-out;
	}
	.fade.in {
		opacity: 1;
	}
	.modal{border:1px solid rgba(194,184,184,0.3);left:41%;width:770px;border-radius:3px}
	.hide {
		display: none;
	}
	.modal {
		position: fixed;
		top: 10%;
		left: 50%;
		z-index: 1050;
		width: 560px;
		margin-left: -280px;
		background-color: #ffffff;
		border: 1px solid #999;
		border: 1px solid rgba(0, 0, 0, 0.3);
		*border: 1px solid #999;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		outline: none;
		-webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		-webkit-background-clip: padding-box;
		-moz-background-clip: padding-box;
		background-clip: padding-box;
	}
	.fade {
		opacity: 0;
		-webkit-transition: opacity 0.15s linear;
		-moz-transition: opacity 0.15s linear;
		-o-transition: opacity 0.15s linear;
		transition: opacity 0.15s linear;
	}
	.modal .modal-header{cursor:move}
	.modal-header {
		padding: 9px 15px;
		border-bottom: 1px solid #eee;
	}
	.modal-header .close {
		margin-top: 2px;
	}
	button.close {
		padding: 0;
		cursor: pointer;
		background: transparent;
		border: 0;
		-webkit-appearance: none;
	}
	.close {
		float: right;
		font-size: 20px;
		font-weight: bold;
		line-height: 20px;
		color: #000000;
		text-shadow: 0 1px 0 #ffffff;
		opacity: 0.2;
		filter: alpha(opacity=20);
	}
	.modal-header h3 {
		margin: 0;
		line-height: 30px;
	}
	.seamless{padding:0}
	.modal-body {
		position: relative;
		max-height: 400px;
		overflow-y: auto;
	}
	.form-horizontal .control-group:last-child{border-bottom:0}
	.form-horizontal .control-group{border-top:1px solid #ffffff;border-bottom:1px solid #eeeeee;margin-bottom:0}
	.form-horizontal .control-group {
		margin-bottom: 20px;
		*zoom: 1;
	}
	.control-group {
		margin-bottom: 10px;
	}
	.form-horizontal .control-label{padding-top:10px;width:100px}
	.form-horizontal .control-label {
		float: left;
		width: 160px;
		text-align: right;
	}
	.form-horizontal .controls{padding-top:10px;padding-bottom:5px;margin-left:110px}
	.form-horizontal .controls {
		*display: inline-block;
		*padding-left: 20px;
		margin-left: 180px;
		*margin-left: 0;
	}
	.form-horizontal .controls>input{margin-top:-5px}
	.help-inline {
		display: inline-block;
		*display: inline;
		padding-left: 5px;
		vertical-align: middle;
		*zoom: 1;
	}
	.modal .modal-footer{border-radius:0 0 3px 3px}
	.modal-footer {
		padding: 14px 15px 15px;
		margin-bottom: 0;
		text-align: right;
		background-color: #f5f5f5;
		border-top: 1px solid #ddd;
		-webkit-border-radius: 0 0 6px 6px;
		-moz-border-radius: 0 0 6px 6px;
		border-radius: 0 0 6px 6px;
		*zoom: 1;
		-webkit-box-shadow: inset 0 1px 0 #ffffff;
		-moz-box-shadow: inset 0 1px 0 #ffffff;
		box-shadow: inset 0 1px 0 #ffffff;
	}
	.btn {
		display: inline-block;
		*display: inline;
		padding: 4px 12px;
		margin-bottom: 0;
		*margin-left: .3em;
		font-size: 14px;
		line-height: 20px;
		color: #333333;
		text-align: center;
		cursor: pointer;
		text-decoration: none;
		vertical-align: middle;
		cursor: pointer;
		background-color: #f5f5f5;
		border:0;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
		*zoom: 1;
		-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
		-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
		box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
		-webkit-transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
		transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
	}

	.modal-footer .btn + .btn {
		margin-bottom: 0;
		margin-left: 5px;
	}

	.btn-danger {
		color: rgba(255, 255, 255, 0.84);
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		background-color: #f44336;
	}

	#js-upload-seo-title {
		background-color: #ffffff;
		border: 1px solid #cccccc;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		-webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
		-moz-transition: border linear 0.2s, box-shadow linear 0.2s;
		-o-transition: border linear 0.2s, box-shadow linear 0.2s;
		transition: border linear 0.2s, box-shadow linear 0.2s;
		display: inline-block;
		margin-bottom: 0;
		vertical-align: middle
	}

	#js-upload-seo-title:focus {
		border-color: rgba(82, 168, 236, 0.8);
		outline: 0;
		outline: thin dotted \9;
		/* IE6-9 */
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
		-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
	}
</style>

