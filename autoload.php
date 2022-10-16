<?php 

function controllers_autoload($calssname){
    include('controllers/'.$calssname.'.php');
    echo $calssname;
} 

spl_autoload_register('controllers_autoload');