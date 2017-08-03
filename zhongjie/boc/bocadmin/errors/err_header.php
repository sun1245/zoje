<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> <?php echo $heading; ?> </title>
	<?php 
	include_once LIBS_PATH.'helpers/funs_helper.php';
	echo static_file('bootstrap.css'); 
	?>	
	<!--[if lt IE 9]>    
		<?php echo static_file('jquery-1.10.2.js'); ?>
	<![endif]-->

	<!--[if gte IE 9]>
		<?php echo static_file('jquery-2.0.3.js'); ?>
	<![endif]-->

	<!--[if !IE]><!-->
		<?php echo static_file('jquery-2.0.3.js'); ?>
	<!--<![endif]-->
	<?php echo static_file('bootstrap.js'); ?>
	<style>
	.container{margin-top:20px;}
	</style>
</head>
<body>
<div class="container">