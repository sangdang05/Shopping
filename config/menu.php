<?php
return[
/*
|--------------------------------------------------------------------------
| Menu Admin config
|--------------------------------------------------------------------------
*/
    [
        'label' => 'Quản lý danh mục',
        'route' => 'admin.category.index',
        'icon' => 'featured_play_list',
        'permission' => 'list-category',
        'url-path' => 'admin/category',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Category',
                'route' => 'admin.category.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Category',
                'route' => 'admin.category.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý sản phẩm',
        'route' => 'admin.product.index',
        'icon' => 'shopping_cart',
        'permission' => 'list-products',
        'url-path' => 'admin/product',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Product',
                'route' => 'admin.product.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Product',
                'route' => 'admin.product.create',
            ]

        ]
    ]
    ,
    [
        'label' => 'Quản lý user',
        'route' => 'admin.user.index',
        'icon' => 'account_box',
        'permission' => 'list-user',
        'url-path' => 'admin/user',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All User',
                'route' => 'admin.user.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add User',
                'route' => 'admin.user.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý roles',
        'route' => 'admin.roles.index',
        'icon' => 'streetview',
        'permission' => 'list-roles',
        'url-path' => 'admin/roles',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Roles',
                'route' => 'admin.roles.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Roles',
                'route' => 'admin.roles.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý permissions',
        'route' => 'admin.permissions.index',
        'icon' => 'build',
        'permission' => 'list-permissions',
        'url-path' => 'admin/permissions',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Permissions',
                'route' => 'admin.permissions.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Permissions',
                'route' => 'admin.permissions.create',
            ]
        ]
    ]
]

?>
