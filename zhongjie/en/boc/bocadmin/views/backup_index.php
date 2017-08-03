
<h3>备份数据</h3>

<p></p>

<?php if (!new_is_writeable(APPPATH.'cache') ): ?>
<div class="alert alert-error">
<?php echo APPPATH.'cache'  ?> 没有写入权限! 请给予权限!
</div>
<?php endif ?>

<div class="btn-group">
	<a href="<?php echo site_url('backup/data'); ?>" class='btn btn-primary js-down' > <i class="fa fa-database"></i> 导出数据 </a>
</div>

<p></p>
<div class="clearfix"></div>
<div class="boxed" >
	<div class="boxed-inner">
	<h3> 备份列表 </h3>
	<ul class="boxed-list" id="list">
	<?php foreach ($list as $v):?>
		<li>
		 <a href="<?php echo ADMINER_URL_SQL.'cache/'.$v ?>"><span> <?php echo $v ?> </span></a>
		 <div class="btn-group pull-right">
		 	<a class="btn btn-danger btn-small js-del" href="#" title="<?php echo lang('del') ?>" data-title="<?php echo $v ?>"> <i class="fa fa-times"></i> </a>
		 </div>
		</li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>

<?php //echo static_file("jquery.fileDownload.js"); ?>
<script type="text/javascript">

require(['jquery', 'adminer/js/ui', 'jquery.fileDownload'],function($,ui){

	var backup_urls = {
		"bakurl" : "<?php echo APPPATH.'cache/'.$v ?>"
		,"list_url": "<?php echo site_url('backup/listzip_ajax') ?>"
		,"remove_url" : "<?php echo site_url('backup/removezip_ajax') ?>/"
	}

	$("a.js-down").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var lc = $(this).attr('href');

		$.pnotify({
			title:"生成中..."
			,text: "正在生成数据文件，请不要关闭页面！"
			,type:"notice"
			,animation: 'fade'
			,delay:3000
		});

		$.fileDownload(lc)
		.done(function () {
			console.log("File download a success!");
		})
		.fail(function () {
			$.pnotify({
				title:"下载失败"
				,text: "再试一下吧！"
				,type:"error"
				,animation: 'fade'
			});
			console.log("File download failed!");
		});
	});

	$("#list").delegate('a.js-del', 'click', function(event) {
		event.preventDefault();
		var note = $(this).parents("li");
		var filename = $(this).attr('data-title');
		console.log(filename);

		/* Act on the event */
		$.ajax({
			url: backup_urls.remove_url + filename,
			type: 'GET',
			dataType: 'JSON'
		})
		.done(function(data) {
			if (data.status) {
				$.pnotify({
					title:"成功删除"
					,text:data.msg
					,type:"success"
					,animation: 'fade'
				});
				note.remove();
			}else{
				$.pnotify({
					title:"失败"
					,text: data.msg
					,type:"error"
					,animation: 'fade'
				});
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});

});

</script>
