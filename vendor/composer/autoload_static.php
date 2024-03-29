<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16e3ac3e8fb590647dd1062dac3e4c23
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\Barcode\\' => 15,
        ),
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\Barcode\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit16e3ac3e8fb590647dd1062dac3e4c23::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16e3ac3e8fb590647dd1062dac3e4c23::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit16e3ac3e8fb590647dd1062dac3e4c23::$classMap;

        }, null, ClassLoader::class);
    }
}
