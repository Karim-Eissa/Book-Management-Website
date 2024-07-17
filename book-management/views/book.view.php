<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>
<main>
    <div class="container mx-auto py-10">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 mb-4 md:mb-0">
                    <img class="w-full h-full object-cover rounded-lg" src="<?= htmlspecialchars($book['cover_image']) ?>" alt="Book Cover">
                </div>
                <div class="md:w-2/3 md:ml-8">
                    <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($book['title']) ?></h1>
                    <p class="text-gray-700 mb-2"><strong>Author:</strong> <?= htmlspecialchars($book['author']) ?></p>
                    <p class="text-gray-700 mb-2"><strong>Publishing Date:</strong> <?= htmlspecialchars($book['publishing_date']) ?></p>
                    <p class="text-gray-700 mb-4"><strong>Summary:</strong> <?= htmlspecialchars($book['summary']) ?></p>
                    <?php if (isset($errors['title'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                        <?php endif; ?>
                    <div class="flex space-x-4">
                        <button onclick="openEditForm()" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button>
                        <button onclick="openModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <div id="editForm" class="mt-8 hidden">
                <form action="/book-update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                        <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <?php if (isset($errors['title'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                        <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <?php if (isset($errors['author'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['author'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="publishing_date" class="block text-gray-700 font-bold mb-2">Publishing Date:</label>
                        <input type="date" id="publishing_date" name="publishing_date" value="<?= htmlspecialchars($book['publishing_date']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <?php if (isset($errors['publishing_date'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['publishing_date'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="cover_image" class="block text-gray-700 font-bold mb-2">Upload New Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <?php if (isset($errors['cover_image'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['cover_image'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="block text-gray-700 font-bold mb-2">Summary:</label>
                        <textarea id="summary" name="summary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($book['summary']) ?></textarea>
                        <?php if (isset($errors['summary'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['summary'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                        <button type="button" onclick="closeEditForm()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Background -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Book</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">Are you sure you want to delete this book?</p>
                </div>
                <div class="items-center px-4 py-3">
                    <form method="post" action="/book-delete">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Delete
                        </button>
                        <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function openModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

function openEditForm() {
    document.getElementById('editForm').classList.remove('hidden');
}

function closeEditForm() {
    document.getElementById('editForm').classList.add('hidden');
}
</script>

<?php require("partials/footer.php") ?>
