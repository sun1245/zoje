<!-- 栏目配置 -->
<div class="boxed span4">
    <div class="boxed-inner">
        <h3> <i class="fa fa-upload"></i> 配置 </h3>
        <ul class="boxed-list">
        <?php foreach ($upload as $v):?>
            <li>
                <label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
                <div class="muted"> <?php echo $v['intor'] ?></div>
                <input type="text" class="ajax-input" id="<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="email" value="<?php echo $v['value']; ?>" title="<?php echo $v['intor']; ?>">
                <a href="#" class="ajax-edit btn btn-primary add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
                    border-left: 0;"> 保存 </a>
                <div class="msg"></div>
            </li>
        <?php endforeach;?>
        </ul>
    </div>
</div>
