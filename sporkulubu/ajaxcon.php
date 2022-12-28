<?php

$con = mysqli_connect("localhost","root","","sporkulubukds");
$con->set_charset("utf8");

if(!$con){
    echo "Connection Failed" . mysqli_connect_error();
}

?>