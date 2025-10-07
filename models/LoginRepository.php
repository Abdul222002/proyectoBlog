<?php

class LoginRepository {
    public static function getUser($username, $password) {
        $db = Connection::connect();
        $q = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
        $result = $db->query($q);
        if ($row = mysqli_fetch_assoc($result)) {
            return new User($row['id'], $row['username'], $row['password'], $row['email']);
        }
        return null;
    }

    public static function createUser($username, $password, $confirmPassword, $email) {
        if ($password !== $confirmPassword) {
            return false;
        }

        $db = Connection::connect();
        $q = "INSERT INTO users (username, password, email) VALUES ('" . $username . "', '" . $password . "', '" . $email . "')";
        return $db->query($q);
    }

    public static function getUserById($id) {
        $db = Connection::connect();
        $q = "SELECT * FROM users WHERE id=" . $id;
        $result = $db->query($q);
        if ($row = mysqli_fetch_assoc($result)) {
            return new User($row['id'], $row['username'], $row['password'], $row['email']);
        }
        return null;
    }
}

?>