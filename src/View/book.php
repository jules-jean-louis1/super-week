<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><</title>
</head>
<body>
<h1 class="text-center font-bold">Information sur :<b class="livreTitle"></b></h1>
<div class="flex flex-col items-center justify-center">
    <div class="mt-6">
        <form action="" method="post" id="btnSpecificBook">
            <input type="number" class="p-2 bg-slate-100" min="1" max="500" id="book_id" name="book_id">
            <button type="submit" class="bg-orange-200 p-2 font-semibold">Rechercher</button>
        </form>
    </div>
</div>
<div class="flex justify-center">
    <div id="displaySpecificBook"></div>
    <!--<table class="border border-gray-400">
        <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-400 px-4 py-2">Titre</th>
            <th class="border border-gray-400 px-4 py-2">Contenu</th>
            <th class="border border-gray-400 px-4 py-2">Ajouté par</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="border border-gray-400 px-4 py-2"><?php /*= $book['title'] */?></td>
            <td class="border border-gray-400 px-4 py-2 max-w-40p w-7/12"><?php /*= $book['content'] */?></td>
            <td class="border border-gray-400 px-4 py-2"><?php /*= $book['first_name'] */?> <?php /*= $book['last_name'] */?></td>
        </tr>
        </tbody>
    </table>-->
</div>
</body>
</html>