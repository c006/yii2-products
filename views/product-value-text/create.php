<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueText */

$this->title = Yii::t('app', 'Create Product Value Text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
