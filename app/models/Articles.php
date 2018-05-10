<?php
  namespace App\Models;


  class Articles
  {
    private $id,
            $title,
            $content,
            $dateArt;

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

    public function getTitle()
    {
      return $this->title;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function getDateArt()
    {
      return $this->dateArt;
    }

    // SETTERS

    public function setId($id)
    {
      $this->id = (int) $id;
    }

    public function setTitle($title)
    {
      if (is_string($title)) {
        $this->title = $title;
      }
    }

    public function setContent($content)
    {
      if (is_string($content)) {
        $this->content = $content;
      }
    }

    public function setDateArt($dateArt)
    {
      $this->dateArt = $dateArt;
    }
  }
?>
