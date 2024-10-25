<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head><body class="flex flex-col min-h-screen">

<!-- header -->
<?php require "layout/header.blade.php"; ?>

<main class="flex-grow flex items-center justify-center">
    <div class="text-center px-4">
        <h1 class="text-5xl font-extrabold mb-4 text-gray-900">Explora el nostre món</h1>
        <p class="text-lg text-gray-500 mb-12 max-w-xl mx-auto">Selecciona entre pel·lícules o videojocs i comença a explorar la nostra col·lecció. Hem preparat una selecció acurada només per a tu.</p>

        <div class="flex flex-col sm:flex-row gap-6 w-full sm:max-w-2xl mx-auto">
            <a href="/films" class="w-full p-8 bg-gray-200 rounded-lg shadow-sm transition-all duration-200 transform hover:shadow-md hover:scale-105 flex flex-col items-center justify-center text-center">
                <span class="text-3xl font-semibold mb-2 text-gray-700">🎬</span>
                <h2 class="text-xl font-bold text-gray-700">Pel·lícules</h2>
            </a>
            <a href="/games" class="w-full p-8 bg-gray-200	 rounded-lg shadow-sm transition-all duration-200 transform hover:shadow-md hover:scale-105 flex flex-col items-center justify-center text-center">
                <span class="text-3xl font-semibold mb-2 text-gray-700">🎮</span>
                <h2 class="text-xl font-bold text-gray-700">Videojocs</h2>
            </a>
        </div>
    </div>
</main>

<!-- Footer -->
<?php require "layout/footer.blade.php"; ?>

</body>
