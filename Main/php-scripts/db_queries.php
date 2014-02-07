<?php

class db_queries {

    public static function add_project($db_link, $project) {
        // add the product to the database
        $stmt = $db_link->stmt_init();
        $prep = $stmt->prepare("INSERT INTO projects (project_owner, project_name)
                                VALUES (?,?);");

        if ($prep) {
            $query = "SELECT project_name FROM projects WHERE project_owner=" . $project["project_owner"] . ";";
            $table = mysqli_query($db_link, $query);
            if (@mysql_num_rows($table) != 0) {
                debug("Project already exist");
            } else {
                $stmt->bind_param("ss", $project["project_owner"], $project["project_name"]);
                $exec = $stmt->execute();
                $stmt->close();
            }
        } else {
            debug("Couldn't prepare SQL insert statement");
        }

        return db_queries::get_all_projects($db_link, $project["project_owner"]);
    }

    public static function delete_project($db_link, $project) {
        $stmt = $db_link->stmt_init();
        $prep = $stmt->prepare("DELETE FROM projects WHERE project_id=?;");
        $stmt->bind_param("i", $project["project_id"]);
        $exec = $stmt->execute();
        $deleted = $stmt->affected_rows;
        $stmt->close();
        return $deleted;
    }

    public static function get_all_projects($db_link, $owner) {
        // return list of all owner's projects
        $rows = array();
        $query = "SELECT * FROM projects WHERE project_owner=" . $owner . ";";
        $table = mysqli_query($db_link, $query);
        while ($row = @mysqli_fetch_assoc($table)) {
            $rows[] = $row;
        }
        return $rows;
    }

}
