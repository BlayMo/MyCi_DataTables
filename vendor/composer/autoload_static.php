<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbdc6734eec5eb167f951d61b69f59dd
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbdc6734eec5eb167f951d61b69f59dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbdc6734eec5eb167f951d61b69f59dd::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbbdc6734eec5eb167f951d61b69f59dd::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
