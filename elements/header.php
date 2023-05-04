<header>
    <nav class="flex flex-row w-full justify-between py-4 px-2">
        <ul class="flex space-x-2">
            <li><a href="">HomePage</a></li>
            <li><a href="">Book</a></li>
            <li><a href="">Books</a></li>
            <li><a href="">Add Book</a></li>
            <li><a href="">User</a></li>
            <li><a href="">Users</a></li>
        </ul>
        <ul class="flex space-x-2">
            <li><a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/src/View/login/">Login</a></li>
            <?php if (isset($_SESSION['id'])) : ?>
                <li><a href="">Logout</a></li>
            <?php else : ?>
                <li><a href="">Register</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>