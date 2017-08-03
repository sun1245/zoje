<?php
$getmqq=get_config_site('site_x','mqq');
?>
<?php if($getmqq==1) {?>
<?php include_once VIEWS.'inc/qqbocweb.php'; ?>
<?php }elseif($getmqq==2) {?>
<?php include_once VIEWS.'inc/qqdrny.php'; ?>
<?php }elseif($getmqq==3) {?>
<?php include_once VIEWS.'inc/qqgoup.php'; ?>
<?php }elseif($getmqq==4) {?>
<?php include_once VIEWS.'inc/qqhousehold.php'; ?>
<?php } ?>

