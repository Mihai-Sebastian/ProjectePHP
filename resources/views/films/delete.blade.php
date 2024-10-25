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
<div class="py-10 pt-28 flex-grow flex items-center justify-center"> <!-- Afegit flex, items-center, justify-center -->
    <div class="max-w-md bg-white shadow-md rounded-lg p-6 text-center"> <!-- Afegit text-center -->
        <h1 class="text-3xl font-bold mb-4">Delete Film</h1>
        <p>Vols eliminar la peli "<?= htmlspecialchars($film->name) ?>"?</p>
        <form action="/destroy" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $film->id ?>">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
        </form>
        <a href="/films" class="text-gray-500 hover:underline mt-4 block">Cancel</a>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php" ?>
</body>
</html>

