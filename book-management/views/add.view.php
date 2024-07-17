<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <form action="/add" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" name="title" type="text" placeholder="Book Title" >
                        <?php if (isset($errors['title'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                        <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="author">
                        Author
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="author" name="author" type="text" placeholder="Author Name" >
                        <?php if (isset($errors['author'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['author'] ?></p>
                        <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="publishing_date">
                        Publishing Date
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="publishing_date" name="publishing_date" type="date" >
                        <?php if (isset($errors['publishing_date'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['publishing_date'] ?></p>
                        <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cover_image">
                        Cover Image
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cover_image" name="cover_image" type="file" accept="image/*" >
                        <?php if (isset($errors['cover_image'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['cover_image'] ?></p>
                        <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="summary">
                        Summary
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="summary" name="summary" rows="4" placeholder="Write a short summary of the book" ><?= $_POST['summary'] ?? '' ?></textarea>
                        <?php if (isset($errors['summary'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['summary'] ?></p>
                        <?php endif; ?>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Add Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require("partials/footer.php") ?>
