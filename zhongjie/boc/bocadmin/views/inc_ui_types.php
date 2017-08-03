<?php
// 类型模板
// 通过templatejs 来实现绑定数据

function ui_coltypes_create($types=false){
	if (!is_array($types)) {
		return "<!--nothing-->";
	}
	$cid = 0;
	$CI =& get_instance();
	if (isset($CI->cid)) {
		$cid = $CI->cid;
	}
	$tmp = '<div class="btn-group">';
	foreach ($types as $field=> $title) {
		$tmp .='<a href="#" class="btn btn-info btn-coltypes" data-cid="'.$cid.'" data-field="'.$field.'" title="'.$title.'">'.$title.'</a>';
	}
	$tmp.='</div>';
	foreach ($types as $field=> $title) {
		$tmp .='<div id="js-coltypes-'.$field.'" class="js-modal-conltypes" >
<div class="modal hide fade">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
	<h3> <i class="fa fa-dot-circle-o"></i> '.$title.'</h3>
</div>
<div class="modal-body " >
<div id="js-coltypes-'.$field.'-body"></div>
<div class="clearfix"><p></p></div>
<div class="control-group">
<div class="input-prepend input-append">
  <span class="add-on">标题</span>
  <input class="span2" id="'.$field.'-title" type="text">
  <span class="add-on">值</span>
  <input class="span2" id="'.$field.'-value" type="text">
  <a href="#" class="btn js-coltypes-add" data-field="'.$field.'" data-cid="'.$cid.'"> 添加 </a>
</div>
</div>
</div>
<div class="modal-footer">
	<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger">'. lang('close').'</a>
</div>
</div>
</div>';
	}
	return $tmp;
}
?>
<?php echo static_file('adminer/js/inc_ui_types.js'); ?>
<!-- types -->
<script id="tpl-coltypes" type="text/html">
	<ul class="boxed-list select-list sort-list">
{% for (var i = list.length - 1; i >= 0; i--) { %}
	<li>
		<span>{% =list[i].id %} . </span>
		<span>{% =list[i].title %}  </span>
		<div class="btn-group pull-right">
		 	<a class="btn btn-small js-coltypes-edit" href="#" title="<?php echo lang('edit') ?>" data-id="{% =list[i].id %}" data-cid="{% =list[i].cid %}" data-field="{% =list[i].name %}">   <i class="fa fa-pencil"></i></a>
		 	<a class="btn btn-danger btn-small js-coltypes-del" href="#" title="<?php echo lang('del') ?>" data-id="{% =list[i].id %}" data-cid="{% =list[i].cid %}" data-field="{% =list[i].name %}"> <i class="fa fa-times"></i> </a>
		 </div>
	</li>
{% }; %}
	</ul>
</script>
