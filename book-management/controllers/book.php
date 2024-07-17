<?php

$config = require "config.php";
$db = new Database($config['database']);

$id = $_GET['id'];
$book = $db->query('SELECT * FROM books WHERE id = :id', ['id' => $id])->fetch();
if (!$book) {
    abort();
}
$heading = $book['title'];

require "views/book.view.php";
