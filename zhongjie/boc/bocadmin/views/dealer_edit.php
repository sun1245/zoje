
<div class="btn-group"><a href="<?php echo site_urlc('dealer/index');?>" class="btn"> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?> </a></div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i> 编辑消息 <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(), array('class' => 'form-horizontal', 'id' => 'frm-dealer')); ?>

	<div class="boxed-inner seamless">
		<!-- <div class="control-group">
			<label for="title" class="control-label">省份/市区</label>
			<div class="controls">
				<select name="provinceid" name="id" onchange="return change_citys(this.value,<?php echo $this->cid; ?>,0)";>
					<?php echo get_Provinces('boc_city','',get_yid($it['cityid']));?>
				</select>
				<select name="cityid" id="cityid">
					<?php echo get_Citys('boc_city','',get_yid($it['cityid']));?>
				</select>
			</div>
		</div> -->

		<div class="control-group">
			<label for="title" class="control-label"> 名称 </label>
			<div class="controls">
				<input type="text" class='span7' name="title" id="title" value="<?php echo set_value('title',$it['title']); ?>">
				<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>
				<span class="help-inline"></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="timeline"> 发布时间 </label>
			<div class="controls">
				<input type="text" value="<?php echo timeFmt(set_value('timeline',$it['timeline'])); ?>" readonly class="input-datepicker" name='timeline' x-webkit-speech>
			</div>
		</div>

		<!-- <div class="control-group">
			<label for="username" class="control-label">联系人</label>
			<div class="controls">
				<input type="text" class='span7' name="username" id="username" value="<?php echo set_value('username',$it['username']); ?>">
			</div>
		</div>
 -->
		<div class="control-group">
			<label for="telphone" class="control-label">固定电话</label>
			<div class="controls">
				<input type="text" class='span7' name="telphone" id="telphone" value="<?php echo set_value('telphone',$it['telphone']); ?>">
			</div>
		</div>

		<!-- <div class="control-group">
			<label for="mobile" class="control-label">移动电话</label>
			<div class="controls">
				<input type="text" class='span7' name="mobile" id="mobile" value="<?php echo set_value('mobile',$it['mobile']); ?>">
			</div>
		</div> -->

		<div class="control-group">
			<label for="address" class="control-label"> 地址 </label>
			<div class="controls">
				<input type="text" class='span7' name="address" id="address" value="<?php echo set_value('address',$it['address']); ?>">
			</div>
		</div>

		<div class="control-group">
			<label for="lal" class="control-label">百度地图链接</label>
			<div class="controls">
				<input type="text" class='span7' name="lal" id="lal" value="<?php echo set_value('lal',$it['lal']); ?>">
				<!-- <span class="help-inline"><a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">百度拾取坐标系统</a></span> -->
			</div>
		</div>


		<!-- 弹出 -->
		<div id="seo-modal" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3> <i class="fa fa-info-circle"></i> SEO优化</h3>
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

<!-- 注意加载顺序 -->
<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
		$('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
	});
</script>