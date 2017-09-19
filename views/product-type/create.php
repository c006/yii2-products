<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductType */

$this->title                   = Yii::t('app', 'Create Product Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
