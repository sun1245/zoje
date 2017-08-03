<?php
$CI->load->model('webmodels_model','mwebmodels');
$mdinfo = $CI->mwebmodels->get_one(array('mid'=>1),'type_id');
?>
<?php
$type_id=$mdinfo['type_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php echo static_file ('web/css/news'.$mdinfo['type_id'].'.css'); ?>
</head>
<body>
	<?php if($type_id==1) {?>
	<?php include_once VIEWS.'news/news1.php'; ?>
	<?php }elseif($type_id==2){?>
	<?php include_once VIEWS.'news/news2.php'; ?>
	<?php }elseif($type_id==3){?>
	<?php include_once VIEWS.'news/news3.php'; ?>
	<?php }elseif($type_id==4){?>
	<?php include_once VIEWS.'news/news4.php'; ?>
	<?php }elseif($type_id==5){?>
	<?php include_once VIEWS.'news/news5.php'; ?>
	<?php }elseif($type_id==6){?>
	<?php include_once VIEWS.'news/news6.php'; ?>
	<?php }elseif($type_id==7){?>
	<?php include_once VIEWS.'news/news7.php'; ?>
	<?php } ?>
</body>
</html>

