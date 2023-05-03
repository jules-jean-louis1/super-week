<div class="flex flex-col justify-center items-start space-y-4 w-1/4">
    <div class="w-full">
        <h1 class="font-semibold bg-blue-100">Page de l'utilisateur:
            <p><?= $user['first_name'] . " " . $user['last_name'] ?></p></h1>
        <p>Prénom: <?= $user['first_name'] ?></p>
        <p>Nom: <?= $user['last_name'] ?></p>
        <p>Email: <?= $user['email'] ?></p>
        <p>ID: <?= $user['id'] ?></p>
    </div>
</div>