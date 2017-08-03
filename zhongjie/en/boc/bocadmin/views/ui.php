<?php if (ielt9()): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php else: ?><!DOCTYPE HTML><?php endif ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<!-- Force latest IE rendering engine or ChromeFrame if installed -->
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<![endif]-->
		<meta http-equiv="content-language" content="zh-CN" />
		<title>UI test</title>
		<meta name="copyright" content="2012" />
		<link rel="shortcut icon" href="<?php echo STATIC_URL; ?>favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo STATIC_URL; ?>favicon.ico" mce_href="favicon.ico" type="image/x-icon">
		<link rel="canonical" href="/"/>
		<meta name="author" content="boc" />
		<meta name="robots" content="deny" />
		<script type="text/javascript" charset="utf-8">
		//  初始化路径
		var STATIC_URL  = "<?php echo STATIC_URL  ?>" ;
		var STATIC_VER = "<?php echo STATIC_V ?>";
		<?php
		if ($this->config->item('index_page')) {
		?>
		var ADMINER_URL = "<?php echo ADMINER_URL.$this->config->item('index_page') ?>/" ;
		var UPLOADDO_URL = "<?php echo ADMINER_URL.$this->config->item('index_page').'/upload/'?>";
		<?php
		}else{
		?>
		var ADMINER_URL = "<?php echo ADMINER_URL ?>" ;
		var UPLOADDO_URL = "<?php echo ADMINER_URL.'/upload/'?>";
		<?php
		};
		?>
		var UPLOAD_URL  = "<?php echo UPLOAD_URL ?>" ;
		var mime = ["video/*","image/*"];
		var	today = "<?php echo datetime_now(false); ?>";
		</script>
		<?php
		// echo static_file('normalize.css');
		echo static_file('adminer/css/ui.css');

		if (isset($_COOKIE['theme']) and strtolower($_COOKIE['theme']) != 'default' ) {
			echo static_file('adminer/css/theme-'.strtolower($_COOKIE['theme']).'.css');
		}

		echo static_file('require.js');
		echo static_file('require.config.js');
		?>
		<script charset="utf-8">
		require(['adminer/js/init'],function(init){
			init();
		});
		</script>
		<!--[if IE 6]>
		<?php echo static_file('bootstrap-ie6.css') ?>
		<?php //echo static_file('bootstrap-ie6.js') ?>
		<![endif]-->
		<!--[if IE 7]>
		<?php echo static_file('font-awesome-ie7.min.css') ?>
		<![endif]-->
		<!-- 提供HTML5支持 Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<?php //echo static_file('IE9.js'); ?>
		<?php
			echo static_file('html5.js');
			echo static_file('respond.js');
			echo static_file('modernizr.js');
		?>
		<![endif]-->
	</body>
	</head>
	<body>


	<div id="body-main">
		<!-- nav bar -->
		<div class="navbar" id="body-navbar">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav-logo pull-left">
						<li>
							<a href="http://www.bocweb.cn/" target="_blank"><img src=" <?php echo static_file('boclogo.png') ?>"></a>
						</li>
						<li>
							<a  href="<?php echo site_url() ?>"> <?php echo $this->config->item('title_suffix'); ?> </a></li>
					</ul>
					<ul class="nav pull-right">
						<?php // 搜索栏目中的标题  ?>
						<?php if (isset($_GET['c']) and !in_array($this->class, array('columns','page'))): ?>
						<li>
							<?php // TODO: search of columns title list ?>
							<?php echo form_open(site_urlc($this->class.'/search'),array("method"=>"get","id"=>"frm-top-search")); ?>
								<input type="hidden" name="c" value="<?php echo $this->cid ?>">
								<input name="q" id="search-col" style="width:45px;margin-top: 5px;" type="text" class="search-query typeahead" title="搜索页面" value="<?php echo $this->input->get('q') ?>" placeholder="<?php echo lang('search')?> " x-webkit-speech lang="zh-CN" data-provide="typeahead" data-items="4" data-source='[]' autocomplete="off" />
							</form>
						</li>
						<?php endif ?>
						<li>
						 	<a href="<?php echo GLOBAL_URL ?>" target="_blank"> <span class="fa fa-globe"></span> <?php echo lang('nav_see_site'); ?> </a>
						</li>

						<li class="dropdown">
							<a class="dropdown-toggle"data-toggle="dropdown"href="#" ><i class="fa fa-user"></i> <?php echo $this->session->userdata('nickname'); ?><b class="caret"></b> </a>
							<ul class="dropdown-menu" style="width: 99px; min-width: 114px;">
								<li> <a href="<?php echo site_url('manager/edit/')?>/<?php echo $this->session->userdata('mid') ?>"> <i class="fa fa-user"></i> 设置账户 </a>
								</li>
								<li> <a href="<?php echo site_url('manager/passwd')?>"> <i class="fa fa-key"></i> 重设密码</a> </li>
							</ul>
						</li>
						<!-- <li><a href="<?php echo site_url('msgs') ?>" style="border: 1px solid #ccc;border-width: 0 1px;padding-left: 5px;padding-right: 5px;"><i class="icon-envelope"></i> <?php echo $this->config->item('msgs_num'); ?> </a></li> -->
						<li> <a href="<?php echo site_url('login/logout')?>"><i class='fa fa-sign-out'></i> <?php echo lang('logout') ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end .navbar #body-navbar -->


			<!-- sidebar background 侧边栏背景 -->
			<div id="sidebar-bg"></div>
		<div class="container-fluid" id="body-body" >

			<div class="" id='side-bar'>
				<!--Sidebar content-->
				<?php include_once 'inc_sidebar.php'; ?>
			</div>
			<div class="" id="body-content">
				<div id="body-content-content">
					<!--Body content-->

					<!--引入CSS-->
					<?php	echo static_file('js/webuploader/webuploader.css'); ?>
					<?php	echo static_file('js/webuploader/webuploader.js'); ?>

					



          <!-- footer -->
        </div>
      </div>
    </div>
  </div>
</body>
</html
