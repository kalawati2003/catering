<?php
function redirect($path){
    $path=ROOT.$path;
    header("location:$path");
}
?>