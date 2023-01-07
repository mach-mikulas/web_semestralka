<?php

class mySession{
    public static function start(){
        session_start();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function isActive($key):bool{
        return isset($_SESSION[$key]);
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    public static function unSet($key){
        unset($_SESSION[$key]);
    }

    public static function stop(){
        session_destroy();
    }
}

?>