<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueDecimal */

$this->title                   = Yii::t('app', 'Create Product Value Decimal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Decimals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-decimal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
