<?php 
include_once VIEWS.'inc/action.nav.php';
include_once VIEWS.'inc/action.nav.dump.php';
include_once VIEWS.'inc/action.page.php';
include_once VIEWS.'inc/action.page.dump.php';
?>

<?php include_once VIEWS.'inc_header.php'; ?>


<?php 
$l1 = get_list_cid(6,8,array('audit'=>1));

dump($l1,'l1','table');


?>
<?php include_once VIEWS.'inc_footer.php'; ?>