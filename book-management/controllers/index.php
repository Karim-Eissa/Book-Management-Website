<?php

$heading="Welcome to the Library";
$config= require "config.php";
$db=new Database($config['database']);

$books=$db->query('select * from books LIMIT 3')->fetchAll();
require "views/index.view.php";