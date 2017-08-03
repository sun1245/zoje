 <?php
 $CI->load->model('recruit_model','mrecruit');
 $page = 1;
 if(!empty($reg[0])){
    $page = $reg[0];
}
$limit = 8;
$where = array('cid'=>10,'audit'=>1);
$count = $CI->mrecruit->get_count_all($where);
$pages = _pages(site_url($url_base),$limit,$count,2);
$datalist = $CI->mrecruit->get_list($limit,$limit*($page-1),$orders,$where);
?>
<!-- 招聘模板三 -->
<div class="recruitwrap3 f-cb">
 <ul>
  <?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
  <li class="f-cb">
    <div class="left fl"> <?php echo $v['title']; ?> </div>
    <div class="right fr">
        <div class="top">
            <div class="box fl">
                <div class="line1">
                    <p>所属部门：<em><?php echo $v['department']; ?></em></p><p>招聘人数：<em><?php echo $v['amount']<1?'不限':$v['amount'].'人';?></em></p>
                </div>
                <div class="line1">
                    <p>工作地点：<em><?php echo $v['place']; ?></em></p><p>工作经验：<em><?php echo $v['experience']; ?></em></p><p>发布时间：<em> <?php echo date('Y-m-d',$v['timeline']); ?></em></p>
                </div>
            </div>
            <div class="link fr">
                <a class="more" href="javascript:;" title="">点击展开</a>

                <a class="need" href="<?php echo site_url('applyonline/'.$v['id']) ?>" target="_blank" >我要应聘</a>
            </div>
        </div>
        <div class="bot" style="display: none;">
            <p>岗位职责：</p>
            <p><?php echo $v['content'];?></p>
            <p>&nbsp;</p>
            <p>任职职责： </p>
            <p><?php echo $v['requirement'];?></p>
        </div>
    </div>
</li>
<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>

</ul>
</div>

<div class="page"><?php echo $pages; ?></div>

<script>
	$(function(){
		$('.header a').eq(2).addClass('on');

	})
	//收缩
    $('.recruitwrap3 li .right .link .more').click(function(){

        var _this=$(this);
        if(_this.parents('.right').find('.bot').css('display')=='none'){
            _this.html('点击收缩');
            _this.parents('.right').find('.bot').slideDown();
            _this.parents('li').siblings('li').find('.bot').slideUp();
            _this.parents('li').siblings('li').find('.more').html('点击展开')
        }else{
            _this.html('点击展开');
            _this.parents('.right').find('.bot').slideUp();
        }
    })
</script>
