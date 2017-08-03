<?php !isset($reg[0]) and show_404(); ?>
<?php
	$CI->load->model('estate_model','mestate');
	$rs = $CI->mestate->get_one($reg[0]);
	!$rs and show_404();
	$CI->load->model('Upload_model','mupload');

    if(!empty($rs['ebook'])){
        // 电子楼书图片
        $tmp3 = $CI->mupload->get_in(explode(',', $rs['ebook']));
        $keys3 = explode(',', $rs['ebook']);
        $list3 = $keys3;
        foreach ($tmp3 as $v)
        {
            foreach ($keys3 as $k => $kid)
            {
                if ($kid == $v['id'])
                {
                    $list3[$k] = $v;
                }
            }
        }
        $ebook = $list3;
    }

	$header['title'] = $rs['title'];
	if ($rs['title_seo']) {
		$header['title'] = $rs['title_seo'];
	}

	$header['tags'] = $rs['tags'];
	$header['intro'] = $rs['intro'];
?>
<content width="1218" height="1377" bgcolor="cccccc" loadercolor="ffffff" panelcolor="5d5d61" buttoncolor="5d5d61" textcolor="ffffff">
    <?php if(!empty($rs['ebook'])){ foreach($ebook as $v){ ?>
    <page src="<?php echo UPLOAD_URL.$v['url']; ?>" />
    <?php } } ?>
</content>