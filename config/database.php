<?php 

return [
    // migrating from
    "default" => [
        'driver'    => 'mysql',
        'host'      => 'mysql',
        'database'  => 'forge',
        'username'  => 'homestead',
        'password'  => 'secret',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    // migrating to
    "slave" => [
        'driver'    => 'mysql',
        'host'      => 'mysql',
        'database'  => 'forge',
        'username'  => 'homestead',
        'password'  => 'secret',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]
];