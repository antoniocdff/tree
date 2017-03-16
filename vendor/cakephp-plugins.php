<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Image' => $baseDir . '/vendor/josbeir/image/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];