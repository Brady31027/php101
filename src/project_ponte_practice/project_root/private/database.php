<?php
    require_once('db_credential.php');

    function db_connect() {
        $conn =  mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
        db_check_error();
        return $conn;
    }

    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

    function db_query($connection, $query) {
        if (isset($connection) && isset($query)) {
            $result = mysqli_query($connection, $query);
            if (!$result) {
                exit("DB query failed: can't retrieve data: $query");
            }
            return $result;
        }
        exit("DB query failed: connection or query is empty");
    }

    function db_query_all_subjects() {
        global $db;
        $sql = "SELECT * FROM subjects ";
        $sql .= "ORDER BY position ASC";
        return db_query($db, $sql);
    }

    function db_query_all_pages() {
        global $db;
        $sql = "SELECT * FROM pages ";
        $sql .= "ORDER BY subject_id ASC";
        return db_query($db, $sql);
    }

    function db_get_query_count($query_result) {
        if (isset($query_result)) {
            return mysqli_num_rows($query_result);
        }
        return 0;
    }

    function db_free_query($query_set) {
        if (isset($query_set)) {
            mysqli_free_result($query_set);
        }
    }

    function db_check_error() {
        if (mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (". mysqli_connect_errno(). " )";
            exit($msg);
        }
    }
?>