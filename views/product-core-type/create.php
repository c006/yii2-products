<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductCoreType */

$this->title = Yii::t('app', 'Create Product Core Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Core Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-core-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
