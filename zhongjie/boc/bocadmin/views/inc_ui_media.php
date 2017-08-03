
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
		<img src="{% =upload_url+it.thumb %}" alt="{% it.name %}">
	</a>
	{% }else{ %}
	<div class="unkownfile">
		<a href="{% =upload_url+it.url %}">
			{%  if(/zip$/.test(it.type)){ %}
			<img src="<?php echo static_file('img/media.zip.png') ?>" alt="" style="height:100%" />
			{% }else if(/^audio/.test(it.type)){ %}
			<img src="<?php echo static_file('img/media.audio.png') ?>" alt="" style="height:100%" />
			{% }else if(/^video/.test(it.type)){ %}
			<img src="<?php echo static_file('img/media.video.png') ?>" alt="" style="height:100%" />
			{% }else if(/doc|docx$/.test(it.type)){ %}
			<img src="<?php echo static_file('img/media.doc.png') ?>" alt="" style="height:100%" />
			{% }else if(/xls|xlsx$/.test(it.type)){ %}
			<img src="<?php echo static_file('img/media.xls.png') ?>" alt="" style="height:100%" />
			{% }else{ %}
			<img src="<?php echo static_file('img/media.file.png') ?>" alt="" style="height:100%" />
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
		<a href="#" class="pull-left btn-edit" data-crop="{% =it.id %}" title="编辑" ><i class="fa fa-pencil"></i></a>
		{% } %}
		<a href="#" class="pull-center btn-seo" data-seo="{% =it.id %}" title="SEO" ><i class="fa fa-info-circle"></i></a>
		<a href="#" class="pull-right btn-del" data-del="{% =it.id %}" title="删除"><i class="fa fa-times"></i></a>
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
		<img src="{% =upload_url+list[i].thumb %}" alt="{% list[i].name %}">
	</a>
	{% }else{ %}
	<div class="unkownfile">
		<a href="{% =upload_url+list[i].url %}" target="_blank">
			{%  if(/zip$/.test(list[i].type)){ %}
			<img src="<?php echo static_file('img/media.zip.png') ?>" alt="" style="height:100%" />
			{% }else if(/^audio/.test(list[i].type)){ %}
			<img src="<?php echo static_file('img/media.audio.png') ?>" alt="" style="height:100%" />
			{% }else if(/^video/.test(list[i].type)){ %}
			<img src="<?php echo static_file('img/media.video.png') ?>" alt="" style="height:100%" />
			{% }else if(/doc|docx$/.test(list[i].type)){ %}
			<img src="<?php echo static_file('img/media.doc.png') ?>" alt="" style="height:100%" />
			{% }else if(/xls|xlsx$/.test(list[i].type)){ %}
			<img src="<?php echo static_file('img/media.xls.png') ?>" alt="" style="height:100%" />
			{% }else{ %}
			<img src="<?php echo static_file('img/media.file.png') ?>" alt="" style="height:100%" />
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
		<a href="#" class="pull-left btn-edit" data-crop="{% =list[i].id %}" title="编辑" ><i class="fa fa-pencil"></i></a>
		{% } %}
		<a href="#" class="pull-center btn-seo" data-seo="{% =list[i].id %}" title="SEO" ><i class="fa fa-info-circle"></i></a>
		<a href="#" class="pull-right btn-del" data-del="{% =list[i].id %}" title="删除"><i class="fa fa-times" style='color:red;'></i></a>
		<div class="clearfix"></div>
	</div>
</div>
{% } %}
</script>

<?php

/* template
----------------------------------
<div class="btn-group">
	<span class="btn btn-success">
		<i class="icon-plus icon-white"></i>
		<span> <?php echo lang('upload_file') ?> </span>
		<input class="fileupload" type="file"  accept="image/png" multiple="" data-for="thumb">
		<input type="hidden" name="photo" class="form-upload" data-more=0>
	</span>
</div>
-----------------------------------
*/
 ?>

<!-- crop -->
<div id="crop-modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="ion-close"></i> </button>
		<h3> <i class="fa fa-crop"></i> 裁剪</h3>
	</div>
	<div class="modal-body seamless">
		<img id="crop-target" src="#" alt="" style='max-width:100%;max-height:100%;margin:5px;'>
		<div class="clearfilx"> </div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="crop-btn" data-fid="" >裁剪</a>
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
	</div>
</div> <!-- end modal -->

<!-- file seo -->
<div id="js-upload-seo-modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="ion-close"></i> </button>
		<h3> <i class="fa fa-info"></i> 文件详情：<span id="js-upload-seo-name"></span></h3>
	</div>
	<div class="modal-body seamless form-horizontal">
		<div class="control-group">
			<label class="control-label" for="js-upload-seo-title">标题</label>
			<div class="controls">
				<input type="text" id="js-upload-seo-title" value="">
				<span class="help-inline"></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="js-upload-seo-alt">ALT</label>
			<div class="controls">
				<input type="text" id="js-upload-seo-alt" value="">
				<span class="help-inline">当图片不显示时显示</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="js-upload-seo-text">简介</label>
			<div class="controls">
				<textarea id='js-upload-seo-text' rows='8' class='span4'></textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="js-upload-seo-save" data-fid="" >保存</a>
		<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
	</div>
</div> <!-- end modal -->
