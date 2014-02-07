<?php

/*
 * Functions needed to operate with the database
 */

function debug($msg) {
    global $db_debug;
    if ($db_debug) {
        echo $msg . "\n";
    }
}

class db_tools {

    private static function db_create($db_link, $db_name) {
        $query = "CREATE DATABASE $db_name";
        mysqli_query($db_link, $query) or die("Can't create DB");
        debug("DB created");
        mysqli_select_db($db_link, $db_name) or die("Can't select DB");
        debug("DB selected");
        $query = "CREATE TABLE projects (
                  project_id INT NOT NULL AUTO_INCREMENT,
                  PRIMARY KEY(PROJECT_ID),
                  project_owner CHAR(255),
                  project_name CHAR(255)
        )";
        mysqli_query($db_link, $query) or die("Can't create table: " . mysqli_error());
        debug("Table Created");
    }

    /**
     * Prepares database, creates if needed
     */
    public static function db_prep() {
        global $db_server, $db_name, $db_user, $db_password;
        $mysqli = new mysqli($db_server, $db_user, $db_password);
        /* check connection */
        if (mysqli_connect_errno()) {
            echo "Connect failed: " . mysqli_connect_error();
            exit();
        }
        $mysqli->select_db($db_name) OR db_tools::db_create($mysqli, $db_name);
        return $mysqli;
    }

    public static function sanitize($what, $how, $method = INPUT_GET) {
        $filtered = filter_input($method, $what, $how, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH);
        return $filtered;
    }

    public static function filter_vars($method = INPUT_GET) {
        $in["project_name"] = self::sanitize("project_name", FILTER_SANITIZE_STRING, $method);
        $in["project_owner"] = self::sanitize("project_owner", FILTER_SANITIZE_STRING, $method);

        if (isset($_REQUEST["project_id"])) {
            $in["project_id"] = trim(filter_var($_REQUEST["project_id"], FILTER_VALIDATE_INT));
        }
        return $in;
    }

    public static function check_vars_present($in, $keys) {
        foreach ($keys as $k) {
            if (!array_key_exists($k, $in)) {
                return false;
            }
        }
        return true;
    }

    public static function send_results($rows) {
        //global $force_json;
        $force_json = true;
        // Check for presence of "application/json" in the accept header
        $json = $force_json || !(stripos($_SERVER['HTTP_ACCEPT'], 'application/json') === FALSE);
        if ($json) {
            header("Content-Type: application/json");
            echo json_encode($rows);
        } else {
            header("Content-Type: text/plain");
            print_r($rows);
            if ($rows) {
                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        echo "project_id: ${row["project_id"]}\r\nproject_owner: {$row["project_owner"]}\r\nproject_name: ${row["project_name"]}\r\n\r\n";
                    }
                } else {
                    // inserts return the row ID
                    echo "{ 'project_id': $rows }";
                    echo "t" . true;
                    echo "f" . false;
                }
            } else {
                echo "Operation complete.";
            }
        }
    }

}
