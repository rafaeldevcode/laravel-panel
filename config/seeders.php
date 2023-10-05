<?php

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
            'prefix'         => 'dashboard'
        ],
        2 => [
            'name'           => 'Usuários',
            'icon'           => 'bi bi-people-fill',
            'slug'           => '/admin/users',
            'position'       => 2,
            'prefix'         => 'users'
        ],
        3 => [
            'name'           => 'Permissões',
            'icon'           => 'bi bi-file-earmark-lock-fill',
            'slug'           => '/admin/permissions',
            'position'       => 3,
            'prefix'         => 'permissions'
        ],
        4 => [
            'name'           => 'Menus',
            'icon'           => 'bi bi-menu-button-wide-fill',
            'slug'           => '/admin/menus',
            'position'       => 4,
            'prefix'         => 'menus'
        ],
        5 => [
            'name'           => 'Galeria',
            'icon'           => 'bi bi-images',
            'slug'           => '/admin/gallery',
            'position'       => 5,
            'prefix'         => 'gallery'
        ],
        6 => [
            'name'           => 'Configurações',
            'icon'           => 'bi bi-gear-fill',
            'slug'           => '/admin/settings/edit',
            'position'       => 6,
            'prefix'         => 'settings'
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
        'site_logo'        => 'logo_main.svg',
        'site_logo_header' => 'logo_secondary.png',
        'site_favicon'     => 'favicon.svg',
        'site_bg_login'    => 'bg_login.jpg'
    ]
];
