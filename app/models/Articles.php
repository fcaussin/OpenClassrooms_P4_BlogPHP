<?php
  namespace App\Models;


  class Articles
  {
    private $id,
            $title,
            $content,
            $dateArt,
            $statut;

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

    public function title()
    {
      return $this->title;
    }

    public function content()
    {
      return $this->content;
    }

    public function dateArt()
    {
      return $this->dateArt;
    }

    public function statut()
    {
      return $this->statut;
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

    public function setStatut($statut)
    {
      $this->statut = (int) $statut;
    }
  }
?>
