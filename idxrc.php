<?php

$environments = [
    'prod' => [
        'hosts' => ['omega-XXXX.local'],
        'ssh_params' => [
            'user' => 'root',
        ],
        'deploy' => [
            'local_base_dir' => './',
            'remote_base_dir' => '/www/apps/onion-omega-php-demo',
            'rsync_exclude' => './rsync_exclude.txt',
        ],
    ],
];

return [
    'envs' => $environments,
    'ssh_client' => new \Idephix\SSH\SshClient()
];
