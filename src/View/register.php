<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
<?php require_once __DIR__ . '/../../elements/header.php'; ?>
<h1 class="text-center font-bold">Inscription</h1>
<div class="flex items-center justify-center">
    <form action="" method="post" id="formRegister" class="flex flex-col space-y-2 w-1/3">
        <input type="text" name="Email" placeholder="Email" class="bg-slate-100 rounded p-2">
        <div id="errorEmail"></div>
        <input type="text" name="fname" placeholder="First Name"  class="bg-slate-100 rounded p-2">
        <div id="errorfName"></div>
        <input type="text" name="lname" placeholder="Last Name" class="bg-slate-100 rounded p-2">
        <div id="errorlName"></div>
        <input type="password" name="Password" placeholder="password" class="bg-slate-100 rounded p-2">
        <div id="errorPassword"></div>
        <input type="password" name="confirm_password" placeholder="confirm_password" class="bg-slate-100 rounded p-2">
        <div id="errorC_Password"></div>
        <div id="alertError" class="h-[45px]"></div>
        <button type="submit" class="bg-purple-400 p-2 text-white font-semibold rounded">Register</button>
    </form>
</div>
</body>
<script defer src="/super-week/public/script/script.js"></script>
</html>
