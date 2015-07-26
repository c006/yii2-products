<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueBit */

$this->title = Yii::t('app', 'Create Product Value Bit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Bits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-bit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
