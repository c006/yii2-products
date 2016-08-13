<?php

use c006\products\assets\ModelHelper;
use yii\helpers\ArrayHelper;

/** @var  $model_class_name string */
/** @var  $product_id int */

$model = new \c006\shipping\models\ShippingAddresses();

$model->id = \c006\products\assets\ProdHelpers::getShippingAddress($product_id);

$model_link = ModelHelper::getShippingAddress(0, FALSE);
$model_link = ArrayHelper::map($model_link, 'id', 'title');

echo $form->field($model, 'id')->dropDownList([0 => 'Disabled'] + $model_link)->label('Shipping Address');



