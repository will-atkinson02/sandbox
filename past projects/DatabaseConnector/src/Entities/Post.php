<?php

declare(strict_types=1);

namespace past projects\DatabaseConnector\src\Entities;

class Post
{
    // Create properties for each column in the db
    private int $id;
    private string $title;
    private string $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}