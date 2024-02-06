<?php 

if (!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";
        print_r($data);
        die;
    }
}
if (!function_exists('404')) {
    function e404() {
        echo "404 ";
        die;
    }
}