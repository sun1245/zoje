<?php if ($v['show']) :?>
<a href="#" class='btn btn-primary btn-small btn-ajax-show' data-id="<?php echo $v['id'] ?>" data-show="0">  <i class="fa fa-eye"></i> <?php //echo lang('show'); ?> </a>
<?php else: ?> 
<a href="#" class='btn btn-small btn-ajax-show' data-id="<?php echo $v['id'] ?>" data-show="1"> <i class="fa fa-eye-slash"></i> <?php //echo lang('hide'); ?> </a>
<?php endif; ?>