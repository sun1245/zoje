<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<style>
.nf-main{
	width: 438px;
	height: 351px;
	position: absolute;
	left: 50%;
	top: 50%;
	margin: -175px 0 0 -219px;
}
</style>
<script>
$(function(){
	setTimeout(function(){
		window.location.href = '<?php echo site_url(); ?>';
	}, 5000)
})
</script>
</head>

<body>
	<div class="nf-main">
		<img src="<?php echo static_file('img/404.png'); ?> " alt="" width="438" height="351" usemap="#Map">
        <map name="Map">
            <area shape="rect" coords="165,245,277,289" href="<?php echo site_url(); ?>" >
        </map>
	</div>
</body>
</html>