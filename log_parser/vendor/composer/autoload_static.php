<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5058967fec2999f1f2853672010baa3e
{
    public static $prefixesPsr0 = array (
        'K' => 
        array (
            'Kassner' => 
            array (
                0 => __DIR__ . '/..' . '/kassner/log-parser/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit5058967fec2999f1f2853672010baa3e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
