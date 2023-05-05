<header class="bg-blue-900 text-white font-semibold mb-4">
    <nav class="flex flex-row w-full justify-between py-4 px-2">
        <ul class="flex space-x-2">
            <li><a href="/super-week">HomePage</a></li>
            <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/src/View/book/">Book</a></li>
            <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/books/">Books</a></li>
            <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/src/View/addbook/">Add Book</a></li>
            <li><a href="">User</a></li>
            <li><a href="">Users</a></li>
        </ul>
        <ul class="flex space-x-2">
            <?php if (isset($_SESSION['id'])) : ?>
                <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/src/View/login/"><?= $_SESSION['email']['first_name'] ?></a></li>
                <li><a href="">Logout</a></li>
            <?php else : ?>
                <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/src/View/login/">Login</a></li>
                <li><a href="">Register</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>