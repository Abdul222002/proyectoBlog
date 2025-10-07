<?php

class CommentRepository {

    public static function addComment($postId, $authorId, $text) {
        $db = Connection::connect();
        $q = "INSERT INTO comment (postId, authorId, text) VALUES ('" . $postId . "', '" . $authorId . "', '" . $text . "')";
        return $db->query($q);
    }

    public static function getCommentsByPostId($postId) {
        $db = Connection::connect();
        $q = "SELECT * FROM comment WHERE postId=" . $postId;
        $result = $db->query($q);
        $comments = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = new Comment($row['id'], $row['postId'], $row['authorId'], $row['text'], $row['date']);
        }
        return $comments;
    }

    public static function getCommentById($id) {
        $db = Connection::connect();
        $q = "SELECT * FROM comment WHERE id=" . $id;
        $result = $db->query($q);   
        if ($row = mysqli_fetch_assoc($result)) {
            return new Comment($row['id'], $row['postId'], $row['authorId'], $row['text'], $row['date']);
        }
        return null;
    }


    public static function deleteComment($id) {
        $db = Connection::connect();
        $q = "DELETE FROM comment WHERE id=" . $id;
        return $db->query($q);
    }
}