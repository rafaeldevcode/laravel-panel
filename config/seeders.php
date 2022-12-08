<?php

return [
    'user' => [
        'name'        => 'Admin',
        'email'       => 'admin@admin.com',
        'password'    => '!R443303e',
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
            'name'           => 'Menus',
            'icon'           => 'bi bi-menu-button-wide-fill',
            'slug'           => '/admin/menus',
            'position'       => 4,
            'prefix'         => 'menus'
        ],
        3 => [
            'name'           => 'Permissões',
            'icon'           => 'bi bi-file-earmark-lock-fill',
            'slug'           => '/admin/permissions',
            'position'       => 3,
            'prefix'         => 'permissions'
        ],
        4 => [
            'name'           => 'Usuários',
            'icon'           => 'bi bi-people-fill',
            'slug'           => '/admin/users',
            'position'       => 2,
            'prefix'         => 'users'
        ],
        5 => [
            'name'           => 'Galeria',
            'icon'           => 'bi bi-images',
            'slug'           => '/admin/gallery',
            'position'       => 5,
            'view_dashboard' => 'on',
            'prefix'         => 'gallery'
        ],
        6 => [
            'name'           => 'Notificações',
            'icon'           => 'bi bi-bell-fill',
            'slug'           => '/admin/notifications',
            'position'       => 6,
            'prefix'         => 'notifications'
        ],
        7 => [
            'name'           => 'Configurações',
            'icon'           => 'bi bi-gear-fill',
            'slug'           => '/admin/settings/edit',
            'position'       => 7,
            'prefix'         => 'settings'
        ],
        8 => [
            'name'           => 'Logs',
            'icon'           => 'bi bi-file-binary-fill',
            'slug'           => '/admin/logs',
            'position'       => 8,
            'prefix'         => 'logs'
        ]
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
        'site_logo'        => 'logo.png',
        'site_logo_header' => 'logo_header.png',
        'site_favicon'     => 'favicon.png',
        'site_bg_login'    => 'login_bg.png'
    ]
];
