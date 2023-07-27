<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd8a2a3f4793b6163980b5bf39fe68266
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

        spl_autoload_register(array('ComposerAutoloaderInitd8a2a3f4793b6163980b5bf39fe68266', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd8a2a3f4793b6163980b5bf39fe68266', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd8a2a3f4793b6163980b5bf39fe68266::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
