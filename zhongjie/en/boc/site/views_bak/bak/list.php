<?php
include_once VIEWS.'inc/action.nav.php';
$limit = 10;
$fields = 'id,title,intro,thumb';
include_once VIEWS.'inc/action.list.php';
$isAjax = is_ajax();
?>

<?php $isAjax and include_once VIEWS.'inc_header.php'; ?>

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


<?php $isAjax and include_once VIEWS.'inc_footer.php'; ?>
