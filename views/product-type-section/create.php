<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductTypeSection */

$this->title                   = Yii::t('app', 'Create Product Type Section');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Type Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
