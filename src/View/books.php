<?php
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
<h1 class="text-center font-bold">Liste des livres</h1>
<table class="border border-gray-400">
    <thead class="bg-gray-200">
    <tr>
        <th class="border border-gray-400 px-4 py-2">Titre</th>
        <th class="border border-gray-400 px-4 py-2">Contenu</th>
        <th class="border border-gray-400 px-4 py-2">Ajouté par</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td class="border border-gray-400 px-4 py-2"><?= $book['title'] ?></td>
            <td class="border border-gray-400 px-4 py-2 max-w-40p w-7/12"><?= $book['content'] ?></td>
            <td class="border border-gray-400 px-4 py-2"><?= $book['first_name'] ?> <?= $book['last_name'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>