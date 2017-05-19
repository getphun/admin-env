<?php
/**
 * admin-env config file
 * @package admin-env
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'admin-env',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/admin-env',
    '__files' => [
        'modules/admin-env' => [ 'install', 'remove', 'update' ],
        'theme/admin/system/env' => [ 'install', 'remove', 'update' ]
    ],
    '__dependencies' => [
        'admin'
    ],
    '_services' => [],
    '_autoload' => [
        'classes' => [
            'AdminEnv\\Controller\\EnvController'    => 'modules/admin-env/controller/EnvController.php',
        ],
        'files' => []
    ],
    
    '_routes' => [
        'admin' => [
            'adminSystemEnv' => [
                'rule' => '/system/env',
                'handler' => 'AdminEnv\\Controller\\Env::index'
            ]
        ]
    ],
    
    'admin' => [
        'menu' => [
            'system' => [
                'label' => 'System',
                'icon'  => 'terminal',
                'order' => 20000,
                'submenu' => [
                    'environment' => [
                        'label'     => 'Environment',
                        'perms'     => 'update_env',
                        'target'    => 'adminSystemEnv',
                        'order'     => 300
                    ]
                ]
            ]
        ]
    ],
    
    'form' => [
        'admin-system-env-edit' => [
            'env' => [
                'type'      => 'select',
                'label'     => 'Environment',
                'options'   => [
                    'development' => 'Development',
                    'production'  => 'Production'
                ],
                'rules'     => [
                    'required' => true
                ]
            ]
        ]
    ]
];