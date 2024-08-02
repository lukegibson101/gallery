<?php

class User {

    public function find_all_users() {
        global $database;
        return $database->query("SELECT * FROM users");
    }
}

