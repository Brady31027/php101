<?php

function url_for($path) {
    if ($path[0] != '/') {
    	$path = '/' . $path;
    }
    return WWW_ROOT . $path;
}

function u($str="") {
    return urlencode($str);
}

function raw_u($str="") {
    return rawurlencode($str);
}

function h($str="") {
    return htmlspecialchars($str);
}

function error_404() {
    // handle 404 page not found error
    header($_SERVER["SERVER_PROTOCOL"]. " 404 Not Found");
    exit();
}

function error_500() {
    // handle 500 internal server errors
    header($_SERVER["SERVER_PROTOCOL"]. " 500 Internal Server Error");
    exit();  
}

function redirect_to($loc) {
    header("Location: ". $loc);
    exit;
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
?>