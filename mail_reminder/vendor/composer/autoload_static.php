<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef6e3a22250a9685747c5c97982242ab
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef6e3a22250a9685747c5c97982242ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef6e3a22250a9685747c5c97982242ab::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
