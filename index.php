<?php
require_once "library/Session.php";
Session::init();
define('ROOT','http://localhost/catring/');
require_once "library/redirect.php";
require_once "library/db.php";
$module = "booking";
$file = "index";
$uid = null;
$url=$_GET['url']??null;
if($url){
    $url=explode('/',rtrim($url,'/'));
    $module=$url[0];
    $file=$url[1]??$file;
    $uid= $url[2]?? null;
}
$path= "modules/$module/$file.php";
if(file_exists($path)){
include_once "header.php";
include_once $path;
include_once "footer.php";
}
else
{
    redirect('notfound.php');
}
?>
