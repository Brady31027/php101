<?php
    ob_start(); // turn on output buffering

    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname('PRIVATE_PATH'));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    // $_SERVER['SCRIPT_NAME'] is dynamic
    // If we load http://localhost/project_root/public/staff/, -
    //     $_SERVER['SCRIPT_NAME'] = /project_root/public/staff/index.php
    // If we load http://localhost/project_root/public/staff/subjects, -
    //     $_SERVER['SCRIPT_NAME'] = /project_root/public/staff/subjects/index.php
    // strpos: 找尋子字串在字串中的起始點位置
    // +7    : '/public' 的長度
    // $public_end: project_ro ot/public/ 的長度 (起始位置) -> 20
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    
    // substr: 切出子字串
    // $_SERVER['SCRIPT_NAME']: /project_root/public/staff/subjects/index.php
    // substr($_SERVER['SCRIPT_NAME'], 0, $public_end): 從頭往後數 20 個字母, 存進 $doc_root -
    //   -> /project_root/public
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    
    define("WWW_ROOT", $doc_root);
   
    require_once('functions.php');
    require_once('database.php');

    $db = db_connect();
?>