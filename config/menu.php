<?php
return[

    [
        'label' => 'Quản lý danh mục',
        'route' => 'admin.category.index',
        'icon' => 'category',
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

]

?>
