<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
// list 显示
function cols_menu($cols = false){
	if ($cols === false) {
		return "";
	}
	$list = "";
	foreach ($cols as $k => $v) {
		if (get_purview($v['controller'].'/index/'.$v['cid'])  && $v['show']==1){

			$bool_more = (bool)($v['more']);
			$list .= $bool_more ? "<li class='dropdown-submenu'>":"<li>";
			$list .= "<a id='c".$v['cid']."'";
			$list .= $bool_more ? "href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown' data-target='#'":" href='".site_url($v['controller'].'/index/'.$v['cid']);
			$list .= "' title='".$v['ctitle']."'>";
			$list .= $bool_more ? '<i class="fa fa-chevron-circle-right" title="'.$v['ctitle'].'"> </i> ':'<i class="fa fa-circle-o" data-title="'.$v['ctitle'].'"> </i> ';
			$list .= '<span class="i-title">'.$v['ctitle'].'</span>';
			if ($v['cdepth'] == 0) {
				$list .= "<div class='wp-menu-arrow'><div></div></div>";
			}
			$list .= '</a>';

			if ($bool_more and is_array($v['more'])) {
				$list .= '<ul class="dropdown-menu">';
				$list .= cols_menu($v['more']);
				$list .= '</ul>';
			}
			$list .= '<li>';
		}
	}
	return $list;
}
?>

<ul class="nav nav-list nav-sidebar">

	<li id="menu-welcome">
		<a href="<?php echo site_url('welcome')?>">
			<i class="fa fa-home" title="<?php echo lang('index') ?>"></i>
			<span class="i-title"> <?php echo lang('index') ?></span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>

	<li id="menu-servicecenter">
		<a href="<?php echo site_url('servicecenter')?>">
			<i class="fa fa-phone-square" title="服务中心"></i>
			<span class="i-title"> 服务中心 </span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>

	<li class="nav-header">
		<i class='fa fa-sitemap' title="<?php echo lang('columns') ?>"></i> <span class="i-title"><?php echo lang('columns') ?> </span>
	</li>
	<!-- col -->
	<?php echo cols_menu($this->cols_menu); ?>

	<li class="nav-header">
		<i class="fa fa-globe" title="表单数据管理"></i> <span class="i-title">表单数据管理</span>
	</li>

<!-- 	<li id='menu-users'>
		<a href="<?php echo site_url('users') ?>">
			<i class="fa fa-user" title="会员中心"></i>
			<span class="i-title"> 会员中心 </span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>

	<li id='menu-feedback'>
		<a href="<?php echo site_url('feedback') ?>">
			<i class="fa fa-comments-o" title="<?php echo lang('feedback') ?>"></i>
			<span class="i-title"> <?php echo lang('feedback') ?> </span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li> -->

	<li id='menu-recruit_apply'>
		<a href="<?php echo site_url('recruit_apply') ?>">
			<i class="fa fa-comments-o" title="<?php echo lang('recruit_apply') ?>"></i>
			<span class="i-title"> <?php echo lang('recruit_apply') ?> </span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>

	<li class="nav-header" id='js-sidebar-cog' data-hide="1">
		<i class="fa fa-cogs" title="<?php echo lang('nav_cog') ?>"></i>
		<span class="i-title"><?php echo lang('nav_cog') ?></span>
		<i class="fa fa-chevron-down js-sidebar-cog-icon pull-right"></i>
	</li>

	<?php if (get_purview('configs/index')): ?>
		<li id='menu-configs' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('configs') ?>">
				<i class="fa fa-cog" title="<?php echo lang('nav_configs') ?>"></i>
				<span class="i-title"><?php echo lang('nav_configs') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<!-- <?php if (get_purview('webmodels/index') && ENVIRONMENT=="development"): ?>
		<li id='menu-webmodels' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('webmodels/index?mid=1') ?>">
				<i class="fa fa-folder" title="新闻模块"></i>
				<span class="i-title">新闻模块</span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>


	<?php if (get_purview('jobmodels/index') && ENVIRONMENT=="development"): ?>
		<li id='menu-jobmodels' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('jobmodels/index?mid=2') ?>">
				<i class="fa fa-folder" title="招聘模块"></i>
				<span class="i-title">招聘模块</span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<?php if (get_purview('onlineservice/index') && ENVIRONMENT=="development"): ?>
		<li id='menu-onlineservice' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('onlineservice') ?>">
				<i class="fa fa-qq" title="在线客服"></i>
				<span class="i-title">在线客服</span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<li id='menu-advert' class="js-sidebar-cog hide">
		<a href="<?php echo site_url('advert') ?>">
			<i class="fa fa-adn" title="漂浮广告"></i>
			<span class="i-title">漂浮广告</span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li> -->



	<li id='menu-log' class="js-sidebar-cog hide">
		<a href="<?php echo site_url('log') ?>">
			<i class="fa fa-file" title="系统<?php echo lang('log') ?>"></i>
			<span class="i-title">系统<?php echo lang('log') ?></span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>



	<?php if (get_purview('modules/index') && ENVIRONMENT=="development"): ?>
		<li id='menu-modules' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('modules') ?>">
				<i class='fa fa-puzzle-piece' title="<?php echo lang('nav_modules') ?>"></i>
				<span class="i-title"><?php echo lang('nav_modules') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<?php if (get_purview('columns/index') && ENVIRONMENT=="development"): ?>
		<li id='menu-columns' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('columns') ?>">
				<i class='fa fa-list' title="<?php echo lang('nav_columns') ?>"></i>
				<span class="i-title"><?php echo lang('nav_columns') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<?php if (get_purview('manager_purview/index')): ?>
		<li id='menu-manager_purview' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('manager_purview') ?>">
				<i class='fa fa-key' title="<?php echo lang('nav_manager_purview') ?>"></i>
				<span class="i-title"><?php echo lang('nav_manager_purview') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<?php if (get_purview('manager_group/index')): ?>
		<li id='menu-manager_group'  class="js-sidebar-cog hide">
			<a href="<?php echo site_url('manager_group') ?>">
				<i class='fa fa-users' title="<?php echo lang('nav_manager_group') ?>"></i>
				<span class="i-title"><?php echo lang('nav_manager_group') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

	<?php if (get_purview('manager/index')): ?>
		<li id='menu-manager' class="js-sidebar-cog hide">
			<a href="<?php echo site_url('manager') ?>">
				<i class='fa fa-user' title="<?php echo lang('nav_manager') ?>"></i>
				<span class="i-title"><?php echo lang('nav_manager') ?></span>
				<div class="wp-menu-arrow"><div></div></div>
			</a>
		</li>
	<?php endif ?>

