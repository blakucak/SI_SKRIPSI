<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'         => \Myth\Auth\Filters\LoginFilter::class,
        'role'          => \Myth\Auth\Filters\RoleFilter::class,
        'permission'    => \Myth\Auth\Filters\PermissionFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'honeypot',
            // 'csrf',
            // 'invalidchars',
            // 'login',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'login' => [
            'before' => [
                '/beranda/*',
                'ubah_profil/*',
                'ubah_sosmed/*',
                'data-subscriber/*',
                'delete-data-subscriber/*',
                'data-message/*',
                'delete-data-message/*',
                'data-category/*',
                'add-data-category/*',
                'update-data-category/*',
                'delete-data-category/*',
                'data-subcategory/*',
                'add-data-subcategory/*',
                'update-data-subcategory/*',
                'delete-data-subcategory/*',
                'data-product/*',
                'add-data-product/*',
                'update-data-product/*',
                'delete-data-product/*',
                'data-image-product/*',
                'add-data-image-product/*',
                'delete-data-image-product/*',
                'data-feeds/*',
                'add-data-feeds/*',
                'update-data-feeds/*',
                'delete-data-feeds/*',
                'data-iklan/*',
                'update-data-iklan/*',
                'data-banner/*',
                'add-data-banner/*',
                'update-data-banner/*',
                'delete-data-banner/*',
                'data-promo/*',
                'add-data-promo/*',
                'update-data-promo/*',
                'delete-data-promo/*',
                'on-data-promo/*',
                'off-data-promo/*',
            ]
        ]
    ];
}
