<header class="bg-blue-900 text-white font-semibold mb-4">
    <nav class="flex flex-row w-full justify-between py-4 px-2">
        <ul class="flex space-x-2">
            <li><a href="/super-week">HomePage</a></li>
            <li><a href="/super-week/book/">Book</a></li>
            <li><a href="/super-week/books/">Books</a></li>
            <li><a href="/super-week/addbook/">Add Book</a></li>
            <li><a href="/super-week/user/">User</a></li>
            <li><a href="/super-week/users/">Users</a></li>
        </ul>
        <ul class="flex space-x-2">
            <?php if (isset($_SESSION['id'])) : ?>
                <li><a href="/super-week/login/"><?= $_SESSION['email']['first_name'] ?></a></li>
                <li><a href="/super-week/logout/">Logout</a></li>
            <?php else : ?>
                <li><a href="/super-week/login/">Login</a></li>
                <li><a href="/super-week/register/">Register</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>