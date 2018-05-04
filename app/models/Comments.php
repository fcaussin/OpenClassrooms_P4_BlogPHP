<?php
  namespace App\Models;


  class Comments
  {
    private $id,
            $articleId,
            $author,
            $comment,
            $dateCom;

    public function hydrate($data)
    {
      foreach ($data as $key => $value) {
        $method = "set".ucfirst($key);

        if (is_callable($this, $method)) {
          $this->$method($value);
        }
      }
    }

    public function __construct(array $data =[])
    {
      if (!empty($data)) {
        $this->hydrate($data);
      }
    }

    // GETTERS

    public function getId()
    {
      return $this->id;
    }

    public function getArticleId()
    {
      return $this->articleId;
    }

    public function getAuthor()
    {
      return $this->author;
    }

    public function getComment()
    {
      return $this->comment;
    }

    public function getDateCom()
    {
      return $this->dateCom;
    }

    // SETTERS

    public function setId($id)
    {
      $this->id = (int) $id;
    }

    public function setArticleId($articleId)
    {
      $this->articleId = (int) $articleId;
    }

    public function setAuthor($author)
    {
      if (is_string($author)) {
        $this->author = $author;
      }
    }

    public function setComment($comment)
    {
      if (is_string($comment)) {
        $this->comment = $comment;
      }
    }

    public function setDateCom($dateCom)
    {
      $this->dateCom = $dateCom;
    }
  }
?>
