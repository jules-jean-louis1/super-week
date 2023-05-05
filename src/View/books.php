<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="/super-week/public/script/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<div class="flex flex-col items-center justify-center">
    <h1 class="text-center font-bold text-2xl">Liste des livres</h1>
    <button id="buttonDisplayBooks" class="p-2 rounded bg-blue-500 hover:bg-blue-800 mt-6 text-white">Afficher la liste des livres</button>
</div>
<div id="displayAllBooks" class="hidden"></div>
<?php require_once __DIR__ . '/../../elements/footer.php'; ?>
</body>
</html>
