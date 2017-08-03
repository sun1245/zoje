<?php //TODO:检测权限 ?>
<?php if ($v['audit']): ?>
	<a href="#"  title="<?php echo lang('audit_remove') ?>"  class='btn btn-primary btn-small btn-ajax-audit' data-id="<?php echo $v['id'] ?>" data-audit="0">  <i class="fa fa-thumbs-up"></i> </a>
<?php else: ?>
	<a href="#" title="<?php echo lang('audit') ?>" class='btn btn-small btn-ajax-audit' data-id="<?php echo $v['id'] ?>" data-audit="1"> <i class="fa fa-thumbs-down"></i> </a>
<?php endif ?>
