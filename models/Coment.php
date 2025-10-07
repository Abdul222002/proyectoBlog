<?php
class Comment {
    private $id;
    private $postId;
    private $authorId;
    private $text;
    private $date;

    public function __construct($id, $postId, $authorId, $text, $date) {
        $this->id = $id;
        $this->postId = $postId;
        $this->authorId = $authorId;
        $this->text = $text;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return PostRepository::getPostById($this->postId);
    }

    public function getAuthorId() {
        return LoginRepository::getUserById($this->authorId);
    }

    public function getText() {
        return $this->text;
    }

    public function getDate() {
        return $this->date;
    }
}
?>