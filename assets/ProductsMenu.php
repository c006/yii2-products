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

    static public function mainItems($is_menu = TRUE)
    {
        $menuItems['products']            = ['label' => 'Products', 'url' => ['/products'], 'items' => []];
        $menuItems['products']['items'][] = ['label' => 'Attributes', 'url' => ['/products/product-attr/index']];
        $menuItems['products']['items'][] = ['label' => 'Categories', 'url' => ['/category/index']];
        $menuItems['products']['items'][] = ['label' => 'Tags', 'url' => ['/products/tags/index']];
        $menuItems['products']['items'][] = ['label' => 'Tier Pricing', 'url' => ['/products/price-tier/index']];
        $menuItems['products']['items'][] = ['label' => 'Auto Ship', 'url' => ['/products/auto-ship/index']];
        $menuItems['products']['items'][] = ['label' => 'Product Type', 'url' => ['/products/product-type/index']];
        $menuItems['products']['items'][] = ['label' => 'Add Product', 'url' => ['/products/create-product/index']];
        $menuItems['products']['items'][] = ['label' => 'Products', 'url' => ['/products/index']];

        if ($is_menu) {
            return [
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items'   => $menuItems,
            ];
        }

        return $menuItems;
    }

    static function isHome()
    {
        $controller         = Yii::$app->controller;
        $default_controller = Yii::$app->defaultRoute;

        return (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? TRUE : FALSE;
    }

}
