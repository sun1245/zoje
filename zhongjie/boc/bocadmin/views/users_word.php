<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>excel</title>
</head>
<body>
	申请时间： <?php echo $uinfo['timeline']; ?>
	<table border="1">
		<tr>
			<td>姓名:</td>
			<td><?php echo $uinfo['username']; ?></td>
			<td>昵称:</td>
			<td><?php echo $uinfo['nickname']; ?></td>
			<td>邮箱:</td>
			<td><?php echo $uinfo['email']; ?></td>
		</tr>
	</table>
</body>
</html>