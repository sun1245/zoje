<?php
$searchkey='';
if(!empty($this->input->get('searchkey'))){
	$searchkey=$this->input->get('searchkey');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
	<h1 align='center'>搜索Search</h2>
		<div id="list-shownews"></div>
		<div id="list-showpro"></div>
		<div id="list-showrecruit"></div>
	</body>

	<script>
		$(function(){
			// 新闻
			var newslist_url = "<?php echo site_url('ajax/searchnews?searchkey='.$searchkey);?>";
			tools.load_page(newslist_url, "#list-shownews");
			// 产品
			var prolist_url = "<?php echo site_url('ajax/searchpro?searchkey='.$searchkey);?>";
			tools.load_page(prolist_url, "#list-showpro");
			// 招聘
			var recruit_url = "<?php echo site_url('ajax/searchrecruit?searchkey='.$searchkey);?>";
			tools.load_page(recruit_url, "#list-showrecruit");
		});
	</script>

	</html>

