<?php

class PostManager extends Model
{
    public function getAllPost()
    {
        return $this->getAll("post", "post");
    }
}
