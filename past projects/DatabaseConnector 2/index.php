<?php

declare(strict_types=1);

require_once 'src/DatabaseConnector 2.php';
require_once 'src/Models/PostsModel.php';

$db = DatabaseConnector::connect();

// Instantiate the model, and give it the database connection it needs to do its job
$postsModel = new PostsModel($db);

$postsModel->createPost('Testing models', 'Does this work?', 'dog.jpg');

$post = $postsModel->getPostById(1);

echo displayPost($post);

function displayPost(Post $post): string  {
    return "<div>{$post['title']}</div>";
}
