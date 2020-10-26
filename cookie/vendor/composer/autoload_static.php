<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ddafa9ba636d8fcc8bd20cbf1b0d67c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
        ),
        'I' => 
        array (
            'InstagramScraper\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'InstagramScraper\\' => 
        array (
            0 => __DIR__ . '/..' . '/raiym/instagram-php-scraper/src/InstagramScraper',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ddafa9ba636d8fcc8bd20cbf1b0d67c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ddafa9ba636d8fcc8bd20cbf1b0d67c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1ddafa9ba636d8fcc8bd20cbf1b0d67c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}