<?php

session_start();
$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Validate input fields
    if (empty(trim($_POST['title']))) {
        $errors['title'] = 'Title is required';
    } elseif (strlen(trim($_POST['title'])) > 50) {
        $errors['title'] = 'Title must be less than 50 characters';
    }

    if (empty(trim($_POST['author']))) {
        $errors['author'] = 'Author is required';
    } elseif (strlen(trim($_POST['author'])) > 50) {
        $errors['author'] = 'Author must be less than 50 characters';
    }

    if (empty(trim($_POST['publishing_date']))) {
        $errors['publishing_date'] = 'Publishing date is required';
    }

    if (empty(trim($_POST['summary']))) {
        $errors['summary'] = 'Summary is required';
    } elseif (strlen(trim($_POST['summary'])) > 1000) {
        $errors['summary'] = 'Summary must be less than 1000 characters';
    }

    // Handle file upload
    $cover_image = null;
    $upload_dir = 'book_covers/';

    if ($_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['cover_image']['tmp_name'];
        $image_info = getimagesize($tmp_name);

        // Check if is a valid image file
        if ($image_info) {
            $image_extension = image_type_to_extension($image_info[2], true);
            $image_name = bin2hex(random_bytes(16)) . $image_extension;
            $cover_image = $upload_dir . $image_name;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($tmp_name, $cover_image)) {
                // File uploaded successfully
            } else {
                $errors['cover_image'] = 'Failed to upload cover image.';
            }
        } else {
            $errors['cover_image'] = 'Uploaded file is not a valid image.';
        }
    } else {
        $errors['cover_image'] = 'Cover image is required';
    }

    // Process form if no errors
    if (empty($errors)) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publishing_date = $_POST['publishing_date'];
        $summary = $_POST['summary'];
        
        // Insert data into the database
        $query = 'UPDATE books SET title = :title, author = :author, publishing_date = :publishing_date, cover_image = :cover_image, summary = :summary WHERE id = :id';
        $params = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'publishing_date' => $publishing_date,
            'cover_image' => $cover_image,
            'summary' => $summary
        ];
        // Execute the query
        $db->query($query, $params);

        // Optionally redirect after successful insertion
        header('Location: /book_details?id=' . $id);
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['formData'] = $_POST;
        header('Location: /book_details?id=' . $_POST['id']);
        exit;
    }
}
