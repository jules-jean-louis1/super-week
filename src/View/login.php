<form action="" method="post">
    <input type="text" name="Email" placeholder="Email">
    <?php if (isset($errors['email'])): ?>
        <div class="error"><?= $errors['email'] ?></div>
    <?php endif ?>

    <input type="password" name="Password" placeholder="password">
    <?php if (isset($errors['password'])): ?>
        <div class="error"><?= $errors['password'] ?></div>
    <?php endif ?>

    <button type="submit">Login</button>
</form>