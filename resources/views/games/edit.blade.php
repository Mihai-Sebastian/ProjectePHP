<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">

<?php require "../resources/views/layout/header.blade.php"; ?>
<div class="py-10 pt-28 flex-grow flex items-center justify-center">
    <div class="max-w-3xl w-full bg-white shadow-md rounded-lg p-8 text-center">
        <h1 class="text-3xl font-bold mb-6">Edit Game</h1>
        <form action="/games/update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($game->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">

            <div class="mb-6">
                <label for="title" class="block text-gray-700">Title:</label>
                <input type="text" name="title" value="<?= htmlspecialchars($game->title) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
            </div>

            <div class="mb-6">
                <label for="developer" class="block text-gray-700">Developer:</label>
                <input type="text" name="developer" value="<?= htmlspecialchars($game->developer) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
            </div>

            <div class="mb-6">
                <label for="release_date" class="block text-gray-700">Release Date:</label>
                <input type="date" name="release_date" value="<?= htmlspecialchars($game->release_date) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
            </div>

            <div class="mb-6">
                <label for="rating" class="block text-gray-700">Rating (0 - 5):</label>
                <input type="number" step="0.5" min="0" max="5" name="rating" value="<?= htmlspecialchars($game->rating) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
            </div>

            <div class="mb-6">
                <label for="platform" class="block text-gray-700">Platform:</label>
                <input type="text" name="platform" value="<?= htmlspecialchars($game->platform) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
            </div>

            <div class="mb-6">
                <label for="multiplayer" class="block text-gray-700">Multiplayer:</label>
                <select name="multiplayer" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="1" <?= $game->multiplayer == '1' ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= $game->multiplayer == '0' ? 'selected' : '' ?>>No</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="price" class="block text-gray-700">Price:</label>
                <input type="number" step="0.01" min="0" name="price" value="<?= htmlspecialchars($game->price) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700">Genres:</label>
                <div class="mt-1 flex flex-wrap justify-center space-x-4">
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
        <a href="/games" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>
