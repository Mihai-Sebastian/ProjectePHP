<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Game</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
<div class="flex flex-col h-screen justify-between">

    <?php require "../resources/views/layout/header.blade.php"?>

    <div class="py-10 pt-40">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-4xl font-bold mb-4">Game Details</h1>
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold">Title: <span class="text-blue-600"><?= htmlspecialchars($game->title) ?></span></h2>
                    <p class="text-gray-700"><strong>Developer:</strong> <?= htmlspecialchars($game->developer) ?></p>
                    <p class="text-gray-700"><strong>Release Date:</strong> <?= htmlspecialchars($game->release_date) ?></p>
                    <p class="text-gray-700"><strong>Rating:</strong> <?= htmlspecialchars($game->rating) ?></p>
                    <p class="text-gray-700"><strong>Platform:</strong> <?= htmlspecialchars($game->platform) ?></p>
                    <p class="text-gray-700"><strong>Multiplayer:</strong> <?= htmlspecialchars($game->multiplayer ? 'Yes' : 'No') ?></p>
                    <p class="text-gray-700"><strong>Price:</strong> €<?= htmlspecialchars(number_format($game->price, 2)) ?></p>
                    <p class="text-gray-700"><strong>Genres:</strong></p>
                    <ul class="list-disc list-inside">
                        <?php foreach ($genres as $genre): ?>
                        <li class="text-gray-600"><?= htmlspecialchars($genre[1]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <a href="/games" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Back to Games</a>
            </div>
        </div>
    </div>
    <?php require "../resources/views/layout/footer.blade.php"?>
</div>

</body>
</html>
