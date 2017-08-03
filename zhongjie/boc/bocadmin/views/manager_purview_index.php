<?php
// 权限输出
function list_cols($cols = false){
	if ($cols === false) {
		return "<li>nothing...</li>";
	}
	$list = "";
	foreach ($cols as $k => $v) {
		$purview = "";
		if (is_array($v['purview']) and $v['purview'] ) {
			foreach ($v['purview'] as $pk => $pv) {
				$status = "badge-success";
				if (!$pv['status']) {
					$status = "";
				}
				$purview .= '<span class="badge '.$status.'"> '
				. '<a href="javascript:void(0)" class="pur" data-status="'.$pv['status'].'" data-pid="'.$pv['id'].'">'
				.$pv['title']
				. '</a>'
				.' </span>';
			}
		}
		$more = "";
		if ($v['more'] and is_array($v['more'])) {
			$more .= list_cols($v['more']);
		}
		$list .= '<li data-cid="'.$v['cid'].'" > '
			. '<span  class="depth'.$v['cdepth'].'">'.$v['ctitle'].'</span>'
			. $purview
			.$more.' </li>';
	}

	return $list;
}

?>

<div class="btn-group">
	<a href="<?php echo site_url($this->router->class.'/create'); ?>" class='btn btn-primary' >  <i class="fa fa-plus"></i> <?php echo $title ?> </a>
</div>

<p></p>

<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
	禁用权限则可以不检测此访问权限。
</div>

<div class="row-fluid">

<div class="boxed span6">
	<div class="boxed-inner">
		<h3> <i class="fa fa-lock"></i> 栏目权限 </h3>
		<ul class="boxed-list">
		<?php echo list_cols($cols);?>
		</ul>
		<p>注： 栏目信息的权限管理</p>
	</div>
</div>

<div class="boxed span6">
	<div class="boxed-inner">
		<h3> <i class="fa fa-lock"></i> 管理权限 </h3>
		<ul class="boxed-list">
		<?php
			foreach ($pur as $k => $v) {
				$str = "<li>";
				$str .= '<span class="depth0">-</span>';
				// $str .= $k;
				foreach ($v as $m) {
					$status = "badge-success";
					if (!$m['status']) {
						$status = "";
					}
					$str.= ' <span class="badge '.$status.'"><a href="#" class="pur" data-status="'.$m['status'].'" data-pid="'.$m['id'].'">'.$m['title'].'</a>	</span>';
				}
				$str .= '</li>';
				echo $str;
			}
		?>
		</ul>
		<p> 注： 管理权限</p>
	</div>
</div>

</div>

<?php echo static_file('adminer/js/manager_purview_index.js') ?>

<style>
	.popover-content{padding:3px;}
</style>

<div class="hide"  id="clchange">
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="status">是否有效:</label>
			<div class="controls">
				<div class="btn-group ui-radio" data-toggle="buttons-radio">
					<label class="btn active">
						<input type="radio" name="show" id="show1" value="1" checked="checked"> 正常
					</label>
					<label class="btn">
						<input type="radio" name="show" id="show2" value="0"> 禁用
					</label>
				</div>
				<span class="help-inline"></span>
			</div>
		</div>
	</div>
</div>
