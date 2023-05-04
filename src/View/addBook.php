<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="/super-week/public/script/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Books</title>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<form action="" method="post" id="addBooksForm" class="flex flex-col space-y-2">
    <input type="text" name="title" placeholder="Titre du livre" class="p-2 bg-slate-200">
    <small class="error" id="titleError"></small>
    <textarea name="description" id="" cols="30" rows="10" placeholder="Description du livre" class="p-2 bg-slate-200"></textarea>
    <small class="error" id="descriptionError"></small>
    <div>
        <button type="submit" class="bg-green-400 p-2">Ajouter ce livre</button>
    </div>
        <div id="error"></div>
</form>
</body>
</html>