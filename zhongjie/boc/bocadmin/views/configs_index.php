<input type="hidden" id="config_set" value="<?php echo site_url("configs/set"); ?>" >

<style>
	.input-append .add-on.ajax-edit, .input-prepend .add-on.ajax-edit {display:none;}
</style>

<!-- 布局 -->
<div class="row-fluid" id="configs">

	<!-- 前端 -->
	<div class="boxed span4">
		<div class="boxed-inner">
			<h3> <i class="fa fa-cogs"></i> 前端配置 </h3>
			<ul class="boxed-list">
				<?php foreach ($site as $v):?>
					<?php if ($v['key'] != 'title') {?>

					<?php if($v['key']=='qq' || $v['key']=='ad') {?>

					<!-- <li>
						在线客服和漂浮广告开启和禁用移到 管理里面对应的列表上了

						<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
						<div class="muted"> <?php echo $v['intor'] ?></div>
						<select name="<?php echo $v['key'] ?>" class="span12 ajax-input" id="site-<?php echo $v['key'] ?>" data-category="site" >
							<option value="1" <?php if($v['value']=='1') {echo "selected='selected'";}?>>开启</option>
							<option value="0" <?php if($v['value']=='0') {echo "selected='selected'";}?>>关闭</option>
						</select>
						<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
						border-left: 0;"> 保存 </a>
						<div class="msg"></div>
					</li> -->
					<?php }else{ ?>
					<li>
						<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
						<div class="muted"> <?php echo $v['intor'] ?></div>
						<textarea rows="3" class="span12 ajax-input" id="site-<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="site" title="<?php echo $v['intor']; ?>" disable=true><?php echo $v['value']; ?></textarea>
						<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
						border-left: 0;"> 保存 </a>
						<div class="msg"></div>
					</li>
					<?php } ?>



					<?php } ?>
				<?php endforeach;?>
			</ul>
		</div>
	</div>

	<div class="span4">

		<?php if ($this->session->userdata('gid') == 1): ?>
			<div class="boxed ">
				<div class="boxed-inner">
					<h3> <i class="fa fa-cog"></i> 后端配置</h3>
					<ul class="boxed-list">
						<?php foreach ($adminer as $v):?>
							<li>
								<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
								<div class="muted"> <?php echo $v['intor'] ?></div>
								<input type="text" class="span12 ajax-input" id="adminer-<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="adminer" value="<?php echo $v['value']; ?>" title="<?php echo $v['intor']; ?>">
								<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
								border-left: 0;"> 保存 </a>
								<div class="msg"></div>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		<?php endif ?>

		<div class="boxed ">
			<div class="boxed-inner">
				<h3> <i class="fa fa-envelope"></i> 邮件发送配置</h3>
				<ul class="boxed-list">
					<?php foreach ($email as $v):?>
						<li>
							<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
							<div class="muted"> <?php echo $v['intor'] ?></div>
							<input type="text" class="span12 ajax-input" id="mail-<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="email" value="<?php echo $v['value']; ?>" title="<?php echo $v['intor']; ?>">
							<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
							border-left: 0;"> 保存 </a>
							<div class="msg"></div>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>

	</div>
	<!-- end span4 -->

	<!-- theme -->
	<div class="boxed span4">
		<div class="boxed-inner">
			<h3> <i class="fa fa-css3"></i> 主题设置 </h3>

			<ul class="boxed-list">
				<li id='js-theme-select'>
					<span class="color color-default <?php echo $theme == 'default' ? 'color-selected':''?>" data-value="default" > </span>
					<span class="color color-dark <?php echo $theme == 'dark' ? 'color-selected':''?>" data-value="dark"> </span>
				</li>
				<li style="display:none">
					<label for="theme-select"> </label>
					<select id="theme-select" class="bselect">
						<option value="default" <?php echo $theme == 'default' ? ' selected="selected" class="option-select" ':''?> >默认</option>
						<option value="dark"  <?php echo $theme == 'dark' ? ' selected="selected" class="option-select" ':'' ; ?> >黑色</option>
					</select>
				</li>
			</ul>
		</div>
	</div>

	<!-- 上传 -->
	<div class="boxed span4">
		<div class="boxed-inner">
			<h3> <i class="fa fa-upload"></i> 上传 </h3>
			<ul class="boxed-list">
				<?php foreach ($upload as $v):?>
					<li>
						<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
						<div class="muted"> <?php echo $v['intor'] ?></div>
						<?php if ($v['key'] == "watermark"): ?>
							<!-- 水印图片上传 -->
							<div class="btn-group">
								<a href="#" id="remove-watermark" class="btn btn-default <?php echo $v['value'] ? '':"hide" ?>  ">取消</a>
								<label class="hide" for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
								<span class="btn btn-success">
									<i class="fa fa-upload"></i>
									<span> <?php echo lang('upload_file') ?> </span>
									<input class="fileupload" type="file" accept="" data-more="0">
								</span>
								<input type="hidden" id="watermark" name="watermark" class="form-upload ajax-input" data-more="0" name="watermark" data-category="upload" value="<?php echo $v['value'];?>">
								<input type="hidden" class="form-upload-thumb" value="">
								<div class="msg"></div>
							</div>
							<!-- 对应 photo 模板容器 js 开头为js操作的容器 -->
							<div id="js-watermark-show" class="js-img-list-f">
								<!-- 模板 #tpl-img-list -->
							</div>
							<div class="clear"></div>
							<?php include_once 'inc_ui_media.php'; ?>
							<?php if ($up_watermark = one_upload($v['value']) and file_exists(UPLOAD_PATH.$up_watermark['url'])): ?>
								<script type="text/javascript">
									var watermark_data = <?php echo json_encode($up_watermark) ?>;
								</script>
							<?php else: ?>
								<span id="watermark-nofile">没有水印文件,请重新上传...</span>
							<?php endif ?>
						<?php else: ?>
							<!-- default -->
							<input type="text" class="span12 ajax-input" id="upload-<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="upload" value="<?php echo $v['value']; ?>" title="<?php echo $v['intor']; ?>">
							<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
							border-left: 0;"> 保存 </a>
							<div class="msg"></div>
						<?php endif ?>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>

	<!-- html -->
	<?php if ($this->session->userdata('gid') == 1): ?>
		<div class="boxed span4 hide">
			<div class="boxed-inner">
				<h3> <i class="fa fa-cog"></i> 静态生成</h3>
				<ul class="boxed-list">
					<?php foreach ($html as $v):?>
						<li>
							<label for="<?php echo $v['key'] ?>"> <?php echo $v['label'] ?></label>
							<div class="muted"> <?php echo $v['intor'] ?></div>
							<?php if ($v['key'] == 'html'): ?>
								<div id="btn-switch-html" class="btn-group">
									<a href="#" data-value="0" class="btn <?php echo ($v['value'] == 0)?'btn-primary':'' ?>">禁用</a>
									<a href="#" data-value="1" class="btn <?php echo ($v['value'] == 1)?'btn-primary':'' ?>">使用</a>
								</div>
								<div class="clearfix"></div>
							<?php elseif($v['key'] == 'urlmodel'): ?>
								<?php
								$urlmodel = array(
									array(
										'title' => "ID"
										,'value' => '0'
										)
									,array(
										'title' => "标题"
										,'value' => '1'
										)
									,array(
										'title' => "转化拼音"
										,'value' => '2'
										)
									);
								echo ui_btn_select('urlmodel',$v['value'],$urlmodel);
								?>
								<div class="clearfix"></div>
							<?php else: ?>
								<input type="text" class="span12 ajax-input" id="html-<?php echo $v['key'] ?>" name="<?php echo $v['key']; ?>" data-category="html" value="<?php echo $v['value']; ?>" title="<?php echo $v['intor']; ?>">
								<a href="#" class="ajax-edit btn btn-primary hide add-on" title="按enter直接修改" style="margin:0;border: 1px solid #c0c0c0;
								border-left: 0;"> 保存 </a>
							<?php endif ?>
							<div class="msg"></div>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	<?php endif ?>


</div>
<!-- end row -->

<?php echo static_file('adminer/js/configs_index.js'); ?>
