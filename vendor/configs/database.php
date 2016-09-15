<?php
//一主多从架构模式
$config = [
    'master' => [
        'host'     =>'127.0.0.1',
        'username' => 'root',
        'password' =>'',
        'port'     =>3306,
        'dbName'   =>'httpds'
    ],
        //多从
    'slave' => [
        [
            'host'     =>'127.0.0.1',
            'username' => 'root',
            'password' => '',
            'port'     =>3306,
            'dbName'   =>'httpds'
        ]
    ]
];
return $config;