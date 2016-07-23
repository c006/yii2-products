<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAutoShip */

$this->title = Yii::t('app', 'Create Product Auto Ship');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Auto Ships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-auto-ship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
