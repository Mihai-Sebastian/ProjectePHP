<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">

<?php require "../resources/views/layout/header.blade.php" ?>
<div class="py-10 pt-28 flex-grow">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Add New Film</h1>
        <form action="/store" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter film title">
            </div>

            <div class="mb-4">
                <label for="director" class="block text-sm font-medium text-gray-700">Director:</label>
                <input type="text" name="director" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter director's name">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Release Year:</label>
                <input type="number" name="year" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter release year">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                          placeholder="Enter a description"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Genres:</label>
                <div class="mt-1">
                    <label><input type="checkbox" name="genres[]" value="1"> Action</label><br>
                    <label><input type="checkbox" name="genres[]" value="2"> Comedy</label><br>
                    <label><input type="checkbox" name="genres[]" value="3"> Drama</label><br>
                    <label><input type="checkbox" name="genres[]" value="4"> Horror</label><br>
                    <label><input type="checkbox" name="genres[]" value="5"> Sci-Fi</label><br>
                    <label><input type="checkbox" name="genres[]" value="6"> Romance</label><br>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Film
            </button>
        </form>
        <a href="/films" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
</div>
<?php require "../resources/views/layout/footer.blade.php" ?>
</body>
</html>
