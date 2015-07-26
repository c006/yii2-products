<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueInteger */

$this->title = Yii::t('app', 'Create Product Value Integer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Integers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-integer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
