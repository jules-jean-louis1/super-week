<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="/super-week/public/script/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
</head>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<h1 class="text-center font-bold">Information sur :<b id="livreTitle"></b></h1>
<div class="flex flex-col items-center justify-center">
    <div class="mt-6">
        <form action="" method="post" id="btnSpecificBook">
            <input type="number" class="p-2 bg-slate-100" min="1" max="500" id="book_id" name="book_id">
            <button type="submit" class="bg-orange-500 rounded p-2 font-semibold">Rechercher</button>
        </form>
    </div>
</div>
<div class="flex justify-center">
    <div id="displaySpecificBook"></div>
</div>
<?php require_once __DIR__ . '/../../elements/footer.php'; ?>
</body>
</html>