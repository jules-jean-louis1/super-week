<html lang="fr">
<body>
<form action="" method="post" id="addBooksForm" class="flex flex-col space-y-2">
    <input type="text" name="title" placeholder="Titre du livre" class="p-2 bg-slate-200">
    <small class="error" id="titleError"></small>
    <textarea name="description" id="" cols="30" rows="10" placeholder="Description du livre"
              class="p-2 bg-slate-200"></textarea>
    <small class="error" id="descriptionError"></small>
    <div>
        <button type="submit" class="bg-green-400 p-2">Ajouter ce livre</button>
    </div>
        <div id="error"></div>
</form>
</body>
</html>