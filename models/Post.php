<?php

class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_create_date;

    // Constructeur
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set".ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Setters
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }
    
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }
    
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }
    
    public function setCreate_date($create_date)
    {
        $this->_create_date = $create_date;
    }

    // Getters
    public function getId()
    {
        return $this->_id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getCreate_date()
    {
        return $this->_create_date;
    }
}
