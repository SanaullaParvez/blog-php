<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc16f3e7f88ecb13752a0b1425b136a3f
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc16f3e7f88ecb13752a0b1425b136a3f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc16f3e7f88ecb13752a0b1425b136a3f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
