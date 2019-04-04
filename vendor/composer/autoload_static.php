<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitedd0a7dad027a4ca434fa1125473d127
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitedd0a7dad027a4ca434fa1125473d127::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitedd0a7dad027a4ca434fa1125473d127::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
