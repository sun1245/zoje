<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">

<div class="boxed span4">
    <div class="boxed-inner hg1">
        <h3> <i class="fa fa-shield"></i> <?php echo lang('server_env') ?></h3>
        <ul class="boxed-list">
            <?php 
            foreach ($env as $e => $v){
                $li = $v['enable']?'<li class="text-success">':'<li class="text-error">';
                $enable = $v['enable']?" <span class='badge badge-success'> ".$v['enable']."</span>":"<span class='badge badge-important'> error </span>" ;
                printf("%s %s : %s </li>",$li, $v['title'],$enable );
            }?>
        </ul>
    </div>
</div>

<div class="boxed span4">
    <div class="boxed-inner hg1">
        <h3> <i class="fa fa-shield"></i> <?php echo lang('server_ext') ?></h3>
        <ul class="boxed-list">
            <?php 
            foreach ($extension as $e => $v){
                $li = $v['enable']?'<li class="text-success">':'<li class="text-error">';
                $enable = $v['enable']?" <span class='badge badge-success'> 启用</span>":"<span class='badge badge-important'>未启用</span>" ;
                printf("%s %s : %s </li>",$li, $v['title'],$enable );
            }?>
        </ul>
        <p><?php echo lang('ext_helper') ?> </p>
    </div>
</div>

</div>
