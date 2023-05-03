
<form action="" method="post">
    <input type="text" name="Email" placeholder="Email" class="p-2 bg-slate-200">
    <?php if (isset($errors['email'])): ?>
        <div class="error text-red-500 font-sm"><?= $errors['email'] ?></div>
    <?php endif ?>

    <input type="password" name="Password" placeholder="password" class="p-2 bg-slate-200">
    <?php if (isset($errors['password'])): ?>
        <div class="error text-red-500 font-sm"><?= $errors['password'] ?></div>
    <?php endif ?>

    <button type="submit" class="p-2 bg-red-400 text-white rounded-lg">Login</button>
</form>