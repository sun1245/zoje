<?php 

class Upload_Hook{
    function sed(){
        $this->CI  = &get_instance();

        $tmp = $this->CI->output->get_output();

        $tmp = str_replace("../upload", "upload", $tmp);

        echo $tmp;

    }
}
?>
