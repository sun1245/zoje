
<div class="btn-group"><a href="<?php echo site_urlc('product/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
    <h3> <i class="fa fa-pencil"></i> <?php echo lang('edit') ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
    <?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

    <div class="boxed-inner seamless">

        <div class="control-group">
            <label for="title" class="control-label"><?php echo lang('title') ?>:</label>
            <div class="controls">
                <input type="text" name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>"  class='span7'>
                <a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal"><?php echo lang('seo') ?></a>
                <span class="help-inline"></span>
            </div>
        </div>

        <div class="control-group">
            <label for="title" class="control-label">时间:</label>
            <div class="controls">
                <div class="input-append date timepicker">
                    <input type="text" value="<?php echo date("Y/m/d H:i:s",set_value('timeline',$it['timeline'])); ?>" id="timeline" name="timeline">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>

        <!-- ctype -->
        <?php if ($ctype = list_coltypes($this->cid)) { ?>
        <div class="control-group">
            <label class="control-label" for="status"> 所属分类:</label>
            <div class="controls">
                <?php
                echo ui_btn_select('ctype',set_value("ctype",$it['ctype']),$ctype);
                ?>
                <span class="help-inline"></span>
            </div>
        </div>
        <?php } ?>

        <div class="control-group">
            <label for="title" class="control-label">链接:</label>
            <div class="controls">
                <input type="text" name="link" id="link" value="<?php echo set_value('title',$it['link']); ?>"  class='span7'>
                <span class="help-inline"></span>
            </div>
        </div>

        <!-- 弹出 -->
        <div id="seo-modal" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3> <i class="fa fa-info-circle"></i> <?php echo lang('seo') ?></h3>
            </div>
            <div class="modal-body seamless">

                <div class="control-group">
                    <label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
                    <div class="controls">
                        <input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$it['title_seo']) ?>" x-webkit-speech>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="tag"><?php echo lang('tag') ?></label>
                    <div class="controls">
                        <input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$it['tags']) ?>" placeholder="tag1,tag2">
                        <span class="help-inline">使用英文标点`,`隔开</span>
                    </div>
                </div>

                <div class="control-group">
                    <label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
                    <div class="controls">
                        <textarea name="intro" rows='8' class='span4'><?php echo set_value('intro',$it['intro']) ?></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#"  data-dismiss="modal" aria-hidden="true" class="btn">Close</a>
            </div>
        </div>


        <div class="control-group uefull">
            <textarea id="content" name="content"> <?php echo set_value('content',$it['content']); ?></textarea>
        </div>

        <!-- 图片上传 -->
        <div class="control-group">
            <label for="img" class="control-label"><?php echo lang('photo') ?></label>
            <div class="controls">
                <div class="btn-group">
                    <span class="btn btn-success">
                        <i class="fa fa-upload"></i>
                        <span> <?php echo lang('upload_file') ?> </span>
                        <input class="fileupload" type="file"  accept="" multiple="">
                    </span>
                    <input type="hidden" name="photo" class="form-upload" data-more="1" value="<?php echo $it['photo'] ?>">
                    <input type="hidden" name="thumb" id="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
                </div>
            </div>
        </div>
        <div id="js-photo-show" class="js-img-list-f"></div>
        <div class="clear"></div>
        <!-- 图片上传 -->

    </div>
    <div class="boxed-footer">
        <?php if ($this->ccid): ?>
            <input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
        <?php endif ?>
        <input type="hidden" name="cid" value="<?php echo $this->cid ?>">
        <input type="hidden" name="id" value="<?php echo $it['id']?>">
        <input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
        <input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
    </div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
    require(['jquery','adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function($,ui,media){
        $('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});

        ui.editor_create('content');
        media.init();

        var product_photos = <?php echo json_encode(list_upload($it['photo'])) ?>;
        media.show(product_photos,"photo");
        media.sort('photo');

    });
</script>
