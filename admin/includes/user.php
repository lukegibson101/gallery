<?php

class User {

    public static function find_all_users() {
        global $database;
        return $database->query("SELECT * FROM users");
    }
}

