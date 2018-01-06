<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit432af859af4e636a59225e131cf25664
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webmozart\\PathUtil\\' => 19,
            'Webmozart\\Json\\' => 15,
            'Webmozart\\Assert\\' => 17,
        ),
        'S' => 
        array (
            'Seld\\JsonLint\\' => 14,
        ),
        'J' => 
        array (
            'JsonSchema\\' => 11,
        ),
        'C' => 
        array (
            'Collections\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webmozart\\PathUtil\\' => 
        array (
            0 => __DIR__ . '/..' . '/webmozart/path-util/src',
        ),
        'Webmozart\\Json\\' => 
        array (
            0 => __DIR__ . '/..' . '/webmozart/json/src',
        ),
        'Webmozart\\Assert\\' => 
        array (
            0 => __DIR__ . '/..' . '/webmozart/assert/src',
        ),
        'Seld\\JsonLint\\' => 
        array (
            0 => __DIR__ . '/..' . '/seld/jsonlint/src/Seld/JsonLint',
        ),
        'JsonSchema\\' => 
        array (
            0 => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema',
        ),
        'Collections\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyframework/collections/src',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/easyframework/generics/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit432af859af4e636a59225e131cf25664::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit432af859af4e636a59225e131cf25664::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit432af859af4e636a59225e131cf25664::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
