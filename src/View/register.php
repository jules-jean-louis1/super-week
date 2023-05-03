<form action="" method="post">
    <input type="text" name="Email" placeholder="Email">
    <?php if (isset($errors['email'])): ?>
        <div class="error"><?= $errors['email'] ?></div>
    <?php endif ?>

    <input type="text" name="fname" placeholder="First Name">
    <?php if (isset($errors['fname'])): ?>
        <div class="error"><?= $errors['fname'] ?></div>
    <?php endif ?>

    <input type="text" name="lname" placeholder="Last Name">
    <?php if (isset($errors['lname'])): ?>
        <div class="error"><?= $errors['lname'] ?></div>
    <?php endif ?>

    <input type="password" name="Password" placeholder="password">
    <?php if (isset($errors['password'])): ?>
        <div class="error"><?= $errors['password'] ?></div>
    <?php endif ?>

    <input type="password" name="confirm_password" placeholder="confirm_password">
    <?php if (isset($errors['confirm_password'])): ?>
        <div class="error"><?= $errors['confirm_password'] ?></div>
    <?php endif ?>
    <button type="submit">Register</button>
</form>