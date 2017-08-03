<!-- 检索分类 -->
<?php if ($ctype = list_coltypes($this->cid,0,'ctype')) { ?>
<form class="form-inline" action="<?php echo site_urlc($this->class.'/search/'.$this->cid); ?>" method="GET">
<?php 
if (isset($_GET['ctype']) AND is_numeric($_GET['ctype']) AND $_GET['ctype']) {
	echo ui_btn_select('ctype',set_value("ctype",$_GET['ctype']),$ctype);
}else{
	echo ui_btn_select('ctype',set_value("ctype"),$ctype);
}
?>
<input class="btn" type="submit" value="检索">
<a href="<?php echo site_urlc('coltypes/index/').'&field=ctype&rc='.$this->class; ?>" class="btn">分类管理</a>
</form>
<p></p>
<?php } ?>
