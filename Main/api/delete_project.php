<?php

include '../php-scripts/db_config.php';
include '../php-scripts/db_tools.php';
include '../php-scripts/db_queries.php';



//check if all variable are present
$var_list = array("project_id");
$in = db_tools::filter_vars(INPUT_GET);
$required_vars_are_present = db_tools::check_vars_present($in, $var_list);
if ($required_vars_are_present) {
    $db_link = db_tools::db_prep();
    $deleted_count = db_queries::delete_project($db_link, $in["project_id"]);
    $rows = db_queries::get_all_projects($db_link, $in["project_owner"]);
    echo "<table>";
    foreach ($rows as $row) {
        echo "<tr><td><a href=\"./projects_pages/" . $row["project_id"] . ".php\">" . $row["project_name"] . "</a></td></tr>";
    }
    echo "</table>";
    $db_link->close();
} else {
    header("HTTP/1.0 400 Bad Request");
    header("x-failure-detail: Not all expected fields were present.");
    echo '{
                    "error_message": "not all required fields were provided.",
                    "error_required_fields": ' . json_encode($in) . '
                    }';
}
?>