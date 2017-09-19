<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductTypeSectionAttr */

$this->title                   = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Product Type Section Attr',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Type Section Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-type-section-attr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
