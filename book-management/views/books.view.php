<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>
<main>
    <div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            // Assuming $books is an array of books fetched from the database
            foreach ($books as $book) {
                echo '
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="' . htmlspecialchars($book['cover_image']) . '" alt="Book Cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold mb-2">' . htmlspecialchars($book['title']) . '</h2>
                        <p class="text-gray-700">by ' . htmlspecialchars($book['author']) . '</p>
                        <p class="text-gray-500 text-sm">Published on ' . htmlspecialchars($book['publishing_date']) . '</p>
                        <a href="book_details?id=' . htmlspecialchars($book['id']) . '" class="text-blue-500 hover:underline">View Details</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

</main>
<?php require("partials/footer.php") ?>
