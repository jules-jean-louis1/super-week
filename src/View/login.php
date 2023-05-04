<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!--    <script defer src="/super-week/public/script/script.js"></script>-->
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php require_once __DIR__ . '/../../elements/header.php'; ?>
    <h1 class="text-center font-bold text-2xl">Connexion</h1>
    <div class="flex justify-center">
        <form action="" method="post" class="flex flex-col space-y-2 w-1/3" id="formLogin">
            <input type="email" name="Email" placeholder="Email" class="p-2 bg-slate-200">
                <div class="errorEmail text-red-500 font-sm" id="errorEmail"></div>

            <input type="password" name="Password" placeholder="password" class="p-2 bg-slate-200">
                <div class="error text-red-500 font-sm" id="errorPassword"></div>
            <div id="alertMessage" class="h-[45px]"></div>
            <button type="submit" class="p-2 bg-red-400 text-white rounded-lg">Login</button>
        </form>
    </div>
</body>
</html>
