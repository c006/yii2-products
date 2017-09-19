<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductShippingPackaging */

$this->title                   = Yii::t('app', 'Create Product Shipping Packaging');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Shipping Packagings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-shipping-packaging-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
