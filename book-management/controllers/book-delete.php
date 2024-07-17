<?php

$config = require "config.php";
$db = new Database($config['database']);

// Get the book ID from the URL
$id = $_POST['id'];

// Check if the ID is provided
if ($id) {
    // Delete the book from the database
    $query = 'DELETE FROM books WHERE id = :id';
    $params = ['id' => $id];
    
    $db->query($query, $params);

    // Redirect to the books list page after deletion
    header('Location: /books');
    exit;
} else {
    // If no ID is provided, show an error or redirect to an error page
    echo "Book ID is required to delete a book.";
}
?>
