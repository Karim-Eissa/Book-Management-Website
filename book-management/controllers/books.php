<?php

$heading="Available books";
$config= require "config.php";
$db=new Database($config['database']);

$books=$db->query('select * from books')->fetchAll();

require "views/books.view.php";