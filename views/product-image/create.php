<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductImage */

$this->title = Yii::t('app', 'Create Product Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
