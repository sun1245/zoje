<?php
// $CI->cache_use = false;
include_once VIEWS.'inc/action.nav.php';
include_once VIEWS.'inc/action.nav.dump.php';

$where=  array('cid'=>$nav_active,'audit'=>1);
$fields = 'id,title,intro,thumb';
$limit = 3;
$page_pos = 2; // 设定 页码位置

// $where['in'] = array('id',array(29,32,35));
// $where['or_like'] = array('id','29');
// $where['like'] = array('title','test3');
// $where['or_like 2'] = array('title','test4');
// $where['or_like 3'] = array('id','test4');
// $where['in'] = array('id',array(29,32,35));
// $where['like'] = array('title','test3');
// $where['like s'] = array('title','test3');

include_once VIEWS.'inc/action.list.php';
// include_once VIEWS.'inc/action.list.dump.php';
dump($CI->db->last_query(),'sql');
$isAjax = is_ajax();
?>

<?php !$isAjax and include_once VIEWS.'inc_header.php'; ?>

<ul>
    <?php foreach ($list as $k => $v): ?>
    <li>
        <div class="imgbox"><img src="<?php echo UPLOAD_URL. str_replace('thumbnail/', '', $v['thumb']); ?>" width="127" height="90"></div>
        <div class="intro">
            <p class="tit"> <?php echo $v['title'] ?> </p>
            <p class="txt"> <?php echo $v['intro'] ?> </p>
            <p align="right"><a href="<?php echo  $base_url.'/info/'.$v['id']; ?>" class="more">更多</a></p>
        </div>
    </li>
    <?php endforeach ?>
</ul>

<?php echo $page_p ?>

<?php !$isAjax and include_once VIEWS.'inc_footer.php'; ?>
