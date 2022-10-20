<?php

return [
    'user' => [
        'name'        => 'Admin',
        'email'       => 'admin@admin.com',
        'password'    => 'admin1234',
        'user_status' => 'on'
    ],
    'menus' => [
        1 => [
            'name'           => 'Dashboard',
            'icon'           => 'bi bi-speedometer',
            'slug'           => '/admin/dashboard',
            'position'       => 1,
            'view_dashboard' => NULL,
            'prefix'         => 'dashboard'
        ],
        2 => [
            'name'           => 'Menus',
            'icon'           => 'bi bi-menu-button-wide-fill',
            'slug'           => '/admin/menus',
            'position'       => 4,
            'view_dashboard' => 'on',
            'prefix'         => 'menus'
        ],
        3 => [
            'name'           => 'Permissões',
            'icon'           => 'bi bi-file-earmark-lock-fill',
            'slug'           => '/admin/permissions',
            'position'       => 3,
            'view_dashboard' => 'on',
            'prefix'         => 'permissions'
        ],
        4 => [
            'name'           => 'Usuários',
            'icon'           => 'bi bi-people-fill',
            'slug'           => '/admin/users',
            'position'       => 2,
            'view_dashboard' => 'on',
            'prefix'         => 'users'
        ],
        5 => [
            'name'           => 'Notificações',
            'icon'           => 'bi bi-bell-fill',
            'slug'           => '/admin/notifications',
            'position'       => 5,
            'view_dashboard' => 'on',
            'prefix'         => 'notifications'
        ],
        6 => [
            'name'           => 'Configurações',
            'icon'           => 'bi bi-gear-fill',
            'slug'           => '/admin/settings/edit',
            'position'       => 6,
            'view_dashboard' => NULL,
            'prefix'         => 'settings'
        ],
        7 => [
            'name'           => 'Logs',
            'icon'           => 'bi bi-card-text',
            'slug'           => '/admin/logs',
            'position'       => 7,
            'view_dashboard' => NULL,
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
