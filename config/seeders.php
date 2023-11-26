<?php

use App\Enums\StatusEnum;

return [
    'user' => [
        'name'        => 'Admin',
        'email'       => 'admin@example.com',
        'password'    => '@Admin4431!',
        'user_status' => 'on'
    ],
    'menus' => [
        1 => [
            'name'           => 'Dashboard',
            'icon'           => 'bi bi-speedometer',
            'slug'           => '/admin/dashboard',
            'position'       => 1,
            'prefix'         => 'dashboard',
            'show'           => StatusEnum::ON,
        ],
        2 => [
            'name'           => 'Usuários',
            'icon'           => 'bi bi-people-fill',
            'slug'           => '/admin/users',
            'position'       => 2,
            'prefix'         => 'users',
            'show'           => StatusEnum::ON,
        ],
        3 => [
            'name'           => 'Permissões',
            'icon'           => 'bi bi-file-earmark-lock-fill',
            'slug'           => '/admin/permissions',
            'position'       => 3,
            'prefix'         => 'permissions',
            'show'           => StatusEnum::ON,
        ],
        4 => [
            'name'           => 'Menus',
            'icon'           => 'bi bi-menu-button-wide-fill',
            'slug'           => '/admin/menus',
            'position'       => 4,
            'prefix'         => 'menus',
            'show'           => StatusEnum::ON,
        ],
        5 => [
            'name'           => 'Galeria',
            'icon'           => 'bi bi-images',
            'slug'           => '/admin/gallery',
            'position'       => 5,
            'prefix'         => 'gallery',
            'show'           => StatusEnum::ON,
        ],
        6 => [
            'name'           => 'Configurações',
            'icon'           => 'bi bi-gear-fill',
            'slug'           => '/admin/settings/edit',
            'position'       => 6,
            'prefix'         => 'settings',
            'show'           => StatusEnum::ON,
        ],
    ],
    'permissions' => [
        1 => [
            'name'       => 'Admin',
            'eng_name'   => 'admin',
            'permission' => 'on'
        ],
        2 => [
            'name'       => 'Usuário',
            'eng_name'   => 'user',
            'permission' => ''
        ]
    ],
    'settings' => [
        'site_name'        => 'Rafael Dev Code',
        'site_description' => 'Faça seu login!',
    ]
];
