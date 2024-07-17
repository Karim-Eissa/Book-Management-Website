<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-center">
            <!-- <div class="flex items-center">
                <div class="flex-shrink-0">
            </div> -->
            <div class="hidden md:block">
                <div class="flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/books" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/books') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white">Books</a>
                    <a href="/" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>">Home</a>
                    <a href="/add" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/add') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white">Add a book</a>
                </div>    
            </div>
        </div>
    </div>
</nav>

