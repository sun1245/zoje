<?php if (isset($pages)): ?>
<!-- 显示数量 -->
<div class="pull-right" style="margin-left:5px;"> 
<?php if (isset($_GET['limit'])) {
	$btn_limit = intval($_GET['limit']);
}else{
	$btn_limit = 15;
}
$btn_limits = array(15,30,50,100);
?>
<select id="btn-limit" class="span1 bselect">
<?php 
foreach ($btn_limits as $l):
	$select = $btn_limit == $l ? 'selected="selected"':'';
	$str = '<option value="'.$l.'" '.$select.' >'.$l.'</option>';
	echo $str;
endforeach; 
?>
</select>
</div>
<?php endif ?>
