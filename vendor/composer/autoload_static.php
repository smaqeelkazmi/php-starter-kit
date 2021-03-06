<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1ac0956ce9a9d6d84a6b7573bf29a48
{
    public static $files = array (
        'aedd43e754c6bc762b16db825720bbef' => __DIR__ . '/../..' . '/utilities/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
            'Middleware\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'Middleware\\' => 
        array (
            0 => __DIR__ . '/../..' . '/middleware',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1ac0956ce9a9d6d84a6b7573bf29a48::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1ac0956ce9a9d6d84a6b7573bf29a48::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
