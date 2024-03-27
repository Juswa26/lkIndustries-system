<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1526ec4099cc0137a5638c6d53ec918
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1526ec4099cc0137a5638c6d53ec918::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1526ec4099cc0137a5638c6d53ec918::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1526ec4099cc0137a5638c6d53ec918::$classMap;

        }, null, ClassLoader::class);
    }
}
