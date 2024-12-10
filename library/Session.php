<?php 
class Session{
    static function init(){
        @session_start();
    } 
    static function set($key,$value){
        $_SESSION['$key']= $value;
    }
    static function get($key){
        return $_SESSION['$key']??null;
    }
    static function delete($key){           //only session variable deleted
        if(isset($_SESSION['$key'])){
            unset($_SESSION['$key']);
        }
    }
    static function destory()       //whole session will be delete
    {
        @session_destroy();
    }
    static function sessionid(){      // whenever we need session id
        return session_id();
    }
}?>