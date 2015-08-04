<?php

namespace c006\products\assets;

use Yii;

class ProductsMenu
{

    static public function mainInit()
    {
        return [
            'brandLabel' => '',
            'brandUrl'   => '',
            'options'    => [
                'class' => 'navbar navbar-top navbar-products',
            ],
        ];
    }

    static public function mainItems()
    {
        $menuItems['products'] = ['label' => 'Products', 'url' => ['/products'], 'items'=>[]];
        $menuItems['products']['items'][] = ['label' => 'Categories', 'url' => ['/products/product-category/index']];
        $menuItems['products']['items'][] = ['label' => 'Product Type', 'url' => ['/products/product-type/index']];
        $menuItems['products']['items'][] = ['label' => 'Add Product', 'url' => ['/products/create-product/index']];

        return [
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items'   => $menuItems,
        ];
    }

    static function isHome()
    {
        $controller = Yii::$app->controller;
        $default_controller = Yii::$app->defaultRoute;

        return (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? TRUE : FALSE;
    }

}
