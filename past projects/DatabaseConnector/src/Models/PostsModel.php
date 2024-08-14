<?php

declare(strict_types=1);

namespace past projects\DatabaseConnector\src\Models;

use pastuse;
use Post;

pastuse pastrequire_once 'src/Entities/Post.php';
class PostsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPosts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts`;');
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getPostById(int $id): Post
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `image` FROM `posts` WHERE `id` = :id');
        // Tells PDO to put the data into the Post entity class, rather than an assoc array
        $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function createPost(string $title, string $content, string $image): bool
    {
        $query = $this->db->prepare('INSERT INTO `posts` (`title`, `content`, `image`) VALUES (:title, :content, :image);');
        return $query->execute([
            'title' => $title,
            'content' => $content,
            'image' => $image
        ]);
    }
}