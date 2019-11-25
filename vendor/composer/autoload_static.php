<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb5b8fa6de36d00776f44bda736cb8cb5
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Engine\\DI\\' => 10,
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/Di',
        ),
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb5b8fa6de36d00776f44bda736cb8cb5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb5b8fa6de36d00776f44bda736cb8cb5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
