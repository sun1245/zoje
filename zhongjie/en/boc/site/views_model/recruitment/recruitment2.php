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
 <!-- 招聘模板二 -->
 <div class="recruitwrap2 f-cb">
 	<dl>
 		<?php if(!empty($datalist)){ foreach($datalist as $v){ ?>
 		<dt class="f-cb t-f" onClick="dtClick($(this))">
 			<p class="fl"><?php echo $v['title']; ?></p>
 			<div class="sign fr"></div>
 		</dt>
 		<dd class="dn">
 			<h6 class="fwn">岗位职责：</h6>
 			<div class="detail">
 				<p><?php echo $v['content']; ?></p>
 			</div>
 			<h6 class="fwn">任职职责：</h6>
 			<div class="detail">
 				<p><?php echo $v['requirement']; ?></p>
 			</div>
 			<div class="contacts">
 				<p>联系人：<?php echo $v['person']; ?>  <br>
 					邮箱：<?php echo $v['email']; ?> <br>
 					电话：<?php echo $v['telphone']; ?>
 				</p>
 			</div>
 		</dd>
 		<?php }}else{echo "<div align='center'>暂无信息！</div>";} ?>
 	</dl>
 </div>
 <div class="page"><?php echo $pages; ?></div>
 <script>
 	function dtClick(obj){
 		if(obj.hasClass("cur")){
 			obj.removeClass("cur").next("dd").stop().slideUp(600)
 		}else{
 			obj.addClass("cur").next("dd").stop().slideDown(600)
 			obj.siblings("dt").removeClass("cur").next("dd").stop().slideUp(600)
 		}
 	}
 </script>
