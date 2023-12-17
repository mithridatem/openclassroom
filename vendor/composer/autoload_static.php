<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0402fce2bd133814155710853ea583e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0402fce2bd133814155710853ea583e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0402fce2bd133814155710853ea583e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0402fce2bd133814155710853ea583e::$classMap;

        }, null, ClassLoader::class);
    }
}
