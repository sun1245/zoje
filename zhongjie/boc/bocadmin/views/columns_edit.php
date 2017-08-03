<div class="btn-group">
	<a href="<?php echo site_url('columns/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> 返回列表</a>
</div>

<p></p>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-pencil"></i> 栏目编辑 </h3>
	<?php echo form_open(current_url(),array("class"=>"form-horizontal","id"=>"frm-edit")); ?>

		<div class="boxed-inner seamless">
			<div class="control-group">
				<label class="control-label" for="title">标题</label>
				<div class="controls">
					<input type="text" id="title" name="title" value="<?php echo set_value('title',$it['title']) ?>">
					<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="identify">标识</label>
				<div class="controls">
					<input type="text" id="identify" name="identify" value="<?php echo set_value('identify',$it['identify']) ?>">
					<span class="help-inline"> 输入英文符号组合,完整地址： <?php echo $it['path'] ?> </span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="parent_id">所属栏目</label>
				<div class="controls">
					<?php echo ui_btn_select('parent_id',set_value("parent_id",$it['parent_id']),$cols_select); ?>
					<span class="help-inline"></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="mid">栏目模型</label>
				<div class="controls">
					<?php echo ui_btn_select('mid',$it['mid'],$modules); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="temp_index">栏目模板</label>
				<div class="controls">
					<input type="text" id="temp_index" name="temp_index" value="<?php echo set_value('temp_index',$it['temp_index']) ?>" placeholder="栏目页面">
					<span class="help-inline">留空：默认views中对应标识路径文件</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="temp_show">内容模板</label>
				<div class="controls">
					<input type="text" id="temp_show" name="temp_show" value="<?php echo set_value('temp_show',$it['temp_show']) ?>" placeholder="栏目内容页面">
					<span class="help-inline">留空：默认views中对应标识文件夹路径中info.php</span>
				</div>
			</div>

			<script>
				ti_v = true;
				if (<?php echo !$it['temp_show'] ? 0 : 1 ?>) {
					ti_v = false;
				};
			</script>

			<!-- SEO -->
			<div id="seo-modal" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					<h3> <i class="fa fa-info-circle"></i> SEO优化</h3>
				</div>
				<div class="modal-body seamless">
					<div class="control-group">
						<label class="control-label" for="title_seo">优化标题</label>
						<div class="controls">
							<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo',$it['title_seo']) ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="tags">标签</label>
						<div class="controls">
							<input type="text" id="tags" name="tags" value="<?php echo set_value('tags',$it['tags']) ?>">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="intro">简介</label>
						<div class="controls">
							<textarea name="intro" rows='8' class='span4'> <?php echo set_value('intro',$it['intro']) ?></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn btn-danger"> <?php echo lang('close') ?></a>
				</div>
			</div> <!-- end modal -->
		</div> <!-- end boxed body -->

		<div class="boxed-footer">
			<input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
			<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
			<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
		</div>
	</form>
</div>
<script charset="utf-8">
require(['tools'],function(tools){
	var columns_va = {
		rules : {
			title:{
				required:true
			}
			,identify:{
				required:true
			}
		}
		,messages : {
			uname: {
				required : "标题必须输入!"
			}
			,identify:{
				required:"标识必须输入为英文!"
			}
		}
	};

	tools.make_validate('frm-edit',columns_va.rules,columns_va.messages);
});
</script>
