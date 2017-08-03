<?php //TODO:检测权限 ?>
<?php if ($v['flag']): ?>
    <a href="#"  title="<?php echo lang('flag_remove') ?>"  class='btn btn-primary btn-small btn-ajax-flag' data-id="<?php echo $v['id'] ?>" data-flag="0">  <i class="fa fa-flag"></i> </a>
<?php else: ?>
    <a href="#" title="<?php echo lang('flag') ?>" class='btn btn-small btn-ajax-flag' data-id="<?php echo $v['id'] ?>" data-flag="1"> <i class="fa fa-flag"></i> </a>
<?php endif ?>
