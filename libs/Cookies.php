<?php
class Cookies{

    function __construct(){

    }

    public static function set($key, $value){
        setcookie($key, $value, time() + (86400 * 365), "/");
    }

    public static function get($key){
        if(isset($_COOKIE[$key])) return $_COOKIE[$key];
    }

    public static function destroy($key){
        setcookie($key, "", time() - 3600);
    }

}
?>