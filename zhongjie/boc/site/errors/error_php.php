<!-- '"><div class='xdebug-error'> -->

    <div class="alert alert-error">
        <h4>A PHP Error was encountered</h4>
        <p>Severity: <?php echo $severity; ?></p>
        <p>Message:  <?php echo $message; ?></p>
        <p>Filename: <?php echo $filepath; ?></p>
        <p>Line Number: <?php echo $line; ?></p>
    </div>
    <?php //dump($severity.' 错误：'.$message.', 文件 '.$filepath.':'.$line.' ' ,'[BUG]:','error'); ?>

<!--     <p class="alert alert-info"> 请联系站点管理员! </p>
</div>
<span "' -->