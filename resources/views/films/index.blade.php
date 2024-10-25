<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

<div class="flex flex-col min-h-screen">
    <?php require "../resources/views/layout/header.blade.php"?>

    <div class="py-10 pt-28 flex-grow">
        <div class="max-w-6xl mx-auto shadow-lg bg-white rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4 text-gray-800">Films</h1>
            <a href="/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Film</a>
            <div class="overflow-x-auto mt-4"> <!-- Afegit overflow-x-auto -->
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Director</th>
                        <th class="py-3 px-6 text-left">Year</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                        <th class="py-3 px-6 text-center">More Info</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <?php if (empty($films)): ?>
                    <tr>
                        <td colspan="6" class="py-3 px-6 text-center">No hi ha pelis disponibles.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($films as $film): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                        <td class="py-3 px-6"><?=$film['id'] ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($film['name']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($film['year']) ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="/edit/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700 transition mr-4">Edit</a>
                            <a href="/delete/<?= $film['id'] ?>" class="text-red-500 hover:text-red-700 transition">Delete</a>
                        </td>
                        <td class="text-center">
                            <a href="/show/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700 transition">More Info</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div> <!-- Fi de overflow-x-auto -->
        </div>
    </div>
    <?php require "../resources/views/layout/footer.blade.php"?>
</div>

</body>
</html>
