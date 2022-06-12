<?php
return[

    [
        'label' => 'Quản lý danh mục',
        'route' => 'admin.CategoryController.index',
        'icon' => 'category',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Category',
                'route' => 'admin.CategoryController.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Category',
                'route' => 'admin.CategoryController.create',
            ]

        ]
    ],
    [
        'label' => 'Quản lý sản phẩm',
        'route' => 'admin.ProductController.index',
        'icon' => 'shopping_cart',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Product',
                'route' => 'admin.ProductController.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Product',
                'route' => 'admin.ProductController.create',
            ]

        ]
    ]
    ,
    [
        'label' => 'Quản lý bài viết',
        'route' => 'blog.index',
        'icon' => 'book',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Top 100',
                'route' => 'blog.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Top 100',
                'route' => 'blog.create',
            ]

        ]
    ]
]

?>
