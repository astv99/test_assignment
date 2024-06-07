<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cd5c7c027f380d86c9e3e7d49834a82
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SyncService\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SyncService\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7cd5c7c027f380d86c9e3e7d49834a82::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7cd5c7c027f380d86c9e3e7d49834a82::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7cd5c7c027f380d86c9e3e7d49834a82::$classMap;

        }, null, ClassLoader::class);
    }
}
