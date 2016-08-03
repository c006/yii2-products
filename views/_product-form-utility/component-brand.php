<?php

use c006\products\assets\ModelHelper;
use yii\helpers\ArrayHelper;


/** @var  $product_id int */

/** @var  $model \c006\products\models\Brands */
$model = new \c006\products\models\Brands();

$product_brand = \c006\products\models\ProductBrand::find()
    ->where(['product_id'=> $product_id])
    ->asArray()
    ->one();

if (sizeof($product_brand)) {
    $model->id = $product_brand['brand_id'];
}

$model_link = ModelHelper::getBrands(0, TRUE);
$model_link = ArrayHelper::map($model_link, 'id', 'name');

echo $form->field($model, 'id')->dropDownList([0 => 'No Brand'] + $model_link)->label('Brands');

