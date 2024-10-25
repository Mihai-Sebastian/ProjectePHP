<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">

<?php require "../resources/views/layout/header.blade.php"; ?>
<div class="py-10 pt-28 flex-grow flex items-center justify-center">
    <div class="max-w-3xl w-full bg-white shadow-md rounded-lg p-8 text-center">
        <h1 class="text-3xl font-bold mb-6">Edit Film</h1>
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">

            <div class="mb-6">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($film->name) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-6">
                <label for="director" class="block text-gray-700">Director:</label>
                <input type="text" name="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-6">
                <label for="year" class="block text-gray-700">Year:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($film->year) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2"><?= htmlspecialchars($film->description) ?></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700">Genres:</label>
                <div class="mt-1 flex flex-wrap justify-center space-x-4"> <!-- Flex per mostrar en horitzontal -->
                    <?php foreach ($allGenres as $genre): ?>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="genres[]" value="<?= $genre[0] ?>" <?= in_array($genre[0], array_column($genres, 0)) ? 'checked' : '' ?> class="form-checkbox text-blue-500">
                        <span class="ml-2 text-gray-600"><?= htmlspecialchars($genre[1]) ?></span>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Edit</button>
        </form>
        <a href="/films" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>
