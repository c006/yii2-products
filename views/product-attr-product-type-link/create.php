<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttrProductTypeLink */

$this->title = Yii::t('app', 'Create Product Attr Product Type Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attr Product Type Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-product-type-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
