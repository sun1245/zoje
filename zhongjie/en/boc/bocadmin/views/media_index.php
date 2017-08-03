<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

	<div class=" boxed span5">
		<div class="boxed-inner">


			<h3> <i class="fa fa-calendar"></i> 按日期查找</h3>

			<div class="control-group ">
				<div class="form-inline">
					<input type="text" id="datepicker" class="datepicker" value="<?php echo datetime_now(false); ?> " data-date-format="yyyy/mm/dd" id="dp2" >
					<a href="#" class="btn" id="today"> 今日 </a>
				</div>
			</div>

			<div class="clear"></div>

			<div class="btn-group">
				<span class="btn btn-success">
					<span class="fa fa-upload"></span>
					<span> <?php echo lang('upload_file') ?> </span>
					<input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple" data-size="640x300,300x200">
				</span>
				<input type="hidden" name="photo" class="form-upload" data-more="1" value="">
				<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb') ?>">
			</div>

		</div>
	</div>

<div class="clearfix"></div>
<p></p>

	<div class="boxed ">
		<div class="boxed-inner">
			<h3> <i class="fa fa-list"></i> 列表</h3>
				<div id="js-photo-show" class="js-img-list-f">
					<!-- 模板 #tpl-img-list -->
				</div>
			<div class="clearfix"></div>
			<p></p>
		</div>
	</div>

<?php include_once 'inc_ui_media.php'; ?>

<script charset="utf-8">
require(['jquery', 'adminer/js/media', 'bootstrap-datepicker.zh'], function($, media) {

		$('#datepicker').datepicker({
			language: "zh-CN"
		}).on('changeDate', function(ev) {
			media.get_day_list(this.value, 'js-photo-show');
		});

		$('#today').on('click', function() {
			$('#datepicker').val(today);
			media.get_day_list(today, 'js-img-list-f');
		});

		// 上传结束后数据回传
		var media_done = function(tdata, input_name){
			console.log("上传结束后，回传信息:");
			console.log(tdata);
			console.log('存储表单名称为:'+input_name)
		};

		var media_del = function(id,input_name){
			console.log('删除结束后，回传信息');
			console.log('删除ID：'+id );
			console.log('存储表单为：'+input_name);
		}

		media.init(media_done,media_del);
		media.sort('photo');
		media.get_day_list('','js-photo-show');
	});
</script>
