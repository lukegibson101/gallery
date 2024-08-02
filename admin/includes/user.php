<?php

class User {

    public $id;

    public static function find_all_users() {
        global $database;
        return $database->query("SELECT * FROM users");
    }

    public static function find_user_by_id($id) {
        global $database;
        $result = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        return mysqli_fetch_array($result);
    }
}

