<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitGravityPDFPlugin
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '6124b4c8570aa390c21fafd04a26c69f' => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php',
        'e9b046393eb3376a21bcc1a30bd2fe64' => __DIR__ . '/..' . '/querypath/querypath/src/qp_functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'T' => 
        array (
            'TrueBV\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Spatie\\UrlSigner\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Mpdf\\QrCode\\' => 12,
            'Mpdf\\' => 5,
            'Masterminds\\' => 12,
        ),
        'L' => 
        array (
            'League\\Url\\' => 11,
        ),
        'G' => 
        array (
            'GFPDF\\' => 6,
        ),
        'D' => 
        array (
            'DeepCopy\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'TrueBV\\' => 
        array (
            0 => __DIR__ . '/..' . '/true/punycode/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Spatie\\UrlSigner\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/url-signer/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Mpdf\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/qrcode/src',
        ),
        'Mpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/mpdf/src',
        ),
        'Masterminds\\' => 
        array (
            0 => __DIR__ . '/..' . '/masterminds/html5/src',
        ),
        'League\\Url\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/url/src',
        ),
        'GFPDF\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Upload' => 
            array (
                0 => __DIR__ . '/..' . '/codeguy/upload/src',
            ),
        ),
        'Q' => 
        array (
            'QueryPath' => 
            array (
                0 => __DIR__ . '/..' . '/querypath/querypath/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitGravityPDFPlugin::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitGravityPDFPlugin::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitGravityPDFPlugin::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitGravityPDFPlugin::$classMap;

        }, null, ClassLoader::class);
    }
}
