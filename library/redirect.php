<?php
function redirect($path){
    $path=ROOT.$path;
    header("location:$path");
}
function islogin(){
    if(!Session::get('author')){
        redirect('users');
        exit;
    }
}
?>