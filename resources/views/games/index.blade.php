<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

<div class="flex flex-col min-h-screen">
    <?php require "../resources/views/layout/header.blade.php"?>

    <div class="py-10 pt-28 flex-grow">
        <div class="max-w-6xl mx-auto shadow-lg bg-white rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4 text-gray-800">Games</h1>
            <a href="/games/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Game</a>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Developer</th>
                        <th class="py-3 px-6 text-left">Release Date</th>
                        <th class="py-3 px-6 text-center">Multiplayer</th>
                        <th class="py-3 px-6 text-center">Price</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <?php if (empty($games)): ?>
                    <tr>
                        <td colspan="6" class="py-3 px-6 text-center">No hi ha jocs disponibles.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($games as $game): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                        <td class="py-3 px-6"><?=$game['id'] ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['title']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['developer']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['release_date']) ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="/games/edit/<?= $game['id'] ?>" class="text-blue-500 hover:text-blue-700 transition mr-4">Edit</a>
                            <a href="/games/delete/<?= $game['id'] ?>" class="text-red-500 hover:text-red-700 transition">Delete</a>
                        </td>
                        <td class="text-center">
                            <a href="/games/show/<?= $game['id'] ?>" class="text-blue-500 hover:text-blue-700 transition">More Info</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require "../resources/views/layout/footer.blade.php"?>
</div>

</body>
</html>
