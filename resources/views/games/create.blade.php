<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">

<?php require "../resources/views/layout/header.blade.php" ?>
<div class="py-10 pt-28 flex-grow">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Add New Game</h1>
        <form action="/games/store" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter game title">
            </div>

            <div class="mb-4">
                <label for="developer" class="block text-sm font-medium text-gray-700">Developer:</label>
                <input type="text" name="developer" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter developer's name">
            </div>

            <div class="mb-4">
                <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date:</label>
                <input type="date" name="release_date" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
                <input type="number" name="rating" required step="0.5" min="0" max="5"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter game rating (0 - 5)">
            </div>


            <div class="mb-4">
                <label for="platform" class="block text-sm font-medium text-gray-700">Platform:</label>
                <input type="text" name="platform" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter platform (e.g. PC, PS5, Xbox)">
            </div>

            <div class="mb-4">
                <label for="multiplayer" class="block text-sm font-medium text-gray-700">Multiplayer:</label>
                <select name="multiplayer" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="1">Yes</option>
                    <option selected value="0">No</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" name="price" required step="0.01"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                       placeholder="Enter game price">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Genres:</label>
                <div class="mt-1 flex flex-wrap">
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="1" class="form-checkbox text-blue-500">
                        <span class="ml-2">Action</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="2" class="form-checkbox text-blue-500">
                        <span class="ml-2">Comedy</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="3" class="form-checkbox text-blue-500">
                        <span class="ml-2">Drama</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="4" class="form-checkbox text-blue-500">
                        <span class="ml-2">Horror</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="5" class="form-checkbox text-blue-500">
                        <span class="ml-2">Sci-Fi</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="6" class="form-checkbox text-blue-500">
                        <span class="ml-2">Romance</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="7" class="form-checkbox text-blue-500">
                        <span class="ml-2">Adventure</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="8" class="form-checkbox text-blue-500">
                        <span class="ml-2">Fantasy</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="9" class="form-checkbox text-blue-500">
                        <span class="ml-2">Thriller</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="10" class="form-checkbox text-blue-500">
                        <span class="ml-2">Historical</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="11" class="form-checkbox text-blue-500">
                        <span class="ml-2">Platformer</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="12" class="form-checkbox text-blue-500">
                        <span class="ml-2">RPG</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="13" class="form-checkbox text-blue-500">
                        <span class="ml-2">Simulation</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="14" class="form-checkbox text-blue-500">
                        <span class="ml-2">Sports</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="15" class="form-checkbox text-blue-500">
                        <span class="ml-2">Strategy</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="16" class="form-checkbox text-blue-500">
                        <span class="ml-2">Puzzle</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="17" class="form-checkbox text-blue-500">
                        <span class="ml-2">Fighting</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="18" class="form-checkbox text-blue-500">
                        <span class="ml-2">Stealth</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="19" class="form-checkbox text-blue-500">
                        <span class="ml-2">Racing</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="genres[]" value="20" class="form-checkbox text-blue-500">
                        <span class="ml-2">MMORPG</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Game</button>
        </form>
        <a href="/games" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
</div>
<?php require "../resources/views/layout/footer.blade.php" ?>
</body>
</html>
