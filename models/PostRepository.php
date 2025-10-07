<?php

class PostRepository {

    public static function getAllPosts() {
        $db = Connection::connect();
        $q = "SELECT * FROM article";
        $result = $db->query($q);
        $posts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = new Post($row['id'], $row['title'], $row['text'], $row['author'], $row['date']);
        }
        return $posts;
    }

    public static function addPost($title, $text, $author) {
        $db = Connection::connect();
        $q = "INSERT INTO article (id,title, text, author) VALUES (NULL, '" . $title . "', '" . $text . "', '" . $author . "')";
        return $db->query($q);
    }

    public static function deletePost($id) {
        $db = Connection::connect();
        $q = "DELETE FROM article WHERE id=" . $id;
        return $db->query($q);
    }

    public static function getPostById($id) {
        $db = Connection::connect();
        $q = "SELECT * FROM article WHERE id=" . $id;
        $result = $db->query($q);   
        if ($row = mysqli_fetch_assoc($result)) {
            return new Post($row['id'], $row['title'], $row['text'], $row['author'], $row['date']);
        }
        return null;
    }

}

?>