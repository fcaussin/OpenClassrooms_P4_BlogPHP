<?php
  namespace App\Models;


  class Comments
  {
    private $id,
            $articleId,
            $username,
            $comment,
            $dateCom,
            $report;

    public function hydrate($data)
    {
      foreach ($data as $key => $value) {
        $method = "set".ucfirst($key);

        if (method_exists($this, $method)) {
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

    public function id()
    {
      return $this->id;
    }

    public function articleId()
    {
      return $this->articleId;
    }

    public function username()
    {
      return $this->username;
    }

    public function comment()
    {
      return $this->comment;
    }

    public function dateCom()
    {
      return $this->dateCom;
    }

    public function report()
    {
      return $this->report;
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

    public function setUsername($username)
    {
      if (is_string($username)) {
        $this->username = $username;
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

    public function setReport($report)
    {
      $this->report = (int) $report;
    }
  }
?>
