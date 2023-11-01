<?php 

file_put_contents(
    "log.log",
    print_r(["msg"=> "Ihuuu"], true),
    FILE_APPEND
);
