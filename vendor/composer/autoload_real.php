<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfb70a5d806d04ad0a4e65f1b1ff17328
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitfb70a5d806d04ad0a4e65f1b1ff17328', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfb70a5d806d04ad0a4e65f1b1ff17328', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfb70a5d806d04ad0a4e65f1b1ff17328::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
