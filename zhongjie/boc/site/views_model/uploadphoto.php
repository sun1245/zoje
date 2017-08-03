    <!DOCTYPE html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     <?php
     echo static_file('reset.css');
     echo static_file('jQuery.js');

     echo static_file('jquery.validate.js');
     echo static_file('jquery.cookie.js');
     echo static_file('tools.js');
     echo static_file('template.js');
     ?>

     <script>
      var STATIC_URL  = "<?php echo STATIC_URL  ?>" ;
      var UPLOAD_URL  = "<?php echo UPLOAD_URL  ?>" ;
      var GLOBAL_URL = "<?php echo GLOBAL_URL?>index.php/";
      var SITE_URL = "<?php echo site_url().'/'; ?>";
      var UPLOADDO_URL = "<?php echo SITE_URL.'upload/'?>";
      var STATIC_VER = "<?php echo STATIC_V ?>";
    </script>

    <?php echo static_file('web/css/sidebar.min.css'); ?>
    <?php echo static_file('web/css/font-awesome.min.css'); ?>
    <script type="text/javascript" charset="utf-8">
      <?php
      if ($this->config->item('index_page')) {
        ?>
        var ADMINER_URL = "<?php echo GLOBAL_URL.$this->config->item('index_page') ?>/" ;
        var UPLOADDO_URL = "<?php echo GLOBAL_URL.$this->config->item('index_page').'/upload/'?>";
        <?php
      }else{
        ?>
        var ADMINER_URL = "<?php echo GLOBAL_URL ?>" ;
        var UPLOADDO_URL = "<?php echo GLOBAL_URL.'/upload/'?>";
        <?php
      };
      ?>
    </script>
  </head>
  <body>
    上传文件

    <div class="control-group">
      <div class="controls">
        <div class="btn-group">
          <span class="btn btn-success">
            <i class="fa fa-upload"></i>
            <span class="upload-btn fl foreign"></span>
            <input class="file fileupload file-inp poi vm" type="file" accept="*" multiple="multiple">
          </span>
          <input type="hidden" name="photo" id="photo" class="form-upload" data-more="1" value="<?php echo set_value("photo") ?>">
          <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value("thumb") ?>">
        </div>
      </div>
      <div id="js-photo-show" class="js-img-list-f"></div>
      <div class="clear"></div>
    </div>

  </body>
  <?php
  echo static_file('require.js');
  echo static_file('require.config.js');
  ?>
  <?php include_once VIEWS.'inc/inc_ui_media.php'; ?>
  <script type="text/javascript">
    require(['adminer/js/ui','web/js/media'],function(ui,media){
      media.init();
      var photo = <?php echo json_encode(list_upload(set_value("photo"))) ?>;
      media.show(photo,"photo");
    });
  </script>
  </html>