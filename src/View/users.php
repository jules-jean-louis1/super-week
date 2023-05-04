<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="/super-week/public/script/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<div class="flex justify-center">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="displayAllUsers" type="button">
        Afficher tous les utilisateurs
    </button>
</div>
<div class="flex justify-center">
    <div class="w-full flex flex-wrap" id="displayUsers"></div>
</div>
</body>
</html>