<!-- <li id='menu-serverinfo' class="js-sidebar-cog hide">
  <a href="< ?php echo site_url('serverinfo') ?>"><i class="fa fa-shield" title="< ?php echo lang('nav_serverinfo') ?>"></i>
    <span class="i-title">< ?php echo lang('nav_serverinfo') ?></span>
  </a>
</li> -->

<?php if (get_purview('backup/index')): ?>
	<li id='menu-backup' class="js-sidebar-cog hide">
		<a href="<?php echo site_url('backup') ?>">
			<i class='fa fa-database' title="<?php echo lang('nav_backup') ?>"></i>
			<span class="i-title"><?php echo lang('nav_backup') ?></span>
			<div class="wp-menu-arrow"><div></div></div>
		</a>
	</li>
<?php endif ?>


  <!-- <li id='menu-help'>
    <a href="< ?php echo site_url('help') ?>">
      <i class="fa fa-lightbulb-o" title="< ?php echo lang('nav_help') ?>"></i>
      <span class="i-title">< ?php echo lang('nav_help') ?></span>
    </a>
</li> -->
<li id="menu-help">
	<a href="<?php echo site_url('help')?>">
		<i class="fa fa-child" title="帮助中心"></i>
		<span class="i-title"> 帮助中心 </span>
		<div class="wp-menu-arrow"><div></div></div>
	</a>
</li>



<li>
	<a href="<?php echo site_url('login/logout') ?>">
		<i class='fa fa-sign-out' title="<?php echo lang('logout') ?>"></i>
		<span class="i-title"> <?php echo lang('logout') ?></span>
		<div class="wp-menu-arrow"><div></div></div>
	</a>
</li>


</ul>

<script>
	require(['jquery','bootstrap'],function($){

		$('#sidebar a.dropdown-toggle').dropdown();
		<?php if (isset($this->cid)): ?>
		$("#c<?php echo $this->cid;?>").parents('li').addClass('active');
	<?php else: ?>
	$("#menu-<?php echo $this->router->class;?>").addClass('active');
<?php endif; ?>

$('#js-sidebar-cog').on('click', function(event) {
	event.preventDefault();
	console.log($(this).attr('data-hide'));
	if ($(this).attr('data-hide')=="1") {
		$(this).children('.js-sidebar-cog-icon').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		$('.js-sidebar-cog').fadeIn(500).removeClass('hide');
		$(this).attr('data-hide',0);
	}else{
		$(this).children('.js-sidebar-cog-icon').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		$('.js-sidebar-cog').fadeOut(500);
		$(this).attr('data-hide',1);
	}
});

  // 焦点显示
  $('.js-sidebar-cog').each(function(i,e){
  	_this = $('#js-sidebar-cog');
  	if ($(e).hasClass('active')) {
  		_this.children('.js-sidebar-cog-icon').removeClass('fa-chevron-down').addClass('fa-chevron-up');
  		$('.js-sidebar-cog').fadeIn(500).removeClass('hide');
  		_this.attr('data-hide',0);
  	}
  });

  // TODO 侧边栏隐藏标题 图标样式
  function hide_side() {
  	$('#side-bar .i-title').hide(100);
  	$('#side-bar').animate({'width':'60px'},300);
  	$('#sidebar-bg').animate({'width':'60px'},300);
  	$('#side-bar i').animate({'font-size':'18px'},300);
  	$('#body-content').animate({'margin-left':'80px'},300)
  }

});
</script>
