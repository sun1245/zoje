<!-- 招聘模板四 -->
<div class="recruitwrap4 f-cb">
   <table width="100%">
      <tr>
         <th>职位名称</th>
         <th>招聘人数</th>
         <th>工作地点</th>
         <th>截止日期</th>
         <th>职位申请</th>
     </tr>
     <?php if(!empty($list)){ foreach($list as $v){ ?>
     <tr>
        <td><a href='<?php echo site_url('recruitment/info/'.$v['id']) ?>' target="_blank"><?php echo $v['title']; ?></a></td>
        <td><?php echo $v['amount']<1?'不限':$v['amount'].'人';?></td>
        <td><?php echo $v['place']; ?></td>
        <td><?php echo date('Y-m-d',$v['expiretime']); ?></td>
        <td><a href="<?php echo site_url('recruitment/info/'.$v['id']) ?>">职位详情</a> | <!-- <a href="mailto:hr@126.com">简历投递</a> --><a href="<?php echo site_url('applyonline/index/'.$v['id']);?>" target="_blank">在线应聘</a></td>
    </tr>
    <?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
</table>
</div>
<div class="page"><?php echo $pages; ?></div>

<script>
	$(function(){
		$('.header a').eq(3).addClass('on');
	})
</script>
