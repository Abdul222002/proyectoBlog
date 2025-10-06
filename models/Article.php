
<?php

class Article{

    private $id;
    private $title;
    private $text;
    private $author;

    public function __construct($id, $title, $text, $author){
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
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
        return $this->author;
    }

}

?>