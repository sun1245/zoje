 # for lnmp package

 location ~ .+\.php
 {
     try_files $uri =404;
     fastcgi_pass  unix:/tmp/php-cgi.sock;
     fastcgi_index index.php;
     include fcgi.conf;

     set $script $uri;
     set $path_info /;
     set $real_script_name $fastcgi_script_name;
     if ($uri ~ ^(.+\.php)(/.+)) {
         set $script $1;
         set $path_info $2;
     }
     fastcgi_param PATH_INFO $path_info;
     fastcgi_param SCRIPT_FILENAME $document_root$script;
     fastcgi_param SCRIPT_NAME $real_script_name;
     fastcgi_param SCRIPT_NAME $script;
 }
