
<?php
class Post{

    private $id;
    private $title;
    private $text;
    private $author;
    private $date;

    public function __construct($id, $title, $text, $author, $date){
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
        $this->date = $date;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getText(){
        return $this->text;
    }
    public function getAuthor(){
        return LoginRepository::getUserById($this->author);
    }
    public function getDate(){
        return $this->date;
    }
    public function getComments(){
        return CommentRepository::getCommentsByPostId($this->id);
    }
}
?>                              