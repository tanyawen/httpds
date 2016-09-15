<?php
$config = [
    'home'=>[
        'decorator' => [
            'index'=>[
                '\\app\\decorator\\Json',
                '\\app\\decorator\\Login',
            ]
        ]
    ]
];
return $config;