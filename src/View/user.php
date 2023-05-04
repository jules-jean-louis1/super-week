<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="/super-week/public/script/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<div class="flex flex-col items-center justify-center">
    <h1 class="text-3xl font-bold">Rechercher un utilisateur</h1>
    <div class="mt-6">
        <form action="" method="post" id="btnSpecificUser">
            <input type="number" class="p-2 bg-slate-100" min="1" max="500" id="user_id" name="user_id">
            <button type="submit" class="bg-orange-200 p-2 font-semibold">Rechercher</button>
        </form>
    </div>
</div>
<div class="flex justify-center">
    <div class="w-full flex flex-wrap" id="displaySpecificUser"></div>
</div>
</body>
</html>